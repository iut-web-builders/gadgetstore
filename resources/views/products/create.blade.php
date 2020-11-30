@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/products" enctype="multipart/form-data" method="post">
            <div class="row">
                @csrf
                <div class="col-8 offset-2">
                    <div class="row">
                        <h1>Add New Product</h1>
                    </div>

                    <!--Name--->
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label">Name</label>


                        <input id="name"
                               type="text"
                               class="form-control @error('name') is-invalid @enderror"
                               name="name"
                               value="{{ old('name') }}"
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
                               value="{{ old('description') }}"
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
                               value="{{ old('price') }}"
                               autocomplete="price" autofocus>

                        @error('price')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>


                    <!--category-->
                    <div class="form-group row">
                        <label for="category" class="col-md-4 col-form-label">Category</label>


                        <input id="category"
                               type="text"
                               class="form-control @error('category') is-invalid @enderror"
                               name="category"
                               value="{{ old('category') }}"
                               autocomplete="category" autofocus>

                        @error('category')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>



                    <!--Brand-->
                    <div class="form-group row">
                        <label for="brand" class="col-md-4 col-form-label">Brand Name</label>


                        <input id="brand"
                               type="text"
                               class="form-control @error('brand') is-invalid @enderror"
                               name="brand"
                               value="{{ old('brand') }}"
                               autocomplete="brand" autofocus>

                        @error('brand')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>

                    <!--Image-->
                    <div class="row">

                        <label for="image" class="col-md-4 col-form-label">Post Image</label>
                        <input type="file" class="form-control-file" id="image" name="image">

                        @error('image')
                        <strong>{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="row pt-4">
                        <button class="btn btn-primary form-control">Add new Post</button>
                    </div>


                </div>
            </div>
        </form>

    </div>
@endsection
