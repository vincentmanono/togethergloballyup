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
                <a href="/testimonies/create" class="btn btn-sm btn-primary">Write Testimony</a>
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
            <div class="card-header">
                <h3 class="card-title">Monitor testimonies from clients</h3>
<div>
</div>
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
                      <th>Id</th>
                      <th>Body</th>
                      <th>Options</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($testimonies as $testimony)
                            <tr>
                    <td>{{$testimony->id}}</td>
                    <td>{{$testimony->body}}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="/testimonies/{{$testimony->id}}/edit" style="float:left">Edit</a>
                        <form action="/testimonies/{{$testimony->id}}" method="POST" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" style="float:left; margin-left:4%">Delete</button>


                    </form>
                    </td>
                    </tr>

                        @endforeach


                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Body</th>
                        <th>Options</th>
                    </tr>
                    </tfoot>
                  </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              Testimonies
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>

@endsection
