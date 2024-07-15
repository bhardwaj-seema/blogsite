@extends('layouts.master')
@section('title' , 'Update Post')
    
@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <div> {{$error}} </div>
                    
                @endforeach
            </div>
                
            @endif
      <div class="card-header">
        <h4>
            Edit Posts <a href="{{url('admin/posts')}}" class="btn btn-danger float-end">Back </a>
        </h4>
        <div class="card-body">
            <form action="{{url('admin/update-post/'.$post->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="">Category</label>
                    <select name="category_id" class="form-control" >
                        <option value="">-- select category --</option>
                        @foreach ($category as $cateitem)
                        <option value="{{$cateitem->id}}" {{$post->category_id == $cateitem->id ? 'selected': ''}}>{{$cateitem->name}} </option>
                            
                        @endforeach
                       
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Post Name</label>
                    <input type="text" name="name" value="{{$post->name}}" class="form-control" />

                </div>

                <div class="mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug" value="{{$post->slug}}" class="form-control" />
                </div>

                <div class="mb-3">
                    <label for="">Description</label>
                    <textarea  rows="4" id="my_summernote" name="description" class="form-control"> {!! $post->description !!} </textarea>

                </div>

                <div class="mb-3">
                    <label for="">Image</label>
                    <input type="file" class="form-control" name="image">
                </div>

                 

                <div class="mb-3">
                    <label for="">page Link</label>
                    <input type="text" name="web_iframe" value="{{$post->web_iframe}}" class="form-control" id="">
                </div>

                <h6>SEO Tags</h6>

            <div class="mb-3">
                <label for="">Meta Title</label>
                <input type="text" class="form-control" value="{{$post->meta_title}}" name="meta_title">
                
            </div>

            <div class="mb-3">
                <label for="">Meta Description</label>
                <textarea rows="3" class="form-control" name="meta_description"> {!! $post->meta_description !!} </textarea>
                
            </div>

            <div class="mb-3">
                <label for="">Meta Keywords</label>
                <textarea type="text" class="form-control"  name="meta_keyword"> {!! $post->meta_keyword !!} </textarea>
            </div>

            <h6>Status</h6>
            <div class="row">
                 

                <div class="col-md-3 mb-3">
                    <label for=""> Status</label>
                    <input type="checkbox"   name="status" {{$post->status == '1' ? 'checked' : ''}} />
                </div>

                <div class="col-md-6">
                    <button type="submit" class="btn- btn-primary">Update Post</button>
                </div>
            </div>


            </form>

        </div>
      </div>
    </div>
</div>
@endsection