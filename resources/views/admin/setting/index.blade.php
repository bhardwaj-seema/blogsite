@extends('layouts.master')
@section('title' , 'Blog Dashboard')
    
@section('content')
<div class="container-fluid px-4">
     
    <div class="row mt-3">
        <div class="col-md-12">
            @if (session('message'))
            <h4 class="alert alert-warning"> {{ session('message') }} </h4>
                
            @endif
            <div class="card">
                <div class="card-header">
                    <h1>Website Settings</h1>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/settings')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="">Website Name</label>
                            <input type="text" name="website_name" class="form-control" />
        
                        </div>

                        <div class="mb-3">
                            <label for="">Logo</label>
                            <input type="file" name="website_logo" class="form-control" />
        
                        </div>

                        <div class="mb-3">
                            <label for="">Favicon</label>
                            <input type="file" name="website_favicon" class="form-control" />
        
                        </div>

                        <div class="mb-3">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
        
                        </div>

                        <h4>SEO - Meta Tags</h4>
                         <div class="mb-3">
                            <label for="">Meta Title</label>
                            <input type="text" name="meta_title" class="form-control" />
        
                        </div>

                        <div class="mb-3">
                            <label for="">Meta Keywords</label>
                            <textarea name="meta_keywords" class="form-control"   rows="3"></textarea>
        
                        </div>

                        <div class="mb-3">
                            <label for="">Meta Description</label>
                            <textarea name="meta_description" class="form-control"   rows="3"></textarea>
        
                        </div>

                        <div class="mb-3">
                             <button type="submit" class="btn btn-primary">Save</button>
        
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection