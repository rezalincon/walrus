@extends('frontend.master.master')
@section('content')

<div class="page-wrapper">   
    <!-- Start of Main-->
    <main class="main">
      <div class="container">

          <div class="card">
              <div class="card-header">
              </div>
              <div class="card-body">
                  <h2 class="card-title text-center">{{ $data->sub_menu }}</h2>
                  <p class="card-text">{!!$data->sub_menu_details!!}</p>
                 
              </div>
          </div>

      </div>

    </main>
   

   
@endsection