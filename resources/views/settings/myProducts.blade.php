@extends('layouts.sidebar')
@section('content')

    <div class="container" xmlns="http://www.w3.org/1999/html">
        <div class="card">
            <div><strong>Your Products:</strong></div>
                <table class="table table-hover shopping-cart-wrap">
                    <thead class="text-muted">

                    @foreach($products as $product)
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col" width="120">Stock</th>
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
                                </figcaption>
                            </figure>
                        </td>
                        <td>
                            <label>
                                <div>3</div>
                            </label>
                        </td>
                        <td>
                            <div class="price-wrap">
                                <var class="price">Tk. {{$product->price}} each</var>
                            </div> <!-- price-wrap .// -->
                        </td>
                        <td class="text-right">
                            <a href="/products/{{$product->id}}/edit" class="btn btn-outline-primary">Edit</a>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>

                </table>
        </div> <!-- card.// -->


    </div>
@endsection
