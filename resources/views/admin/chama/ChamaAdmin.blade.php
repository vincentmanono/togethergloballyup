@extends('layouts.auth.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All Groups Administrators</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Groups admins</li>
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
                <h3 class="card-title">Chama and Admin name</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
      <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Chama Name</th>
                      <th>Admin Name</th>

                      <th>Phone </th>
                      <th>email</th>
                      {{-- <th>Action</th> --}}
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($chamas as $chama)
                             <tr>
                      <td class="text text-capitalize text-bold" >{{ $chama->name }}</td>
                      <td class="text text-capitalize text-bold" >{{ $chama->admin->name }}
                      </td>
                      <td> {{ $chama->admin->phone }}</td>
                      <td> <a href="mailto:{{ $chama->admin->email }}"></a> {{ $chama->admin->email }}</td>
                      {{-- <td><button type="button" class="btn btn-primary">Delete</button> </td> --}}
                    </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <th>Chama Name</th>
                        <th>Admin Name</th>
                        <th>Phone </th>
                        <th>email</th>
                        {{-- <th>Action</th> --}}
                    </tfoot>
                  </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                {{ "Time now is". now()->format("D d / M /Y H:i  ") }}
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
@endsection
