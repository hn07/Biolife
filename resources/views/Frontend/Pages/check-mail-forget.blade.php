<div style="width: 600px; margin: 0 auto" >
    <h2>Xin chào {{ $customer->username }}</h2>
    <p>Vui lòng kích vào đường link bên dưới để nhận lại mật khẩu</p>
    <p>Chú ý: Mã kích hoạt chỉ có hiệu lực trong vòng 72 giờ!</p>
    <p><a href="{{ route('authentication.get-password', ['customer' => $customer->id, 'token' => $customer->token]) }}"
        style="display: inline-block; padding: 10px 20px; background-color: #f00; color: #fff; text-decoration: none; border-radius: 5px;"
        >Đặt lại mật khẩu</a></p>

</div>