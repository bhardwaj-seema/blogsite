@extends('layouts.master')
@section('title' , 'View User')
    
@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>
                View Users <a href="{{url('admin/add-post')}}" class="btn btn-primary float-end">Add Posts </a>
            </h4>
        </div>
        <div class="card-body">

            @if (session('message'))
            <div class="alert alert-success"> {{session('message')}} </div>
                
            @endif

           <div class="table-responsive">
            <table   class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($users as $item)

                   <tr>
                       <td> {{$item->id}} </td>
                       <td>{{$item->name}}</td>
                       <td> {{$item->email}} </td>
                       <td> {{$item->role_as == '1' ? 'Admin': 'User'}} </td>

                      
                       <td><a href="{{url('admin/users/'.$item->id)}}" class="btn btn-success">Edit</a>
                        <a href="{{url('admin/delete-user/'.$item->id)}}" class="btn btn-danger">Delete</a>
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