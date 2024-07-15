@extends('layouts.app')
@section('content')
 
@section('title', "$post->meta_title")
@section('meta_description', "$post->meta_description")
@section('meta_keyword', "$post->meta_keyword")
<div class="py-5">
    <div class="container">
        <div class="row">
             <div class="col-md-9">
                <div class="category-heading">
                    <h4 class="mb-0"> {!! $post->name !!}</h4>
                </div>
                <div class="mt-4">
                    <h6> {{ $post->category->name .'/'. $post->name }} </h6>
                </div>
                <div class="col-md-12">
                    <img src="{{asset('uploads/post/'.$post->image)}} "   alt="" style="width: 100%; height:350px">
                </div>
                <div class="card card-shadow mt-4">
                    <div class="card-body  post-description">
                        {!! $post->description !!}
                    </div>
                </div>
                {{-- <div class="comment-area mt-4">
                    <div class="card card-body">
                        <h6>Leave a Comment</h6>
                        <form action="{{url('comment')}}" method="post">
                            @csrf
                            <input type="hidden" name="post_slug" value="{{$post->slug}}">
                            <textarea name="comment_body" class="form-control"  rows="3" required>
                            </textarea>

                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>
                    </div>

                    @forelse ($post->comments as $comment)
                    <div class="card card-body shadow-sm mt-3">
                        <div class="detail-area">
                            <h6 class="user-name mb-1">
                                @if ($comment->user)
                                {{$comment->user->name}}
                                    
                                @endif
                                <small class="ms-3 text-primary">Commented On: {{$comment->created_at->format('d-m-y')}} </small>
                            </h6>
                            <p class="user-comment mb-1">
                                 {!! $comment->comment_body !!}
                            </p>
                        </div>
                        <div>
                            <a href="" class="btn btn-primary btn-sm me-2">Edit</a>
                            <a href="" class="btn btn-danger btn-sm me-2">Delete</a>
                        </div>
                    </div>
                        
                    @empty
                    <h5>No Comments</h5>
                        
                    @endforelse
                    

                </div> --}}
             </div>

             <div class="col-md-3">
                <div class="border p-2 my-1">
                    <h4 class=""> </h4>
                </div>
                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Latest Posts</h4>
                    </div>
                    <div class="card-body">
                        @foreach ($latest_posts as $latest_post_item)
                        <a href="{{url('project/'.$latest_post_item->category->slug. '/'.$latest_post_item->slug)}}" class="text-decoration-none">
                            <h4>  {{$latest_post_item->name}} </h4>
                        </a>
                            
                        @endforeach
                    </div>

                </div>


             </div>
        </div>
    </div>
</div>
@endsection