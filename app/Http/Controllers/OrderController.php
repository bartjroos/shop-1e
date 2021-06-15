<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use Mollie\Laravel\Facades\Mollie;

class OrderController extends Controller
{
    public function buy(Product $product)
    {
        $order = new Order();
        $order->product_id = $product->id;
        $order->price = $product->price;
        $order->save();

        $payment = Mollie::api()->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => number_format($order->price, 2, '.', '') // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            "description" => "Order #{$order->id}",
            "redirectUrl" => "http://127.0.0.1:8000/finish/" . $order->id,
        ]);

        $order->payment_id = $payment->id;
        $order->save();
        return redirect($payment->getCheckoutUrl(), 303);
    }

    public function finish(Order $order)
    {
        $payment = Mollie::api()->payments->get($order->payment_id);

        return $payment->status;
    }

    
}
