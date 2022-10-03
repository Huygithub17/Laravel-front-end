<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Show Cart</title>
</head>
<body>
<div class="cart_wrapper">
    <div class="cart" data-url="">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table update_cart_url" data-url="">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Images</th>
                            <th scope="col">Product Names</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Sub Total</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        @php
                            $total = 0;
                        @endphp
                        <?php if (!empty($carts)) { ?>
                        <tbody>
                        @foreach($carts  as $id => $cart)
                            @php
                                $total += $cart['price'] * $cart['quantity'];
                            @endphp
                            <tr>
                                <th scope="row">{{$id}}</th>
                                <td>
                                    <img
                                        style="width: 200px; height: 200px; object-fit: contain;"
                                        src="{{config('app.base_url') . $cart['feature_image_path']}}" alt="">
                                </td>
                                <td>{{$cart['name']}}</td>
                                <td>{{number_format($cart['price'])}} VNĐ</td>
                                <td>
                                    <input type="number" value="{{$cart['quantity']}}" min="1" class="quantity">
                                </td>
                                <td>{{number_format($cart['price'] * $cart['quantity'])}} VNĐ</td>
                                <td>
                                    <a data-id="{{$id}}" data-url="{{route('cart.update')}}" class="btn btn-primary card_update">Update</a>
                                    <a data-id="{{$id}}" data-url="{{route('cart.delete')}}" class="btn btn-danger card_delete">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <?php } else { ?>
                        <tbody>

                        </tbody>
                        <?php } ?>

                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <h2 class="total_price"> Total: {{number_format($total)}} VNĐ</h2>
                </div>
                <div class="col-md-6">
                    <a data-url="{{route('cart.deleteAll')}}" class="btn btn-danger delete_all_cart float-right">Clear All
                        Cart</a>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <a class="btn btn-info" href="{{route('admin')}}">Continue Shopping</a>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-12 text-center">
        <a class="btn btn-info" href="{{route('cart.checkOutForm')}}">Check out</a>
    </div>
</div>

</body>

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" ></script>

{{--Phải đặt thẻ script này ở bên dưới thì mới load được.--}}
<script src="{{asset('cart/cart.js') }}" type="text/javascript"> </script>

</html>
