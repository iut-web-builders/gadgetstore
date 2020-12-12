@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/profiles/{{$profile->id}}" enctype="multipart/form-data" method="post">
            @method('patch')
            <div class="row">
                @csrf
                <div class="col-8 offset-2">
                    <div class="row">
                        <h1>Edit your profile information:</h1>
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


                    <!--Address-->
                    <div class="form-group row">
                        <label for="address" class="col-md-4 col-form-label">Address</label>


                        <input id="address"
                               type="text"
                               class="form-control @error('address') is-invalid @enderror"
                               name="address"
                               value="{{ old('address') }}"
                               autofocus>

                        @error('address')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>



                    <!--Price-->
                    <div class="form-group row">
                        <label for="contact_number" class="col-md-4 col-form-label">Contact Number</label>


                        <input id="contact_number"
                               type="number"
                               min="0"
                               class="form-control @error('contact_number') is-invalid @enderror"
                               name="contact_number"
                               value="{{ old('contact_number') }}"
                               autocomplete="contact_number" autofocus>

                        @error('contact_number')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>


                    <!--category-->
                    <div class="form-group row">
                        <label for="category" class="col-md-4 col-form-label">Category</label>

                        <select id= "category" name="category">
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
                        <button class="btn btn-primary form-control">Add new Post</button>
                    </div>


                </div>
            </div>
        </form>

    </div>
@endsection
