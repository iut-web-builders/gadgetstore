@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div><strong>Categories:</strong></div>
        <table class="table table-hover shopping-cart-wrap">
            <thead class="text-muted">
            <tr>
                <th scope="col">Category</th>
                <th scope="col" width="120">Action</th>
            </tr>
            @foreach($categories as $category)

            </thead>
            <tbody>
            <tr>

                <td>
                    <div class="price-wrap">
                        <var class="price">{{$category->name}}</var>
                    </div> <!-- price-wrap .// -->
                </td>
                <td class="text-right">
                    <a href="category/{{$category->name}}/delete" class="btn btn-outline-danger"> × Remove</a>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>


    <div class="card">
        <div><strong>Brands:</strong></div>
        <table class="table table-hover shopping-cart-wrap">
            <thead class="text-muted">
            <tr>
                <th scope="col">Brand</th>
                <th scope="col" width="120">Action</th>
            </tr>
            @foreach($brands as $brand)

            </thead>
            <tbody>
            <tr>

                <td>
                    <div class="price-wrap">
                        <var class="price">{{$brand->name}}</var>
                    </div> <!-- price-wrap .// -->
                </td>
                <td class="text-right">
                    <a href="brand/{{$brand->name}}/delete" class="btn btn-outline-danger"> × Remove</a>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>
</div>

@endsection
