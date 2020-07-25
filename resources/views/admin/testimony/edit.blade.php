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


            <form action="{{route('testimonies.update',$single->id)}}" method="post" style="margin-left:10%; margin-top:4%" >
                @csrf
                @method('PUT')
                <div class="form-group">
                  <textarea class="form-control" name="body"   rows="7" cols="70" >{{ $single->body }}</textarea>
                </div>

                <div >
                </div>
                <button class="btn btn-primary" type="submit" style="margin-left:25%; margin-top:3%;">Update</button> <br><br><br><br>
            </form>
            </div>

        </div>
    </section>
</div>
@endsection
