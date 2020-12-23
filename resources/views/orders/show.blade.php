@extends('layouts.app')

@section('content')
    <!--Section: Block Content-->

    <div class="container">
        <div class="card">
            <div><strong>Congratulations! These are the products on the way:</strong></div>
            <table class="table table-hover shopping-cart-wrap">
                <thead class="text-muted">
                @foreach($orders as $order)
                    @php
                    $product = \App\Models\Product::find($order['product_id']);
                    $product['quantity'] = $order['quantity'];
                    @endphp
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col" width="120">Quantity</th>
                    <th scope="col" width="120">Price</th>
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
                        <div>{{$product['quantity']}}</div>
                    </td>
                    <td>
                        <div class="price-wrap">
                            <var class="price">Tk. {{$product->price}} each</var>
                        </div> <!-- price-wrap .// -->
                    </td>
                </tr>
                @endforeach


                </tbody>
            </table>
             <!-- card.// -->


    </div>
    <!--Section: Block Content-->

@endsection
