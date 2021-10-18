@extends('frontend.master.master')
@section('content')

<head>
    <link rel="stylesheet" type="text/css" href="{{('frontend/assets/css/style.min.css')}}">
</head>

<nav class="breadcrumb-navs">
    <div class="container">
        <ul class="breadcrumb shop-breadcrumb bb-no">
            <li class="passed"><a href="/">Home</a></li>
            <li class="active"><a href="#">Terms And Condition</a></li>
        </ul>
    </div>
</nav>

<div class="container">

    <div class="row">


        <div class="col-md-12">
    
            <p><?php echo @$terms->terms ?></p>
    
    
        </div>
    
    
    </div>

</div>

@endsection