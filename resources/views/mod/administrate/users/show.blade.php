@extends('layouts.app')

@section('content')
    <!--Section: Block Content-->

    <div class="container">
        <div class="card">
            <div><strong>Mods:</strong></div>
            <table class="table table-hover shopping-cart-wrap">
                <thead class="text-muted">
                <tr>
                    <th scope="col">User</th>
                    <th scope="col" width="120">Approval</th>
                    <th scope="col" width="120">Admin</th>
                    <th scope="col" width="120">Remove</th>
                </tr>
                @foreach($mods as $user)

                </thead>
                <tbody>
                <tr>
                    <td>
                        <figure class="media">
                            <div class="img-wrap pr-3"><img src="/storage/{{$user->profile->image}}" style="height: 75px; width: 75px" class="img-thumbnail img-sm" alt=""></div>
                            <figcaption class="media-body">
                                <h6 class="title text-truncate">{{$user->name}}</h6>
                                <dl class="param param-inline small">
                                    <dt>From </dt>
                                    <dd>{{$user->profile->address}}</dd>
                                </dl>
                            </figcaption>
                        </figure>
                    </td>
                    <td>
                        @if($user->approval->status==false)
                        <a href="users/{{$user->id}}/approve" class="btn btn-outline-success"> Approve </a>
                        @else <div>Approved</div>
                        @endif
                    </td>
                    <td>
                        <div class="price-wrap">
                            <var class="price">Is Admin</var>
                        </div> <!-- price-wrap .// -->
                    </td>
                    <td class="text-right">
                        <a href="users/{{$user->id}}/delete" class="btn btn-outline-danger"> × Remove</a>
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>


            <table class="table table-hover shopping-cart-wrap">
                <thead class="text-muted">
                <tr>
                    <th scope="col">User</th>
                    <th scope="col" width="120">Remove</th>
                </tr>
                @foreach($users as $user)

                </thead>
                <tbody>
                <tr>
                    <td>
                        <figure class="media">
                            <div class="img-wrap pr-3"><img src="/storage/{{$user->profile->image}}" style="height: 75px; width: 75px" class="img-thumbnail img-sm" alt=""></div>
                            <figcaption class="media-body">
                                <h6 class="title text-truncate">{{$user->name}}</h6>
                                <dl class="param param-inline small">
                                    <dt>From </dt>
                                    <dd>{{$user->profile->address}}</dd>
                                </dl>
                            </figcaption>
                        </figure>
                    </td>

                    <td class="text-right">
                        <a href="general-users/{{$user->id}}/delete" class="btn btn-outline-danger"> × Remove</a>
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>

        </div>

@endsection
