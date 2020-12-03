@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    Hi there, regular user
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-3 p-5">
                <img
                    src="https://images.pexels.com/photos/736230/pexels-photo-736230.jpeg?cs=srgb&dl=pexels-jonas-kakaroto-736230.jpg&fm=jpg" class="rounded-circle w-100" >
            </div>

            <div class="col-9 pt-5">
                <div class="d-flex align-items-baseline justify-content-between">

                    <div class="d-flex align-items-center pb-3">
                        <div class="h4">{{$user->name}}</div>
                    </div>


                        <a href="/products/create">Add new product</a>

                </div>
               <!-- @can('update',$user->profile)-->
                    <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
               <!-- @endcan-->

                <div class="pt-4 font-weight-bold">Title</div>
                <div>Description</div>
                <div> <a href="#">Link</a></div>
            </div>
        </div>
        <div class="row pt-5" >
            @foreach($user->products as $post)
                <div class="col-4  pb-3">
                    <a href="/p/{{$post->id}}">
                        <img src="/storage/{{$post->image}}" alt="Image" class="w-100">
                    </a></div>

            @endforeach
        </div>

    </div>
@endsection
