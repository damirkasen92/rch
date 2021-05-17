<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Requests\CartRequest;
use App\Mail\OrderMail;
use App\Mail\WelcomeMail;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function index()
    {
        $cart = $this->get();

        return view('cart.index', [
            'cart' => json_decode($cart),
            'title' => 'Корзина'
        ]);
    }

    private function getCartId()
    {
        $cartId = Cookie::get('cartId');

        if ($cartId == null) {
            return redirect('/');
        }

        return $cartId;
    }

    public function add(Request $request)
    {
        $data = $request->validate([
            'user_id' => ['nullable', 'numeric'],
            'uuid' => ['uuid'],
            'items' => ['required', 'json'],
            'expired_at' => ['date']
        ]);

        $cartId = $this->getCartId();
        $cart = Cart::where('uuid', $cartId)->first();

        if ($cart == null) {
            $cart = Cart::create([
                'user_id' => auth()->user()->id ?? null,
                'uuid' => $cartId,
                'items' => $request->input('items'),
                'expired_at' => Carbon::now()->addDays(7)
            ]);
        } else {
            $cart->update(['items' => $request->input('items')]);
        }

        return $cart->items;
    }

    public function get()
    {
        $cartId = $this->getCartId();

        $cart = Cart::where('uuid', $cartId)->first();

        if ($cart == null) {
            return json_encode([]);
        } else {
            return $cart->items;
        }
    }

    public function store(CartRequest $request)
    {
        $user = User::where('email', $request->input('email'))->first();
        $userId = null;

        if (!$user) {
            $password = Str::random(12);
            $newUser = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($password),
            ]);

            $newUser->roles()->attach(2);
            $userId = $newUser->id;
            $email = $request->input('email');

            $this->mail($email, WelcomeMail::class, [
                'email' => $email,
                'name' => $request->input('name'),
                'password' => $password,
            ]);
        } else {
            $userId = $user->id;
        }

        $order = Order::create([
            'user_id' => (int) $userId,
            'items' => $request->input('cart'),
            'address' => $request->input('address'),
            'total_price' => $request->input('totalPrice'),
            'phone' => json_encode($request->input('phone'))
        ]);

        if ($order) {
            $this->mail($request->input('email'), OrderMail::class, [
                'name' => $request->input('name'),
                'orderId' => $order->id,
                'items' => $request->input('cart'),
                'address' => $request->input('address'),
                'totalPrice' => $request->input('totalPrice')
            ]);

            $cartId = $this->getCartId();
            $cart = Cart::where('uuid', $cartId)->first();

            if ($cart == null) {
                return redirect('/');
            }

            $cart->update([
                'items' => json_encode([])
            ]);

            return redirect()
                ->action(
                    [PaymentController::class, 'robokassa'],
                    ['id' => $order->id, 'totalPrice' => $request->input('totalPrice')]
                );
        }

        return redirect('/')
            ->with('error', 'Произошла ошибка на сервере. Пожалуйста попробуйте еще раз.');
    }

    private function mail($to, $class, $data)
    {
        Mail::to($to)->send(new $class($data));
    }
}
