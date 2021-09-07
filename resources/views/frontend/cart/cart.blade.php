@extends('frontend/master/master')
@section('title','Gio Hang')
@section('main')
			<!-- main -->
		<div class="colorlib-shop">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col-md-10 col-md-offset-1">
						<div class="process-wrap">
							<div class="process text-center active">
								<p><span>01</span></p>
								<h3>Giỏ hàng</h3>
							</div>
							<div class="process text-center">
								<p><span>02</span></p>
								<h3>Thanh toán</h3>
							</div>
							<div class="process text-center">
								<p><span>03</span></p>
								<h3>Hoàn tất thanh toán</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row row-pb-md">
					<div class="col-md-10 col-md-offset-1">
						<div class="product-name">
							<div class="one-forth text-center">
								<span>Chi tiết sản phẩm</span>
							</div>
							<div class="one-eight text-center">
								<span>Giá</span>
							</div>
							<div class="one-eight text-center">
								<span>Số lượng</span>
							</div>
							<div class="one-eight text-center">
								<span>Tổng</span>
							</div>
							<div class="one-eight text-center">
								<span>Xóa</span>
							</div>
							
						</div>
						@if(isset($cart))
						@foreach($cart as $item)
						<div class="product-cart">
							<div class="one-forth">	
								<div class="product-img">
									<img class="img-thumbnail cart-img" src="../uploads/{{$item->options->image}}">
								</div>
								<div class="detail-buy">
									<h4>Mã : SP0{{$item->id}}</h4>
									<h5>{{$item->name}}</h5>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<span class="price">{{showPrice($item->price)}} đ</span>
								</div>
							</div>
							<div class="one-eight text-center">
								<div  class="display-tc">
									<input type="number" id="quantity" name="quantity" onchange="updateCart('{{$item->rowId}}', this.value)"
										class="form-control input-number text-center" value="{{$item->qty}}" />
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<span class="price">{{showPrice($item->price*$item->qty)}} đ</span>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<a href="{{asset('/removefromcart/'.$item->rowId)}}" class="closed"></a>
								</div>
							</div>
						</div>
						@endforeach
						@endif
					</div>
				</div>
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="total-wrap">
							<div class="row">
								<div class="col-md-8">

								</div>
								<div class="col-md-3 col-md-push-1 text-center">
									<div class="total">
										<div class="sub">
											<p><span>Tổng:</span> <span>{{showPrice(Cart::priceTotalFloat())}} đ</span></p>
										</div>
										<div class="grand-total">
											{{-- <p><span><strong>Thuế 21%:</strong></span> <span>{{showPrice(Cart::taxFloat())}} đ</span></p> --}}
											<p><span><strong>Tổng cộng:</strong></span> <span>{{showPrice(Cart::totalFloat())}} đ</span></p>
											<a href="{{asset('/thanh-toan')}}" class="btn btn-primary">Thanh toán <i
													class="icon-arrow-right-circle"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end main -->
		
@endsection
@section('script')
<script>
	function updateCart(rowId,quantity){
		$.get(window.location.href+'/update/'+rowId+'/'+quantity,function(){
			window.location.reload();
		});
	};
</script>
@endsection