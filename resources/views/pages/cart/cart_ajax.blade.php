@extends('layout')
@section('content')
<div class="col-sm-9 padding-right">
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<?php 
			$mesage=Session::get('mesage');
			if($mesage){
				echo '<h1 style "color:green;" class="text-alert">'.$mesage.'</h1>';
				Session::put('mesage',null);
			}

			 ?>
			
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<form action="{{URL::to('/update-cart')}}" method="POST">
						@csrf
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description">Tên sản phẩm</td>
							<td class="price">Đơn giáGiá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Tổng tiền</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@php
							$total=0;
						@endphp

						@foreach(Session::get('cart') as $key=>$cart)
						@php
							$subtotal=$cart['product_price']*$cart['product_qty'];
							$total+=$subtotal;
						@endphp
						<tr>
							<td class="cart_product">
								<a href=""><img style="height: 60px;width: 60px;" src="{{$cart['product_image']}}" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$cart['product_name']}}</a></h4>
								
							</td>
							<td class="cart_price">
								<p>{{number_format($cart['product_price'],0,',','.')}}VNĐ</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									
									
									<input class="cart_quantity_input" type="number" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}">
									
								
									
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{number_format($subtotal,0,',','.')}}VNĐ</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete-cart/'.$cart['session_id'])}}" ><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach
						<td>
							<input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default check_out">
						</td>

						
					</tbody>
					
				</form>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
		<section id="do_action">
		<div class="container">
			<div class="heading">
				
			</div>
			<div class="row">
				
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Tổng tiền thanh toán<h2 style="color:red;">{{number_format($total,0,',','.')}}VNĐ</h2></li>
							<li>Eco Tax <span>$2</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>$61</span></li>
						</ul>
							<a class="btn btn-default update" href="">Thanh toán</a>
							<a href="{{URL::to('/trang-chu')}}" class="btn btn-default check_out" href="">Tiếp tục mua hàng</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

</div>
@endsection