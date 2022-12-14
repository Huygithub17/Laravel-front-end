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
<div class="checkout_wrapper">
    <div class="row">
        <div class="col-md-5">
            <div class="cart">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product Images</th>
                                    <th scope="col">Product Names</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Sub Total</th>
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
                                        <td>{{number_format($cart['price'])}} VN??</td>
                                        <td>
                                            <input type="number" value="{{$cart['quantity']}}" min="1" class="quantity">
                                        </td>
                                        <td>{{number_format($cart['price'] * $cart['quantity'])}} VN??</td>

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
                            <h2> Total: {{number_format($total)}} VN??</h2>
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

        <div class="col-md-7">
            @include('cart.components.check-out-form-component')
        </div>
    </div>
</div>

</body>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" ></script>

{{--<script src="{{asset('cart/checkout.js') }}" type="text/javascript"> </script>--}}

<script src="{{asset('vendors/Sweet_alert_2/sweetalert2@11.js') }}" type="text/javascript"> </script>


</html>
