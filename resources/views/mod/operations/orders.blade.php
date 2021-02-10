@extends('layouts.modbar')
@section('content')

    <div class="container" xmlns="http://www.w3.org/1999/html">
        <div class="card">
            <div><strong>Ordered from shop</strong></div>
            <table class="table table-hover shopping-cart-wrap">
                <thead class="text-muted">
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col" width="120">Quantity</th>
                    <th scope="col" width="120">Price</th>
                    <th scope="col" width="200" class="text-right">To</th>
                </tr>
                </thead>
                @foreach($mainOrders as $order)
                    @php
                        $product = \App\Models\Product::all()->find($order->main_product_id);
                        $toUser=\App\Models\User::all()->find($order->user_id);
                    @endphp
                    @if($product!=null && $toUser!=null)
                        <tbody>
                        <tr>
                            <td>
                                <figure class="media">
                                    <div class="img-wrap pr-3"><img src="/storage/{{$product->image}}" style="height: 75px; width: 75px" class="img-thumbnail img-sm" alt=""></div>
                                    <figcaption class="media-body">
                                        <h6 class="title text-truncate">{{$product->name}}</h6><br>
                                        <h6 class="title text-muted">Stock: {{$product->stock}}</h6>
                                    </figcaption>
                                </figure>
                            </td>
                            <td>
                                <label>
                                    <div>{{$order->quantity}}</div>
                                </label>
                            </td>
                            <td>
                                <div class="price-wrap">
                                    <var class="price">Tk. {{$product->price}} each</var>
                                </div> <!-- price-wrap .// -->
                            </td>
                            <td>
                                <div class="price-wrap text-right">
                                    <var class="price"> {{$toUser->name}}</var><br>
                                    {{$toUser->profile->address}}<br>
                                    Contact Number: {{$toUser->profile->contact_number}}
                                </div> <!-- price-wrap .// -->
                            </td>
                        </tr>
                        @endif
                        @endforeach

                        </tbody>

            </table>
        </div> <!-- card.// -->


        <div class="card">
            <div><strong>Ordered from user</strong></div>
                <table class="table table-hover shopping-cart-wrap">
                    <thead class="text-muted">
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col" width="120">Quantity</th>
                            <th scope="col" width="120">Price</th>
                            <th scope="col" width="200" class="text-right">From</th>
                            <th scope="col" width="200" class="text-right">To</th>
                        </tr>
                    </thead>
                    @foreach($orders as $order)
                        @php
                            $product = \App\Models\Product::all()->find($order->product_id);
                            $toUser=\App\Models\User::all()->find($order->user_id);
                            if($product!=null && $toUser!=null) {
                                $fromUser=$product->user;

                            }
                        @endphp
                    @if($product!=null && $toUser!=null)
                    <tbody>
                    <tr>
                        <td>
                            <figure class="media">
                                <div class="img-wrap pr-3"><img src="/storage/{{$product->image}}" style="height: 75px; width: 75px" class="img-thumbnail img-sm" alt=""></div>
                                <figcaption class="media-body">
                                    <h6 class="title text-truncate">{{$product->name}}</h6><br>
                                    <h6 class="title text-muted">Stock: {{$product->stock}}</h6>
                                </figcaption>
                            </figure>
                        </td>
                        <td>
                            <label>
                                <div>{{$order->quantity}}</div>
                            </label>
                        </td>
                        <td>
                            <div class="price-wrap">
                                <var class="price">Tk. {{$product->price}} each</var>
                            </div> <!-- price-wrap .// -->
                        </td>
                        <td>
                            <div class="price-wrap text-right">
                                <var class="price"> {{$fromUser->name}}</var><br>
                                {{$fromUser->profile->address}}<br>
                                Contact Number: {{$fromUser->profile->contact_number}}
                            </div> <!-- price-wrap .// -->
                        </td>

                        <td>
                            <div class="price-wrap text-right">
                                <var class="price"> {{$toUser->name}}</var><br>
                                {{$toUser->profile->address}}<br>
                                Contact Number: {{$toUser->profile->contact_number}}
                            </div> <!-- price-wrap .// -->
                        </td>
                    </tr>
                    @endif
                    @endforeach

                    </tbody>

                </table>
        </div> <!-- card.// -->


    </div>
@endsection
