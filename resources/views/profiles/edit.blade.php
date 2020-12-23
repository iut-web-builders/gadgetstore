@extends('layouts.sidebar')
@section('content')
    <div class="container">
        <form action="/profiles/{{$profile->id}}" enctype="multipart/form-data" method="post">
            @method('put')
            <div class="row">
                @csrf
                <div class="col-8 offset-2">
                    <div class="row">
                        <h1>Edit your profile information:</h1>
                    </div>

                    <!--Address-->
                    <div class="form-group row">
                        <label for="address" class="col-3 col-form-label">Address</label>

                        <div class="col-9">
                        <input id="address"
                               type="text"
                               class="form-control @error('address') is-invalid @enderror"
                               name="address"
                               value="{{ $profile['address'] }}"
                               autofocus>

                        @error('address')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                        </div>
                    </div>



                    <!--contact No-->
                    <div class="form-group row">
                        <label for="contact_number" class="col-3 col-form-label">Contact Number</label>
                        <div class="col-1 pt-2" style="background-color: white">+88</div>
                        <div class="col-8">
                        <input id="contact_number"
                               type="number"
                               min="0"
                               class="form-control @error('contact_number') is-invalid @enderror"
                               name="contact_number"
                               value="{{ $profile['contact_number'] }}"
                               autocomplete="contact_number" autofocus>

                        @error('contact_number')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                        </div>
                    </div>


                    <!--Image-->
                    <div class="row form-group">

                        <label for="image" class="col-3 col-form-label">Profile Picture</label>
                        <!input type="hidden" name="image"
                               value="/storage/images/IIr3VzDCmnxptapLU1Puh4T1Leg7fjQaJblDzRTY.jpeg"/>
                        <input type="file" class="col-9 form-control-file" id="image" name="image">

                        @error('image')
                        <strong>{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="row pt-4">
                        <button class="btn btn-primary form-control">Update Information</button>
                    </div>


                </div>
            </div>

        </form>

    </div>
@endsection
