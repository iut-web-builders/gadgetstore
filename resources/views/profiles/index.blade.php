@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($products as $product)
            <div class="row">
                <div class="col-6 offset-3 pt-2 pb-4">


            <span class="font-weight-bold">
                    <span class="text-dark">{{$product->name}}</span>
            </span>
                    <div>{{$product->description}}</div>
                    <div>{{$product->price}}</div>
                </div>
            </div>

        @endforeach
        <div class="row">
            <div class="d-flex  col-12 justify-content-center">
                {{$posts->links('vendor.pagination.custom') }}
            </div>
        </div>
    </div>
@endsection
