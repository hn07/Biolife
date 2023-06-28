<table style="width: 100%; border-spacing: 0px">
    <tr>
        <td
            style="border-top: 1px solid black;border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black; width: 153px; padding: 5px;">
            <img src="Biolife/public/frontend/assets/images/organic-3.png" style="width: 153px; height: 153px;" />
        </td>
        <td style="border-top: 1px solid black;border-bottom: 1px solid black;border-right: 1px solid black; text-align: center; vertical-align: middle; padding: 5px;"
            colspan="3">
            <h1 style="color: red;">Công ty TNHH một thành viên Biolife</h1>
        </td>
    </tr>
    <tr>
        <td colspan="4"
            style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black; padding: 5px;">
            Thông tin khách hàng

        </td>
    </tr>
    <tr>
        <th
            style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;text-align: right; padding: 5px;">
            Tài khoản
            khách hàng:</th>
        <td style="border-bottom: 1px solid black;border-right: 1px solid black; padding: 5px;">
            {{ $order->username }}
        </td>

        <th
            style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;text-align: right; padding: 5px;">
            Thời gian đặt hàng:</th>
        <td style="border-bottom: 1px solid black;border-right: 1px solid black; padding: 5px;">
            {{ $order->created_at }}

        </td>
    </tr>
    <tr>
        <th
            style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;text-align: right; padding: 5px;">
            Email
            khách hàng:</th>
        <td style="border-bottom: 1px solid black;border-right: 1px solid black; padding: 5px;">
            {{ $order->email_address }}

        </td>

        <th
            style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;text-align: right; padding: 5px;">
            Người nhận:</th>
        <td style="border-bottom: 1px solid black;border-right: 1px solid black; padding: 5px;">
            {{ $order->username }}

        </td>
    </tr>
    <tr>
        <th
            style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;text-align: right; padding: 5px;">
            Địa chỉ
            khách hàng:</th>
        <td style="border-bottom: 1px solid black;border-right: 1px solid black; padding: 5px;">
            {{ $order->address }}
        </td>

        <th
            style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;text-align: right; padding: 5px;">
            Địa chỉ người nhận:</th>
        <td style="border-bottom: 1px solid black;border-right: 1px solid black; padding: 5px;">
            {{ $order->address }}

        </td>
    </tr>
    <tr>
        <th
            style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;text-align: right; padding: 5px;">
            Số điện thoại
            khách hàng:</th>
        <td style="border-bottom: 1px solid black;border-right: 1px solid black; padding: 5px;">
            {{ $order->userphone }}

        </td>

        <th
            style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;text-align: right; padding: 5px;">
            Lời chúc:</th>
        <td style="border-bottom: 1px solid black;border-right: 1px solid black; padding: 5px;">
            Xin chúc anh/chị cùng gia đình dồi dào sức khỏe, hạnh phúc và tiếp tục đồng hành cùng Biolife
        </td>
    </tr>
    <tr>
    </tr>
</table>
<hr>
<h3>Thông tin đơn hàng</h3>
<table style="width: 100%; border-spacing: 0px">
    <tr>
        <th
            style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black; border-top: 1px solid black; padding: 5px;">
            Tên sản phẩm</th>
        <th style="border-bottom: 1px solid black;border-right: 1px solid black; padding: 5px;">Số lượng</th>
        <th style="border-bottom: 1px solid black;border-right: 1px solid black; padding: 5px;">Đơn giá</th>
        <th style="border-bottom: 1px solid black;border-right: 1px solid black; padding: 5px;">Thành tiền</th>
    </tr>
    @foreach ($carts as $cart)
        <tr>
            <td
                style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black; padding: 5px;">
                {{ $cart->name }}</td>
            <td style="border-bottom: 1px solid black;border-right: 1px solid black; padding: 5px;">{{ number_format($cart->qty) }}
            </td>
            <td style="border-bottom: 1px solid black;border-right: 1px solid black; padding: 5px;">{{ number_format($cart->price) }} vnđ
            </td>
            <td style="border-bottom: 1px solid black;border-right: 1px solid black; padding: 5px;">
                {{ $cart->qty * $cart->price }}</td>
        </tr>
    @endforeach
</table>
<h3>Tổng hóa đơn: {{ $subtotal }} vnđ</h3>

