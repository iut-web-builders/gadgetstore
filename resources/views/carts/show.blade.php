@extends('layouts.app')

@section('content')
    <!--Section: Block Content-->

    <div class="container" xmlns="http://www.w3.org/1999/html">
        <div class="card">
            <div class="pb-4"><strong><h2>Products from us:</h2></strong></div>
            <form action="/orders/main/store" enctype="multipart/form-data" method="post">
                @csrf
                <table class="table table-hover shopping-cart-wrap">
                    <thead class="text-muted">

                    @foreach($mainProducts as $product)
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col" width="120">Quantity</th>
                            <th scope="col" width="120">Price</th>
                            <th scope="col" width="200" class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <figure class="media">
                                <div class="img-wrap pr-3"><img src="/storage/{{$product->image}}" style="height: 75px; width: 75px" class="img-thumbnail img-sm" alt=""></div>
                                <figcaption class="media-body">
                                    <h6 class="title text-truncate">{{$product->name}}</h6>
                                    <dl class="param param-inline small">
                                        <dt>By: </dt>
                                        <dd>{{$product->user->name}}</dd>
                                    </dl>
                                </figcaption>
                            </figure>
                        </td>
                        <td>
                            <label>
                                <input type="hidden" name="cart_product_id[]"  value="{{$product->id}}" >
                                <input  type="number" name="cart_product_quantity[]" value="0" class="form-control" min="0" max="{{($product->stock)}}">
                            </label>
                        </td>
                        <td>
                            <div class="price-wrap">
                                <var class="price">Tk. {{$product->price}} each</var>
                            </div> <!-- price-wrap .// -->
                        </td>
                        <td class="text-right">
                            <a href="/main-cart/remove/{{$product->id}}" class="btn btn-outline-danger"> × Remove</a>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>

                </table>
                @if(count($mainProducts)!=0)
                    <div><button id="main_cart_btn" class="btn form-control btn-outline-primary">Order!</button></div>
                @else
                    <h4 class="text-muted">Check out these <a href="/">amazing goods</a>. You will find something worth adding :D </h4>

                @endif
            </form>
            <div><strong><h2>Products you want to buy from others:</h2></strong></div>
            <form action="/orders/store" enctype="multipart/form-data" method="post">
                @csrf
            <table class="table table-hover shopping-cart-wrap">
                <thead class="text-muted">

                @foreach($products as $product)
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col" width="120">Quantity</th>
                    <th scope="col" width="120">Price</th>
                    <th scope="col" width="200" class="text-right">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <figure class="media">
                            <div class="img-wrap pr-3"><img src="/storage/{{$product->image}}" style="height: 75px; width: 75px" class="img-thumbnail img-sm" alt=""></div>
                            <figcaption class="media-body">
                                <h6 class="title text-truncate">{{$product->name}}</h6>
                                <dl class="param param-inline small">
                                    <dt>By: </dt>
                                    <dd>{{$product->user->name}}</dd>
                                </dl>
                            </figcaption>
                        </figure>
                    </td>
                    <td>
                        <label>
                            <input type="hidden" name="cart_product_id[]"  value="{{$product->id}}" >
                            <input  type="number" name="cart_product_quantity[]" value="0" class="form-control" min="0" max="{{$product->stock}}">
                        </label>
                    </td>
                    <td>
                        <div class="price-wrap">
                            <var class="price">Tk. {{$product->price}} each</var>
                        </div> <!-- price-wrap .// -->
                    </td>
                    <td class="text-right">
                        <a href="/carts/remove/{{$product->id}}" class="btn btn-outline-danger"> × Remove</a>
                    </td>
                </tr>
                @endforeach

                </tbody>

            </table>
                @if(count($products)!=0)
                    <div><button id="main_cart_btn" class="btn form-control btn-outline-primary">Order these products from users</button></div>
                @else
                    <h4 class="text-muted">Check out these <a href="/from-you">amazing goods</a> from users like you. You will find something worth adding :D </h4>

                @endif
            </form>

            <div><a href="/orders/show"><button class="btn btn-success form-control">Show My Orders</button></a></div>

        </div> <!-- card.// -->


    </div>
    <!--Section: Block Content-->

@endsection
