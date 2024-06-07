@extends('layout')
@section('title','Admin List')
@section('content')
<?php


   

if( Auth::check() && auth()->user()->role!='B-admin')
{
    return view('accueil');
}


?>
@if(@session('succes'))
<div style="margin-right:100px;margin-top:20px;margin-left:100px" class="alert alert-success">
    {{ session('succes') }}
</div> 
@endif

<h3 style="margin-left: 12px">List Users</h3>

<div class="row" style="width: 100%;display:flex;justify-content: center;align-content: center;">
   <div class="col-md-10 col-md-offset-1" style="">
      <table id="users" class="table table-striped table-bordered table-hover">
         <thead>
            <tr>
                <th>Id Admin</th>
               <th>Name</th>
               <th>Email</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>

         </tbody>
         @foreach ($users as $user )
             
         @if($user->role == 'admin')
         <tfoot>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td style="display: flex;justify-content: center;">
            <form action="{{route('Admin.delete',['id'=>$user->id])}}" method="post">
                @csrf
                @method('DELETE')
            <button type="submit" style="background-color: red;width:auto;border-radius: 12px;border-style: dashed" >Delete</button>
            </form>    
            </td>
         </tfoot>
         @endif
         @endforeach

      </table>
      <div  class="d-flex justify-content-center" style="margin:20px; " >
         {{ $users->links('vendor.pagination.bootstrap-4') }}
       </div>
   </div>
</div>

@endsection