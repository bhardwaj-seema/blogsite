@extends('layouts.app')
@section('content')
<div class="container p-5 ">
    <div class="col-md-12 d-flex">
        <div class="col-md-8">

            <div class="heading-about p-4 ">
                <h2>About Us</h2>
            </div>
            <div class="about-content">
                <p>We are Developing Project in Html CSS3 and Javascript projects also php projects</p>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="py-1 bg-gray">
                <div class="container">
                    <div class="border text-center p-3">
                        <h3></h3>
                    </div>
                </div>
            </div>

            <div class="card mt-2"  >
                @foreach ($all_categories as $all_cate_item)
                <ul class="list-group list-group-flush">
                    <a href="{{url('project/'.$all_cate_item->slug)}}" class="text-decoration-none">
                    <li class="list-group-item">{{$all_cate_item->name}}</li>
                    </a>
                   
                  </ul>
                    
                @endforeach
                 
              </div>
    
        </div>
    </div>


</div>
    
@endsection