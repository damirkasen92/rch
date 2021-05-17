<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function robokassa(Request $request)
    {
        $validated = $request->validate([
            'id' => ['required', 'integer'],
            'totalPrice' => ['required', 'integer']
        ]);

        $mrh_login = 'rich-nature.kz';
        $mrh_pass1 = 'B2fR8zUQlfFjT28PwLz6';
        $inv_id = $request->id;
        $inv_desc = 'Rich Nature - Линейка 100% натуральной уходовой косметики';
        $out_summ = $request->totalPrice;
        // $in_curr = "";
        $culture = "ru";
        $crc = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1");
        $isTest = 0;
        $url = "https://auth.robokassa.ru/Merchant/Index.aspx?"
            ."MerchantLogin=$mrh_login&"
            ."OutSum=$out_summ&"
            ."InvId=$inv_id&"
            ."Description=$inv_desc&"
            ."Culture=$culture&"
            ."Encoding=utf-8&"
            ."SignatureValue=$crc&"
            ."isTest=$isTest"
        ;

        return redirect($url);
    }

    public function success(Request $request)
    {
        $inv_id = $request->input('InvId');
        $order = Order::where('id', $inv_id)->first();

        if (!$order) return;

        $mrh_pass1 = 'B2fR8zUQlfFjT28PwLz6';
        $out_summ = $request->input('OutSum');
        $crc = Str::upper($request->input('SignatureValue'));
        $my_crc = Str::upper(md5("$out_summ:$inv_id:$mrh_pass1"));

        if ($crc != $my_crc) {
            return redirect('/');
        }

        return view('payment.success', [
            'title' => 'Успешная оплата',
            'order' => $order
        ]);
    }

    public function fail(Request $request)
    {
        return view('payment.fail', [
            'title' => 'Отказ от оплаты',
            'id' => $request->input('InvId')
        ]);
    }

    public function result(Request $request)
    {
        $inv_id = $request->input('InvId');
        $order = Order::where('id', $inv_id)->first();

        if (!$order) return;

        $mrh_pass2 = 'DARg1wSsxjMz75kG8tn3';
        $out_summ = $request->input('OutSum');
        $crc = Str::upper($request->input('SignatureValue'));
        $my_crc = Str::upper(md5("$out_summ:$inv_id:$mrh_pass2"));

        if ($crc != $my_crc) {
            return;
        }

        $order->update([
            'payment_status' => true,
            'updated_at' => now()
        ]);
    }
}
