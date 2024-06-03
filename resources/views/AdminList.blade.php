@extends('layout')
@section('title','Admin List')
@section('content')
<?php
if(auth()->user()->role!='B-admin')
{
    return view('accueil');
}

?>


<h3 style="margin-left: 12px">Add Users</h3>

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
            <td>
            <form action="{{route('Admin.delete',['id'=>$user->id])}}" method="post">
                @csrf
                @method('DELETE')
            <button type="submit" style="background-color: red;width:50%;border-radius: 12px;border-style: dashed" >Delete</button>
            </form>    
            </td>
         </tfoot>
         @endif
         @endforeach

      </table>
   </div>
</div>

@endsection