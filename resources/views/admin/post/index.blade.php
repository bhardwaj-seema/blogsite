@extends('layouts.master')
@section('title' , 'View Post')
    
@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>
                View <a href="{{url('admin/add-post')}}" class="btn btn-primary float-end">Add Posts </a>
            </h4>
        </div>
        <div class="card-body">

            @if (session('message'))
            <div class="alert alert-success"> {{session('message')}} </div>
                
            @endif

            <div class="table-responsive">
                <table id="myDataTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Post Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($posts as $item)
    
                       <tr>
                           <td> {{$item->id}} </td>
                           <td>{{$item->category->name}}</td>
                           <td> {{$item->name}} </td>
    
                           <td> {{$item->status == '1' ? 'Hidden': 'Visible'}} </td>
                           <td><a href="{{url('admin/post/'.$item->id)}}" class="btn btn-success">Edit</a>
                            <a href="{{url('admin/delete-post/'.$item->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                            
                       </tr>
                           
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection