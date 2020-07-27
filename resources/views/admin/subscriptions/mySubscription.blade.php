@extends('layouts.auth.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Subscribers to Newsletters</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Subscriptions</li>
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
                <h3>Email| <small>Subscriptions.</small></h3>
                <!-- Button trigger modal -->
                {{-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#renew">
                  Renew your Subscription
                </button> --}}

                <!-- Modal -->
                {{-- <div class="modal fade" id="renew" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Email Subscriptions</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <h3 class="text text-cyan text-center" >You can renew you Subscription with <span class="text text-success" > KSH 100 bob </span> only and access all our services</h3>
                        <form action="{{ route('user.renew.subscription') }}" method="post">
                            @csrf
                                    <div class="form-group">
                                      <label for="">Phone Number</label>
                                      <input type="text" class="form-control" value="{{ auth()->user()->phone }}"  name="phone" id="phone" aria-describedby="helpId" placeholder="07********">
                                      <small id="helpId" class="form-text text-muted">Type your Phone number here</small>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Send </button>
                                    </div>
                        </form>
                            </div>


                        </div>
                    </div>
                </div> --}}

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
                        <th>Email</th>
                        <th>Created_At</th>
                        <th>Edit</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($subscriptions as $sub)
                        <tr>
                        <td>{{ $sub->email}}</td>
                        <td>{{$sub->created_at}}</td>
                        <td></td>
                            @endforeach
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Email</th>
                            <th>Created_At</th>
                            <th>Edit</th>

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

