@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <img src="/storage/{{$product->image}}" class="w-100" alt="">
            </div>
            <div class="col-4">
                <div class="d-flex align-items-center">

                    <div>
                        <div class="font-weight-bold">
                            <a href="/profile/{{$product->user->id}}">
                                <span class="text-dark">{{$product->user->name}}</span>
                            </a>

                        </div>
                    </div>

                </div>
                <hr>
                <p>
            <span class="font-weight-bold">
                    <span class="text-dark">{{$product->name}}</span>
            </span>
                </p>
                <hr>
                <div>{{$product->description}}</div>
                <div>Price: Tk. {{$product->price}}</div>
                <div>Category: {{$product->category}}</div>
                <div>Brand: {{$product->brand}}</div>
                <a href="/carts/add" class="pl-3"><div class="font-weight-bold">Add to Cart</div></a>
            </div>

        </div>
    </div>
@endsection
