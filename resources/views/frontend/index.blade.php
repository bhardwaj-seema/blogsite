@extends('layouts.app')
@section('content')

@section('title', "Coder Colon")
@section('meta_description', "Coder Colon Website is Coding Project Website")
@section('meta_keyword', "Coder Colon")

<div class="bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex flex-nowrap mx-2 my-4">
                 <div class="col-md-8 mx-3" >
                    @foreach ($posts as $item)
                        
                    <a href=" {{url('project/'.$item->category->slug.'/'.$item->slug)}}" class="text-decoration-none">
                    <div class="l-contnet items-center text-center" style="height:62vh">
                         
                            
                        
                        <div class="image" style="height:62vh">
                            <img src="{{asset('uploads/post/'.$item->image)}} " alt=" image" style="width:100%" class="l-contnet-img">
                        <div class="l-text-content">
                            <h5>{{$item->name}} </h5>
                            <p>{{$item->slug}} </p>
                        </div>
                        </div>
                       
                        
           
                    </div>
                </a>
                    @endforeach
                 </div>
                 <div class="col-md-4">
                    @foreach ($old_post as $old_post_item)
                    <a href="{{url('project/'.$old_post_item->category->slug.'/'.$old_post_item->slug)}} " class="text-decoration-none">

                    <div class="l-contnet items-center text-center mb-2" style="height: 30vh">
                        
                        <div class="image">
                            <img src="{{asset('uploads/post/'.$old_post_item->image)}}" alt=" image" style="width:100%" class="l-contnet-img">
                        <div class="l-text-content">
                            <h5>{{$old_post_item->name}}</h5>
                            
                        </div>
                        </div>
                    
                    </div>
                </a>
                   

                 @endforeach
                     
                 </div>

            </div>

            <div class="col-md-12">
                <h4 class="my-3">All Categories List</h4>
                <div class="underline"></div>
                <div class="owl-carousel category-carousel owl-theme ">

                    @foreach ($all_categories as $all_cate_item)
                    <div class="item  "> 
                        <a href="{{url('project/'.$all_cate_item->slug)}}" class="text-decoration-none">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h4 class="text-dark"> {{$all_cate_item->name}} </h4>
                                </div>
                            </div>
                        </a>
                    </div>
                        
                    @endforeach
                    
                     
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-1 bg-gray">
    <div class="container">
        <div class="border text-center p-3">
            <h3></h3>
        </div>
    </div>
</div>

 


<div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-4">
                <h4>All Latest Posts</h4>
                <div class="underline"></div>
            </div>
            <div class="col-md-8 d-flex justify-content-center ">
                @foreach ($latest_posts as $latest_post_item)
                <div class="col-md-4 col-lg-4 mx-3">
                    
                        
                    <a href="{{url('project/'.$latest_post_item->category->slug.'/'.$latest_post_item->slug)}}" class="text-decoration-none">
                         
                   
                    <div class="card  ">
                        <img src="{{asset('uploads/post/'.$latest_post_item->image)}}" class="card-img-top  " alt="CoderColon" width="300" height="200">
                        <div class="card-body">
                            <h4 class="text-dark"> {{$latest_post_item->name}} </h4>
                          <div class="d-flex justify-contnet-between">
                             
                            <h6>Posted On: {{$latest_post_item->created_at->format('d-m-y')}} </h6>
                          </div>
                        </div>
                      </div>
                    </a>
                     
                </div>
                @endforeach
                 

            </div>
            <div class="col-md-4">
                <div class="border text-center p-3  ">
                    <h3> </h3>
                </div>

                <div class="col-md-12 my-4">
                    <h4>Popular Posts</h4>
                    <div class="underline"></div>

                    @foreach ($latest_posts as $latest_post_item)
                    <div class="p-3 d-flex">
                        <img src="{{asset('uploads/post/'.$latest_post_item->image)}}" class="card-img-top" alt="CoderColon"  style="width:80px; height:80px">
                        <h4 class="text-dark ms-4"> {{$latest_post_item->name}} </h4>
                    </div>
                        
                    @endforeach
                </div>
            </div>

             
                
            
        </div>
    </div>
</div>
    
@endsection
