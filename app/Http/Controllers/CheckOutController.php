<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_Detail;
use Gloudemans\Shoppingcart\Facades\Cart;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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
            $token = strtolower(Str::random(20));
            $order = Order::make($request->all());
            $order->token = $token;
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
            return redirect()->route('shop.shopping-cart')->with('checkmail', 'Đặt hàng thành công, vui lòng kiểm tra ');
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

    public function accept(Order $order, $token)
    {
        if ($order->token === $token) {
            $order->update(['status' => 1]);
            $subject = 'Đặt hàng thành công';
          
            $order_details = Order_Detail::where('order_id', $order->id)->get();
            $subtotal = $order_details->map(function ($order_details) {
                return $order_details->total;
            })->toArray();;
            $order_id = $order_details->map(function ($order_details) {
                return $order_details->order_id;
            })->toArray();
            $data = [
                'order' => $order,
                'subject' => $subject,              
                'subtotal' => $subtotal,
                'order_details' => $order_details,
                'order_id' => $order_id,
            ];
            
         
            $email_to = $order->email_address;
            Mail::send('Frontend.Pages.email-accept-order', $data, function ($message) use ($email_to, $subject) {
                $message->from('nguyennham2580@gmail.com', 'Biolife');
                $message->to($email_to);
                $message->subject($subject);
            });
            return redirect()->route('shop.tat-ca-san-pham')->with('success', 'Đặt hàng thành công');
        } else {
            return redirect()->route('shop.tat-ca-san-pham')->with('error', 'Đặt hàng thất bại');
        }
    }
}
