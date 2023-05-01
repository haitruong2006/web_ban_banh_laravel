<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<!-- sentData được truyền từ app\Mail\SendMail.php -->
    <h1>{{ $sentData['footer'] }}</h1>
	<h1>{{ $sentData['title'] }}</h1>
    <table class="table table-border table-striped">
        <thead class="thead-inverse">
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>SL</th>
                <th>Giá</th>
                <th>Tổng</th>

            </tr>
            </thead>
            <!-- $stt=0; -->
            @if(Session::has('cart'))
            @foreach($product_cart as $product)
            <tbody>
                <tr>
                    <td scope="row"></td>

                    <td>{{ $product['item']['name'] }}</td>

                    <td>{{ $product['qty'] }}</td>

                    @if($product['item']['promotion_price'] > 0)
                    <td>{{ number_format($product['item']['promotion_price']) }}</td>
                    @else
                    <td>{{ number_format($product['item']['unit_price']) }}</td>
                    @endif

                    @if($product['item']['promotion_price'] > 0)
                    <td>{{ number_format($product['qty']*$product['item']['promotion_price']) }}</td>
                    @else
                    <td>{{ number_format($product['qty']*$product['item']['unit_price']) }}</td>
                    @endif
                </tr>

            </tbody>
            @endforeach
            @else
            <h1>Khoong cos gio hang</h1>
            @endif
    </table>

</body>
</html>
