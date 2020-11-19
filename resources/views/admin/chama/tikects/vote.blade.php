@extends('layouts.auth.app')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>vote</h1>


                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">chama vote</li>
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
                <h3 class="card-title"> Pick your voting card
                </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
      <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">

               <tickets  :chama="{{ $chama }}" :cards={{ json_encode( $chama->ticketsno) }} :user= "{{ auth()->user() }}" :tickets="{{ $chama->tickets }}" ></tickets>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a name="" id="" class="btn btn-primary" href="{{ route('user.chama.subscribed') }}" role="button">Back</a>

            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

   </section>
    <!-- /.content -->
</div>
@endsection
