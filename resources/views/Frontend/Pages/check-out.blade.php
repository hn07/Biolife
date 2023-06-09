@extends('Frontend.Layouts.main')
@section('main-content')
    <!--Navigation section-->
    <div class="container wrapper">
        <div class="row cart-head">
            <div class="container">
                <div class="row">
                    <p></p>
                </div>
                <div class="row">
                    <div style="display: table; margin: auto;">
                        <span class="step step_complete"> <a href="#" class="check-bc">Cart</a> <span
                                class="step_line step_complete"> </span> <span class="step_line backline"> </span> </span>
                        <span class="step step_complete"> <a href="#" class="check-bc">Checkout</a> <span
                                class="step_line "> </span> <span class="step_line step_complete"> </span> </span>
                        <span class="step_thankyou check-bc step_complete">Thank you</span>
                    </div>
                </div>
                <div class="row">
                    <p></p>
                </div>
            </div>
        </div>
        <div class="row cart-body">
            <form class="form-horizontal" method="post" action="{{ route('checkout.add-order') }}">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    @if (Cart::count() == 0)
                        <div class="alert alert-danger">
                            <strong>Không có sản phẩm nào trong giỏ hàng!</strong>
                        </div>
                    @else
                        <!--REVIEW ORDER-->

                        @csrf
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Xem lại đơn đặt hàng <div class="pull-right"><small><a class="afix-1" href="#">Chỉnh
                                            sửa giỏ hàng</a></small></div>
                            </div>
                            <div class="panel-body">

                                @foreach ($carts as $item)
                                    <div class="form-group">
                                        <div class="col-sm-3 col-xs-3">
                                            <img class="img-responsive" src="{{ $item->options->image }}" />
                                        </div>
                                        <div class="col-sm-6 col-xs-6">
                                            <div class="col-xs-12 ">{{ $item->name }}</div>
                                            <div class="col-xs-12 "><small>Số lượng:
                                                    <span>{{ $item->qty }}</span></small>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-xs-3 text-right">
                                            <h6><span>{{ number_format($item->price) }}</span> vnđ</h6>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <hr />
                                    </div>
                                @endforeach

                                {{-- <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Subtotal</strong>
                                    <div class="pull-right"><span>$</span><span>200.00</span></div>
                                </div>
                                <div class="col-xs-12">
                                    <small>Shipping</small>
                                    <div class="pull-right"><span>-</span></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <hr />
                            </div> --}}
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_type" value="pay_later">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Thanh toán khi nhận hàng
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_type"
                                        value="online_payment" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Thanh toán trực tuyến
                                    </label>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <strong>Tổng hóa đơn</strong>
                                        <div class="pull-right"><span>{{ $totalPrice }}</span><span> vnđ</span></div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <button type="submit" class="btn btn-primary ">Thanh Toán</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--REVIEW ORDER END-->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading">Address</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h4>Shipping Address</h4>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Họ và tên:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="username" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Số điện thoại:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="userphone" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Địa chỉ mail:</strong></div>
                                <div class="col-md-12"><input type="text" name="email_address" class="form-control"
                                        value="" /></div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-xs-12">
                                    <strong>Tỉnh/Thành phố:</strong>
                                    <input type="text" name="city" class="form-control" value="" />
                                </div>
                                <div class="span1"></div>
                                <div class="col-md-6 col-xs-12">
                                    <strong>Quận/huyện:</strong>
                                    <input type="text" name="district" class="form-control" value="" />
                                </div>
                                <div class="span1"></div>
                                <div class="col-md-6 col-xs-12">
                                    <strong>Xã/Phường:</strong>
                                    <input type="text" name="wards" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Địa chỉ cụ thể:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="address" class="form-control" value="" />
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--SHIPPING METHOD END-->
                    <!--CREDIT CART PAYMENT-->
                    {{-- <div class="panel panel-info">
                        <div class="panel-heading"><span><i class="glyphicon glyphicon-lock"></i></span> Secure Payment
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12"><strong>Card Type:</strong></div>
                                <div class="col-md-12">
                                    <select id="CreditCardType" name="CreditCardType" class="form-control">
                                        <option value="5">Visa</option>
                                        <option value="6">MasterCard</option>
                                        <option value="7">American Express</option>
                                        <option value="8">Discover</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Credit Card Number:</strong></div>
                                <div class="col-md-12"><input type="text" class="form-control" name="car_number"
                                        value="" /></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Card CVV:</strong></div>
                                <div class="col-md-12"><input type="text" class="form-control" name="car_code"
                                        value="" /></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <strong>Expiration Date</strong>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="">
                                        <option value="">Month</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="">
                                        <option value="">Year</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <span>Pay secure using your credit card.</span>
                                </div>
                                <div class="col-md-12">
                                    <ul class="cards">
                                        <li class="visa hand">Visa</li>
                                        <li class="mastercard hand">MasterCard</li>
                                        <li class="amex hand">Amex</li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button type="submit" class="btn btn-primary btn-submit-fix">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!--CREDIT CART PAYMENT END-->
                </div>
                @endif

            </form>
        </div>
        <div class="row cart-footer">

        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v3/"></script>
    <script src="{{ asset('frontend/assets/js/checkout.js') }}"></script>
    <script>
        function checkmail() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'success',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        }
    </script>
@endsection
