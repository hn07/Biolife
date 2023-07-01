<div style="width: 600px; margin: 0 auto">
    <div style="text-align: center">
        <h2>Xin chào {{ $order->username }}</h2>
        <p>Xác nhận đơn hàng thành công</p>
        <p>Cảm ơn bạn đã tin tưởng và mua hàng tại cửa hàng của chúng tôi, chúng tôi sẽ liên hệ với bạn trong thời gian
            sớm nhất để giao hàng!</p>


    </div>
</div>
<table style="width: 100%; border-spacing: 0px">
    <tr>
        <td
            style="border-top: 1px solid black;border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black; width: 153px; padding: 5px;">
            <img src="https://toigingiuvedep.vn/wp-content/uploads/2021/01/hinh-anh-dong-cam-on-thank-you-dep.gif"
                style="width: 153px; height: 153px;" />
        </td>
        <td style="border-top: 1px solid black;border-bottom: 1px solid black;border-right: 1px solid black; text-align: center; vertical-align: middle; padding: 5px;"
            colspan="3">
            <h1 style="color: red;">Công ty TNHH một thành viên Biolife</h1>
        </td>
    </tr>
    <tr>
        <td colspan="4"
            style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black; padding: 5px;">
            <h3>Thông tin khách hàng</h3>

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
            Xin chúc anh/chị cùng gia đình dồi dào sức khỏe, hạnh phúc và tiếp tục đồng hành cùng Biolife.
        </td>
    </tr>
    <tr>
    </tr>
</table>
<hr>
<h3>Thông tin sản phẩm</h3>
<table style="width: 100%; border-spacing: 0px">
    <tr>
        <th
            style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black; border-top: 1px solid black; padding: 5px;">
            Tên sản phẩm</th>
        <th
            style="border-bottom: 1px solid black;border-right: 1px solid black; border-top: 1px solid black; padding: 5px;">
            Số lượng</th>
        <th
            style="border-bottom: 1px solid black;border-right: 1px solid black; border-top: 1px solid black; padding: 5px;">
            Đơn giá</th>
        <th
            style="border-bottom: 1px solid black;border-right: 1px solid black; border-top: 1px solid black; padding: 5px;">
            Thành tiền</th>
    </tr>
    @if ($order_id[0] == $order->id)
        @foreach ($order_details as $order_detail)
            <tr>
                <td
                    style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black; padding: 5px;">
                    {{ $order->username }}</td>
                <td style="border-bottom: 1px solid black;border-right: 1px solid black; padding: 5px; text-align: center">
                    {{ $order_detail->quantity }}
                </td>
                <td style="border-bottom: 1px solid black;border-right: 1px solid black; padding: 5px;">
                    {{ number_format($order_detail->price) }} vnđ
                </td>
                <td style="border-bottom: 1px solid black;border-right: 1px solid black; padding: 5px;">
                    {{ number_format($order_detail->quantity * $order_detail->price) }} vnđ</td>
            </tr>
        @endforeach
    @endif

</table>
@if ($order_id[0] == $order->id)
<h3>Tổng hóa đơn: {{ $subtotal[0] }} vnđ</h3>
@endif

<hr>
<h3>Trạng thái đơn hàng!</h3>
@if ($order->status == 0)
    <label class="badge badge-light"> Chưa xác nhận </label>
@elseif ($order->status == 1)
    <label class="badge badge-dark"> Đã xác nhận </label>
@elseif ($order->status == 2)
    <label class="badge badge-warning"> Đang giao hàng </label>
@elseif ($order->status == 3)
    <label class="badge badge-success">Đã giao hàng</label>
@else
    <label class="badge_badge-danger">Đã hủy</label>
@endif
