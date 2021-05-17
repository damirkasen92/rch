<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function history()
    {
        return view('user.index', [
            'title' => 'История заказов',
            'orders' => $this->getOrders()
        ]);
    }

    public function contacts()
    {
        return view('user.contacts', [
            'title' => 'Контактные данные'
        ]);
    }

    public function profile()
    {
        return view('user.profile', [
            'title' => 'Изменение профиля'
        ]);
    }

    public function password()
    {
        return view('user.password', [
            'title' => 'Изменение пароля'
        ]);
    }

    public function getOrders()
    {
        return Order::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->paginate(5);
    }

    public function getAddresses()
    {
        return Order::select('address')->orderBy('id', 'DESC')->where('user_id', auth()->user()->id)->paginate(5);
    }
}
