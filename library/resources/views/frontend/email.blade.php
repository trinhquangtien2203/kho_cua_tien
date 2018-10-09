@extends('frontend.master')
@section('title','Hoàn thành')
@section('main')
	

					<div id="wrap-inner">
						<div id="khach-hang">
							<h3>Thông tin khách hàng</h3>
							<p>
								<span class="info">Khách hàng: </span>
								{{$info['name']}}
							</p>
							<p>
								<span class="info">Email: </span>
								{{$info['email']}}
							</p>
							<p>
								<span class="info"> </span>
								{{$info['phone']}}
							</p>
							<p>
								<span class="info">Địa chỉ: </span>
								{{$info['add']}}
							</p>
						</div>						
						<div id="hoa-don">
							<h3>Hóa đơn mua hàng</h3>							
							<table class="table-bordered table-responsive">
								<tr class="bold">
									<td width="30%">Tên sản phẩm</td>
									<td width="25%">Giá</td>
									<td width="20%">Số lượng</td>
									<td width="15%">Thành tiền</td>
								</tr>
								@foreach($cart as $carts)
								<tr>
									<td>{{$carts->name}}</td>
									<td class="price">{{number_format($carts->price)}} VNĐ</td>
									<td>{{$carts->quantity}}</td>
									<td class="price">{{number_format($carts->price*$carts->quantity)}} VNĐ</td>
								</tr>
								@endforeach
								<tr>
									<td colspan="3">Tổng tiền:</td>
									<td class="total-price">{{$total}}VNĐ</td>
								</tr>
							</table>
						</div>
						<div id="xac-nhan">
							<br>
							<p align="justify">
								<b>Quý khách đã đặt hàng thành công!</b><br />
								• Sản phẩm của Quý khách sẽ được chuyển đến Địa chỉ có trong phần Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.<br />
								• Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước khi giao hàng 24 tiếng.<br />
								<b><br />Cám ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng Tôi!</b>
							</p>
						</div>
					</div>					
@stop

@section('style')
<style>
*{
	padding: 0;
	margin: 0;
}
body{
	font-family: arial;
	font-size: 14px;
	color: #666;
}
#header{
	background: #FF9600;		
}
#logo, #search, #cart{
	height: 98px;
}
#logo h1{	
	line-height: 98px;
}
#search input{
	margin-top: 30px;
	float: left;
}
#search input[type=text]{
	width: 300px;
	height: 35px;
	border: 1px solid #fff;
	background: transparent;
	color: #fff;
	font-size: 12px;
	padding-left: 15px;
	margin-left: 30px;
}
#search input[type=submit]{
	height: 35px;
	background: #fff;
	padding: 0 15px;
	border: none;
	color: #ff9600;
	font-size: 12px;
}	
@media (min-width: 768px) {
	.navbar-form .input-group .form-control,
	.navbar-form .input-group .input-group-btn{
		width: 100%;
	}
}
#cart{		
	background: url('../img/home/cart.png') no-repeat center;
	color: #fff;
	line-height: 98px;
	font-weight: bold;
}
#cart a:first-child{	
	color: #fff;
}	
#cart a:last-child{
	margin-left: 55px;
	color: #ff6600;
}	
@media (min-width: 960px) and (max-width: 1210px){
	#cart a:first-child{		
		color: #fff;
	}	
	#cart a:last-child{
		margin-left: 40px;
		color: #ff6600;
	}	
}

#body{
	margin-top: 15px;
}
/* #sidebar{
	padding-right: 11px;
padding-left: 12px;
} */
#menu{
	background: #fbfbfb;
	border: 1px solid #ddd;
	
}
.menu-item{
	list-style: none;
	height: 40px;
	line-height: 40px;
	border-bottom: 1px solid #ddd;
	padding-left: 15px;
}
.menu-item a{
	color: #666;
}
.menu-item:first-child{
	background: #f5f5f5;
	text-transform: uppercase;
}
.menu-item:last-child{
	border: none;
}
.banner-l-item{
	margin-top: 15px;
	max-width: 100%;
}
.banner-l-item img{
	border: none;
	padding: 0;
	border-radius: 0;
}
@media (min-width: 750px) and (max-width: 992px){
	.menu-item:first-child{
		font-size: 12px;
		font-weight: bold;
	}
	.menu-item{
		font-size: 12px;
	}
	#banner-l-item img{
		min-width: 100%;
	}

}
.banner-t-item{
	margin-top: 15px;	
}

.banner-t-item img{
	border: none;
	padding: 0;
	border-radius: 0;
}

.products h3{
	margin-top: 15px;
	font-size: 18px;
	color: #ff9600;
	text-transform: uppercase;
}

.product-list{
	margin: 0;
}

.product-item{
	border: 1px solid #ddd;
	text-align: center;
	padding: 15px;
	position: relative;		
}
.product-item img{
	border: none;
	padding: 0;
	border-radius: 0;
}
.product-item:hover .marsk{
	display: block;
}
.product-item img{
	margin-bottom: 15px;
}
.product-item a{
	color: #666;
}
.price{
	font-weight: bold;
	color: #D60000;
}
.marsk{
	background: #000;
	position: absolute;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
	opacity: 0.75;
	display: none;		
}
.marsk a{
	color: #fff;
	position: absolute;
	top: 50%;
	/* left: 0;right:0; margin: auto;width: 100%; cho width de thanh block, vi width lÃ  block, a la inline */				
	margin-left:-37px;
}
#footer{
	margin-top: 15px;
}
#footer-t{
	background: #FF9600;
	color: #fff;
	padding: 15px 0 0 0;		
}

#footer-t h3{
	font-size: 18px;
	text-transform: capitalize;
}

#footer-b{
	background: #FF6700;
	color: #fff;
	font-size: 13px;
	position: relative;
}
#footer-b p{
	margin: 0;
	height: 100px;
	line-height: 100px;
}	
#scroll{
	position: absolute;
	top: 0;
	right: 0;
}
#menu1{
	display: flex;
	flex-direction: row;
	justify-content: center !important;
}

/* reponsive */
@media (max-width: 992px) {
	#search{
		display: none;
	}
	#slider{
		display: none;
	}
	#cart{
		margin-left: 300px;
		background: url('../img/home/icon-cart.png') no-repeat center;		
		color: #fff;
		line-height: 98px;
		font-weight: bold;
	}
	#cart a:first-child{
		margin-left: -70px;
		color: #fff;
	}	
	#cart a:last-child{
		margin-left: 50px;
		color: #ff6600;
	}	
	
	#menu{
		margin-bottom: 20px;
	}
	#v-banner{
		margin-bottom: 10px;
	}
	#h-banner img{
		padding: 10px 0px;
	}
	.list-product h3{
		text-align: center;
	}
	#footer-logo{
		text-align: left;
	}
}
@media (max-width: 768px) {
	#cart{
		display: none;
	}
	#header{
		text-align: center;
	}
	#scroll{
		display: none;
	}
}

nav a#pull {
	display: none;
}
@media only screen and (max-width : 480px) {
	nav {
		border-bottom: 0;
	}
	nav ul {
		display: none;
		height: auto;
	}
	#logo{
		position: relative;
	}
	nav a#pull {
		display: block;
		float: left;
		/* background-color: #ff9600; */
		/* width: 100%; */
		position: absolute;
		top: 50%;
	}
	nav a#pull:after {
		content:"";
		/* background: url('../img/home/nav.png') no-repeat; */
		width: 30px;
		height: 30px;
		display: inline-block;
		position: absolute;
		/* rightright: 15px; */
		top: 0px;
		right: 0;
	}
	#menu{
		border: 0;
	}
}

@media only screen and (max-width : 320px) {
	nav li {
		display: block;
		float: none;
		width: 100%;
	}
	#menu{
		border: 0;
	}
   /*  nav li a {
        border-bottom: 1px solid #576979;
        } */
    }
*{
	padding: 0;
	margin: 0;
}
body{
	font-family: arial;
	font-size: 14px;
	color: #666;
}
#header{
	background: #FF9600;		
}
#logo, #search, #cart{
	height: 98px;
}
#logo h1{	
	line-height: 98px;
}
#search input{
	margin-top: 30px;
	float: left;
}
#search input[type=text]{
	width: 300px;
	height: 35px;
	border: 1px solid #fff;
	background: transparent;
	color: #fff;
	font-size: 12px;
	padding-left: 15px;
	margin-left: 30px;
}
#search input[type=submit]{
	height: 35px;
	background: #fff;
	padding: 0 15px;
	border: none;
	color: #ff9600;
	font-size: 12px;
}	
@media (min-width: 768px) {
	.navbar-form .input-group .form-control,
	.navbar-form .input-group .input-group-btn{
		width: 100%;
	}
}
#cart{		
	background: url('../img/home/cart.png') no-repeat center;
	color: #fff;
	line-height: 98px;
	font-weight: bold;
}
#cart a:first-child{	
	color: #fff;
}	
#cart a:last-child{
	margin-left: 55px;
	color: #ff6600;
}	
@media (min-width: 960px) and (max-width: 1210px){
	#cart a:first-child{		
		color: #fff;
	}	
	#cart a:last-child{
		margin-left: 40px;
		color: #ff6600;
	}	
}

#body{
	margin-top: 15px;
}
/* #sidebar{
	padding-right: 11px;
padding-left: 12px;
} */
#menu{
	background: #fbfbfb;
	border: 1px solid #ddd;
	
}
.menu-item{
	list-style: none;
	height: 40px;
	line-height: 40px;
	border-bottom: 1px solid #ddd;
	padding-left: 15px;
}
.menu-item a{
	color: #666;
}
.menu-item:first-child{
	background: #f5f5f5;
	text-transform: uppercase;
}
.menu-item:last-child{
	border: none;
}
.banner-l-item{
	margin-top: 15px;
	max-width: 100%;
}
.banner-l-item img{
	border: none;
	padding: 0;
	border-radius: 0;
}
@media (min-width: 750px) and (max-width: 992px){
	.menu-item:first-child{
		font-size: 12px;
		font-weight: bold;
	}
	.menu-item{
		font-size: 12px;
	}
	#banner-l-item img{
		min-width: 100%;
	}

}
.banner-t-item{
	margin-top: 15px;	
}

.banner-t-item img{
	border: none;
	padding: 0;
	border-radius: 0;
}

#footer{
	margin-top: 15px;
}
#footer-t{
	background: #FF9600;
	color: #fff;
	padding: 15px 0 0 0;		
}

#footer-t h3{
	font-size: 18px;
	text-transform: capitalize;
}

#footer-b{
	background: #FF6700;
	color: #fff;
	font-size: 13px;
	position: relative;
}
#footer-b p{
	margin: 0;
	height: 100px;
	line-height: 100px;
}	
#scroll{
	position: absolute;
	top: 0;
	right: 0;
}

/* reponsive */
@media (max-width: 992px) {
	#search{
		display: none;
	}
	#slider{
		display: none;
	}
	#cart{
		margin-left: 300px;
		background: url('../img/home/icon-cart.png') no-repeat center;		
		color: #fff;
		line-height: 98px;
		font-weight: bold;
	}
	#cart a:first-child{
		margin-left: -70px;
		color: #fff;
	}	
	#cart a:last-child{
		margin-left: 50px;
		color: #ff6600;
	}	
	
	#menu{
		margin-bottom: 20px;
	}

	#footer-logo{
		text-align: left;
	}
}
@media (max-width: 768px) {
	#cart{
		display: none;
	}
	#header{
		text-align: center;
	}
	#scroll{
		display: none;
	}
}

nav a#pull {
	display: none;
}
@media only screen and (max-width : 480px) {
	nav {
		border-bottom: 0;
	}
	nav ul {
		display: none;
		height: auto;
	}
	#logo{
		position: relative;
	}
	nav a#pull {
		display: block;
		float: left;
		/* background-color: #ff9600; */
		/* width: 100%; */
		position: absolute;
		top: 50%;
	}
	nav a#pull:after {
		content:"";
		/* background: url('../img/home/nav.png') no-repeat; */
		width: 30px;
		height: 30px;
		display: inline-block;
		position: absolute;
		/* rightright: 15px; */
		top: 0px;
		right: 0;
	}
	#menu{
		border: 0;
	}
}

@media only screen and (max-width : 320px) {
	nav li {
		display: block;
		float: none;
		width: 100%;
	}
	#menu{
		border: 0;
	}
}

.my-btn{
	color: #fff;
	border-radius: 0px;
	border-color: #ff9600;
	background: #ff9600;
}
.my-btn:last-child{
	background: #d9534f;
	border-color: #d43f3a;
}      


.btn-danger {
	color: #fff;
	background-color: #ff9600;
	border-color: #fff;
}

.btn-danger:hover {
	color: #fff;
	background-color: #ff9600;
	border-color: #fff;
}
#wrap-inner{
	margin-top: 15px;
}
#khach-hang h3{
	color: #ff9600;
	margin-bottom: 15px;
}
#hoa-don h3{
	color: #ff9600;
	margin-bottom: 15px;
}
table{
	font-size: 16px;
}
table td{
	padding: 15px 5px;
}
table td.price{
	color: red;
}
table td.total-price{
	font-weight: bold;
	color: #e60000;
}
table tr.bold{
	font-weight: bold;
}
.info{
	font-weight: bold
}
p.info{
	margin-top: 20px;
}
</style>
@stop