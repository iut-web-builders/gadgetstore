@extends('layouts.app')
@section('content')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>



    </style>

<body>



<div class="row">
    <div>
        <div class="row">
            <ol class="d-flex">

                @foreach(\App\Models\Product::all() as $product)

                <li style="list-style-type: none">
                    <div class="pr-4">

                        <div >
                        <img src="storage/{{$product->image}}" style="width: 200px; height: 200px; overflow: hidden; position:relative" >
                        </div>
                        <div>
                            <div>{{$product->name}}</div>
                            <div>Tk. {{$product->price}}</div>
                        </div>
                    </div>
                </li>

                @endforeach
            </ol>
        </div>
    </div>
</div>


</body>
@endsection
