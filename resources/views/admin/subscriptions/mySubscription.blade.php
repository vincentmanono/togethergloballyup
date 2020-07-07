@extends('layouts.auth.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>My Subscription Details</h1>
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
                <h3>Subscriptions | <small>List of all my Subscriptions.</small></h3>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#renew">
                  New your Subscription
                </button>

                <!-- Modal -->
                <div class="modal fade" id="renew" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Renew Subscription</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <h3 class="text text-cyan text-center" >You can renew you Subscription with <span class="text text-success" > KSH 100 bob </span> only and access all our services</h3>
                                <form action="" method="post">
                                    <div class="form-group">
                                      <label for="">Phone Number</label>
                                      <input type="text" class="form-control" name="phone" id="phone" aria-describedby="helpId" placeholder="07********">
                                      <small id="helpId" class="form-text text-muted">Type your Phone number here</small>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Send </button>
                            </div>
                        </form>
                        </div>
                    </div>
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
                        <th>User Name</th>
                        <th>Start Date</th>
                        <th>Expiry Date</th>
                        <th>Amount</th>
                        <th>Phone</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($subscriptions as $sub)
                            <tr>
                      <td>{{ $sub->user->firstName . '  '.$sub->user->lastName }}</td>
                      <td>{{ date('l jS M, h:i a', strtotime($sub->start_date)) }}</td>
                      <td>{{ date('l jS M, h:i a', strtotime($sub->expiry_date)) }}</td>

                      <td>{{ number_format($sub->amount,2,'.',',') }} </td>
                      <td>{{ $sub->user->phone }}</td>
                      <td>
                          @if ( $sub->expiry_date >= now() )
                              <span class="text text-success" >Active</span>
                          @else
                              <span class="text text-danger" >Domant</span>
                          @endif

                      </td>

                        @empty
                        <td>{{ "No data yet" }}</td>
                        @endforelse
                     </tr>


                    </tbody>
                    <tfoot>
                    <tr>
                        <th>User Name</th>
                        <th>Start Date</th>
                        <th>Expiry Date</th>
                        <th>Chama</th>
                        <th>Amount</th>
                        <th>Phone</th>
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

