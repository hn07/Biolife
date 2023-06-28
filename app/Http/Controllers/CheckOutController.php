<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_Detail;
use Gloudemans\Shoppingcart\Facades\Cart;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckOutController extends Controller
{
    public function indexAction()
    {
        $carts = Cart::content();
        $total = Cart::total();
        $totalQty = Cart::count();
        $totalPrice = Cart::subtotal();
        $totalDiscount = Cart::discount();
        return view('Frontend.Pages.check-out', compact('carts', 'total', 'totalQty', 'totalPrice', 'totalDiscount'));
    }

    public function addOrder(Request $request)
    {
        if ($request->payment_type == 'pay_later') {
            // them don hang moi
            $order = Order::make($request->all());
            $order->save();
            // them chi tiet don hang
            $carts = Cart::content();
            foreach ($carts as $item) {
                $data = [
                    'order_id' => $order->id,
                    'product_id' => $item->id,
                    'quantity' => $item->qty,
                    'price' => $item->price,
                    'total' => $item->price * $item->qty,
                ];
                $Order_Detail = Order_Detail::create($data);
                $Order_Detail->save();
            }

            //gửi mail
            $subject = 'Đặt hàng thành công';
            $total = Cart::total();
            $subtotal = Cart::subtotal();
            $this->sendEmail($order, $total, $subtotal, $subject, $carts);


            // xoa gio hang
            Cart::destroy();

            //tra ve ket qua
            return redirect()->route('shop.shopping-cart')->with('success', 'Đặt hàng thành công');
        } else {
            return 'Thanh toán online không được hỗ trợ.';
        }
    }

    public function sendEmail($order, $total, $subtotal, $subject, $carts)
    {
        $email_to = $order->email_address;
        $data = [
            'order' => $order,
            'subject' => $subject,
            'total' => $total,
            'subtotal' => $subtotal,
            'carts' => $carts,
        ];
        Mail::send('Frontend.Pages.email', $data, function ($message) use ($email_to, $subject) {
            $message->from('nguyennham2580@gmail.com', 'Biolife');
            $message->to($email_to);
            $message->subject($subject);
        });
    }
}
