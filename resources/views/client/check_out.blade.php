@extends('client.master')
@section('title')
    Thanh toán
@endsection
@section('content')
   <div class="container" style="background: white;    margin-top: 10.7em;">
		<div id="content">

        <form action="{{route('postCheckout')}}" method="post" class="beta-form-checkout">
            @if (Session('thongbao'))
                <div class="alert alert-success">Đặt hàng thành công</div>
            @endif
            @csrf
				<div class="row">
                    @if (auth::check())
					<div class="col-sm-6" >
						<h4>Đặt hàng</h4>
						<div class="space20">&nbsp;</div>

						<div >
							<label for="name">Họ tên*</label>
							<input style="
							width: 100%;
							border: 1px solid #e1e1e1;
							height: 37px;
							padding: 0 12px;"
							type="text"  name="name" value="{{ auth::user()->name}}" placeholder="Họ tên" required>
						</div>
						<div >
							<label>Giới tính </label>
							<input   type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
							<input
							type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>

						</div>

						<div >
							<label for="email">Email*</label>
							<input style="
							width: 100%;
							border: 1px solid #e1e1e1;
							height: 37px;
							padding: 0 12px;"
							type="email" value="{{ auth::user()->email}}"  name="email" required placeholder="expample@gmail.com">
						</div>

						<div >
							<label for="address">Địa chỉ*</label>
							<input style="
							width: 100%;
							border: 1px solid #e1e1e1;
							height: 37px;
							padding: 0 12px;"
							type="text" value="{{ auth::user()->address}}"   name="address" placeholder="Street Address" required>
						</div>


						<div >
							<label for="phone">Điện thoại*</label>
							<input style="
							width: 100%;
							border: 1px solid #e1e1e1;
							height: 37px;
							padding: 0 12px;"
							type="text" value="{{ auth::user()->phone}}"  name="phone" required>
                        </div>
                        <div class="form-group">
							<label for="notes">Ghi chú</label>
							<textarea class="form-control" name="note"></textarea>
						</div>


                    </div>
                    @else
                    <div class="col-sm-6" >
						<h4>Đặt hàng</h4>
						<div class="space20">&nbsp;</div>

						<div >
							<label for="name">Họ tên*</label>
							<input style="
							width: 100%;
							border: 1px solid #e1e1e1;
							height: 37px;
							padding: 0 12px;"
							type="text"  name="name" placeholder="Họ tên" required>
						</div>
						<div >
							<label>Giới tính </label>
							<input   type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
							<input
							type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>

						</div>

						<div >
							<label for="email">Email*</label>
							<input style="
							width: 100%;
							border: 1px solid #e1e1e1;
							height: 37px;
							padding: 0 12px;"
							type="email"  name="email" required placeholder="expample@gmail.com">
						</div>

						<div >
							<label for="address">Địa chỉ*</label>
							<input style="
							width: 100%;
							border: 1px solid #e1e1e1;
							height: 37px;
							padding: 0 12px;"
							type="text"   name="address" placeholder="Street Address" required>
						</div>


						<div >
							<label for="phone">Điện thoại*</label>
							<input style="
							width: 100%;
							border: 1px solid #e1e1e1;
							height: 37px;
							padding: 0 12px;"
							type="text"  name="phone" required>
                        </div>
                        <div class="form-group">
							<label for="notes">Ghi chú</label>
							<textarea class="form-control" name="note"></textarea>
						</div>


					</div>
                    @endif
					<div class="col-sm-6" >
								@if (Session::has('Cart'))

						<div class="your-order">
							<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
                            <div class="your-order-body" style="padding: 0px 10px">
								<div class="your-order-item">
									<div>
									<!--  one item	 -->
                                        @foreach ($product_cart as $item)
                                            <input type="hidden" value="{{$item['item']['id']}}">
                                        	<div class="media" style="    padding: 0.5em;">
                                            <img width="25%" src="/{{ $item['item']['image']}}" alt="" class="pull-left">
											<div class="media-body" style="    padding-left: 1em;">

                                                    <p class="font-large">{{ $item['item']['name']}}</p>
                                                <p class="font-large">Đơn giá: {{ number_format($item['qty'] * $item['item']['price'])}} VND</p>

												<span class="color-gray your-order-info">Số lượng: {{ $item['qty']}}</span>
											</div>
                                        </div>
                                <hr>

                                    @endforeach
									<!-- end one item -->
                                    </div>

									<div class="clearfix"></div>
                                </div>
								<div class="your-order-item">
                                <div class="pull-right"><h5 class="color-black" style="margin-left: 1em; margin-top: 0px !important;"> {{ number_format(Session('Cart')->totalPrice) }} VND</h5></div>

									<div class="pull-right"><p class="your-order-f18">Tổng tiền: </p></div>
									<div class="clearfix"></div>
                                </div>

							</div>
							<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>

							<div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" name="payment" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
										<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
										<div class="payment_box payment_method_bacs" style="display: block;">
											Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
										</div>
									</li>

									<li class="payment_method_cheque">
										<input id="payment_method_cheque" name="payment" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
										<label for="payment_method_cheque">Chuyển khoản </label>
										<div class="payment_box payment_method_cheque" style="display: none;">
											Chuyển tiền đến tài khoản sau:
											<br>- Số tài khoản: 123 456 789
											<br>- Chủ TK: Nguyễn A
											<br>- Ngân hàng ACB, Chi nhánh TPHCM
										</div>
									</li>

								</ul>
                            </div>
                            <div class="text-center"><button style="padding: 0.4em;" class="beta-btn primary" href="#">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>



                        @endif
                        </div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
