@extends('layouts.auth.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All Chama</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Chama</li>
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
                <h3 class="card-title">Groups and Admin name</h3>

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
                      <th>Chama</th>
                      <th>Amount</th>
                      <th>Description</th>
                      <th>Admin</th>
                      <th>Created</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($chamas as $chama)
                            <tr>
                      <td>{{ $chama->name }}</td>
                      <td> {{"Ksh ". $chama->amount }} </td>
                      <td> {{ Str::limit( $chama->description , 40, '...') }}</td>
                     <td>{{ $chama->admin->firtsName . ' '. $chama->admin->lastName }}</td>

                      <td> {{ ($chama->created_at)->diffForHumans() }} </td>
                      <td>
                          <a name="chama" id="" class="btn btn-primary" href="{{ route('admin.chama.show',$chama->name) }}" role="button">
                              <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                  View More
                              </i>
                          </a>
                      </td>
                    </tr>

                        @endforeach

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Chama</th>
                        <th>Amount</th>
                        <th>Description</th>
                        <th>Admin</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                  </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
@endsection
