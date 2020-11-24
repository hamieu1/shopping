	<h1>Thông tin khách hàng</h1>
	<p>Tên khách hàng: {{$name}}</p>
	<p>Email: {{$email}}</p>
	<p>Địa chỉ: {{$diachi}}</p>
	<p>Số điện thoại: {{$sdt}}</p>
	<h1>Thông tin đơn hàng</h1>
	<table>
		<tr>
			<th>Sản phẩm</th>
			<th>Đơn giá</th>
			<th>Số lượng</th>
			<th>Thành tiền</th>
		</tr>
	@foreach ($cart as $items)
		<tr>
			<td>{{$items->name}}</td>
			<td>{{$items->price}}</td>
			<td>{{$items->qty}}</td>
			<td>{{$items->price * $items->qty}}</td>
		</tr>
	@endforeach
	</table>
	<h2>Tổng tiền: {{Cart::total()}}</h2>