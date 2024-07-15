@extends('layouts.master')
@section('title' , 'Category')
    
@section('content')
<div class="container-fluid px-4">

    <div class="card mt-4">
        <div class="card-header">
            <h4>Add Category</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <div> {{$error}} </div>
                    
                @endforeach
            </div>
                
            @endif
          <form action="{{url('admin/update-category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="">Category name</label>
                <input type="text" class="form-control" value="{{$category->name}}" name="name">
            </div>

            <div class="mb-3">
                <label for="">Slug</label>
                <input type="text" class="form-control" value="{{$category->slug}}" name="slug">
            </div>

            <div class="mb-3">
                <label for="">Description</label>
                <textarea rows="3" class="form-control" name="description">{{$category->description}} </textarea>
            </div>

            <div class="mb-3">
                <label for="">Image</label>
                <input type="file" class="form-control" name="image" value="{{$category->image}}">
            </div>

            <h6>SEO Tags</h6>

            <div class="mb-3">
                <label for="">Meta Title</label>
                <input rows="3" class="form-control" name="meta_title" value="{{$category->meta_title}}"> 
            </div>

            <div class="mb-3">
                <label for="">Meta Description</label>
                <textarea type="text" class="form-control" name="meta_description"  >{{$category->meta_description}} </textarea>
            </div>

            <div class="mb-3">
                <label for="">Meta Keywords</label>
                <input type="text" class="form-control" name="meta_keyword" value="{{$category->meta_keyword}}">
            </div>

            <h6>Status Mode </h6>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="">Navbar Status</label>
                    <input type="checkbox" name="navbar_status" value="{{$category->navbar_status == '1' ? 'checked' : ''}}">
                </div>

                <div class="col-md-3 mb-3">
                    <label for=""> Status</label>
                    <input type="checkbox"   name="status" {{$category->status == '1' ? 'checked' : ''}} />
                </div>

                <div class="col-md-6">
                    <button type="submit" class="btn- btn-primary">Update Category</button>
                </div>
            </div>

            

            

          </form>
        </div>

    </div>
</div>

@endsection