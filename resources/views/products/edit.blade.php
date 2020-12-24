@extends('layouts.sidebar')

@section('content')
    <div class="container">
        <form action="/products/{{$product['id']}}" enctype="multipart/form-data" method="post">
            @method('patch')
            <div class="row">
                @csrf
                <div class="col-8 offset-2">
                    <div class="row">
                        <h1>Edit Product: {{$product->name}}</h1>
                    </div>

                    <!--Name--->
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label">Name</label>


                        <input id="name"
                               type="text"
                               class="form-control @error('name') is-invalid @enderror"
                               name="name"
                               value="{{ $product->name }}"
                               autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>


                    <!--Description-->
                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label">Description</label>


                        <input id="description"
                               type="text"
                               class="form-control @error('description') is-invalid @enderror"
                               name="description"
                               value="{{ $product->description }}"
                               autocomplete="description" autofocus>

                        @error('description')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>



                    <!--Price-->
                    <div class="form-group row">
                        <label for="price" class="col-md-4 col-form-label">Price</label>


                        <input id="price"
                               type="number"
                               min="0"
                               class="form-control @error('price') is-invalid @enderror"
                               name="price"
                               value="{{ $product->price }}"
                               autocomplete="price" autofocus>

                        @error('price')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>


                    <!--category-->
                    <div class="form-group row">
                        <label for="category" class="col-md-4 col-form-label">Category</label>

                        <select id= "category" name="category">
                            <option value="{{$product['category']}}">{{$product['category']}}</option>
                            @foreach(\App\Models\Category::all() as $category)
                            <option value="{{$category->name}}">{{$category->name}}</option>
                            @endforeach
                        </select>

                        @error('category')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>



                    <!--Brand-->
                    <div class="form-group row">
                        <label for="brand" class="col-md-4 col-form-label">Brand Name</label>
                        <select id="brand" name="brand">
                             <option value="{{$product['brand']}}">{{$product['brand']}}</option>
                            @foreach(\App\Models\Brand::all() as $brand)
                                <option value="{{$brand->name}}">{{$brand->name}}</option>
                            @endforeach
                        </select>

                        @error('brand')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>

                    <!--Image-->
                    <div class="row">

                        <label for="image" class="col-md-4 col-form-label">Product Image</label>
                        <input type="file" class="form-control-file" id="image" name="image">

                        @error('image')
                        <strong>{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="row pt-4">
                        <button class="btn btn-primary form-control">Update</button>
                    </div>


                </div>
            </div>
        </form>
        <div class="pt-2">
        <a href="/products/remove/{{$product->id}}}">
        <div class="row"><div class="offset-2 col-8"><div class="row">
                    <button class="btn btn-outline-danger form-control">Delete</button>
                </div>
            </div></div>
        </a>
        </div>
    </div>
@endsection
