@extends('layouts.auth.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Testimonies from Clients</h1>
                </div>
                <div style="float:left">
                <a href="/testimonies/create"></a></div>
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
            <div class="card-header">
                <h3 class="card-title">Write your testimony below</h3>
<div>
</div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
      <i class="fas fa-times"></i></button>
                </div>
            </div>

                <form action="{{route('testimonies.store')}}" method="POST" style="margin-top:2%;margin-left:25%;" >
                    @csrf
                    <div >

                        <textarea name="body" rows="7" cols="70">  </textarea>
                    </div>
                    <button class="btn btn-primary" type="submit" style="margin-left:30%; margin-top:2%;margin-bottom:5%;">Post</button>
                </form>
                            <!-- /.card-body -->
            <div class="card-footer">
                Testimony page
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
@endsection
