@extends('layouts.app')
@section('content')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>

        .mainProduct{
            margin-right: 10px;
            margin-bottom: 10px;
            width: 200px;
            height: 200px;
            background-image: url('./image/sample.jpg');
            background-size: cover;
            position: relative;
            min-height: max-content;

        }

        .shortDescription{
            display: block;
            position: absolute;
            bottom: 0;
            width: 100%;
            background-color: black;
            opacity: 70%;
            color: white;
            padding:  2;


        }

        .shortDescription h4,h5{
            margin-top: 5px;
            margin-bottom: 5px;
        }



    </style>

<body>



<div class="row">
    <div class="leftcolumn">
        <div>
            <ol  style="display: flex; flex-wrap:wrap; list-style:none">


                <li class="mainProduct">
                    <div >
                        <div class= "shortDescription">
                            <h4> A product</h4>
                            <h5> Tk. 500</h5>
                        </div>
                    </div>
                </li>



            </ol>
        </div>
    </div>
    <div class="rightcolumn">

        <div class="card">
            <h3>Popular!</h3>
            <div class="fakeimg" onclick="window.location = 'product.html'"><p>Product</p></div>
            <div class="fakeimg" onclick="window.location = 'product.html'"><p>Product</p></div>
            <div class="fakeimg" onclick="window.location = 'product.html'"><p>Product</p></div>
        </div>

    </div>
</div>

<div class="footer">
    <h2>~Have a nice day!~</h2>
</div>

</body>
@endsection
