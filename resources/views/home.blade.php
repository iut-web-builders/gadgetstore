@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-3 p-5">
                <img
                    src="https://images.pexels.com/photos/736230/pexels-photo-736230.jpeg?cs=srgb&dl=pexels-jonas-kakaroto-736230.jpg&fm=jpg" class="rounded-circle w-100" >
            </div>

            <div class="col-8 pt-5">
                <div class="d-flex align-items-baseline justify-content-between">

                    <div class="d-flex align-items-center pb-3">
                        <div class="h4">{{$user->name}}</div>
                    </div>
                        <a href="/products/create">Add new product</a>
                </div>

                <div class="pt-4 font-weight-bold">Title</div>
                <div>Description</div>
                <div> <a href="/profiles/{{$user->id}}/edit">Add Profile Information</a></div>
            </div>
        </div>
        <div class="row pt-5" >
            @foreach($user->products as $product)
                <div class="col-4  pb-3">
                    <a href="/products/{{$product->id}}">
                        <img src="/storage/{{$product->image}}" alt="Image" class="w-100" style="max-height: 400px; max-width: 400px">
                    </a>
                    <div><strong>{{$product->name}}</strong></div>
                </div>

            @endforeach
        </div>

    </div>
@endsection
