@extends('layouts.app')
@section('content')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>


    </style>

    <body>


    <div>

        <ol>
            @foreach($category->products() as $product)

                    <li  style="list-style-type: none; float: left; padding-bottom: 30px">
                        <div class="pr-4">
                            <a href="products/{{$product->id}}">
                                <div>
                                    <img src="storage/{{$product->image}}"
                                         style="width: 200px; height: 200px; overflow: hidden; position:relative">
                                </div>
                            </a>
                            <div>
                                <a href="products/{{$product->id}}">
                                    <div>{{$product->name}}</div>
                                </a>
                                <div>Tk. {{$product->price}}</div>
                            </div>
                        </div>
                    </li>
            @endforeach
        </ol>

    </div>


    </body>
@endsection
