@extends('layouts.app')
@section('title', "$category->meta_title")
@section('meta_description', "$category->meta_description")
@section('meta_keyword', "$category->meta_keyword")
    

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="category-heading">
                    <h4>{{$category->name}}</h4>
                </div>
                @forelse ($post  as $postitem)
                <div class="card card-shadow mt-4">
                    <div class="card-body">
                        <a href="{{url('project/'.$category->slug.'/'.$postitem->slug)}}">
                          <h3 class="post-heading">{{$postitem->name}}</h3>
                        </a>
                        <h6>Posted On: {{$postitem->created_at->format('d-m-y')}}</h6>
                    </div>
                </div>
                    
                @empty
                <div class="card card-shadow mt-4">
                    <div class="card-body">
                        <h3>No Post Available</h3>
                    </div>
                </div>
                    
                @endforelse
                <div class="your-paginate mt-4">
                    {{$post->links()}}
                </div>
                
            </div>
            <div class="col-md-3">
                <div class="border p-2">
                   
                </div>
                 
            </div>
        </div>
    </div>
</div>
@endsection