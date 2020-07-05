@extends('layouts.auth.app')
@section('content')



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Testimony</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Testimonies</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
<div>

<form action="{{route('testimonies.update',$single->id)}}" method="post" >
    @csrf
    @method('PUT')

    <div >
      
        <textarea name="" rows="7" cols="70">   {{ $single->body }}</textarea>
    </div>
    <button class="btn btn-primary" type="submit">Update</button>
</form>
</div>
@endsection
