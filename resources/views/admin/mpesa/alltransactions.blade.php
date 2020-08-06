@extends('layouts.auth.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{--  <h1>All Mpesa Transactions</h1>  --}}
                    @if (isset($message))
                    <h3>{{ $param }} Mpesa Transactions.<small>Search results: {{ $message }}</small></h3>
                @else
                    <h3>Transactions | <small>List of {{ $param }} Transactions.</small></h3>
                @endif

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Groups</li>
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
                <h3 class="card-title">All Mpesa Transactions</h3>

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
                            <th>Transaction Date</th>
                            <th>Amount</th>
                            <th>Result status</th>
                            <th>Phone</th>
                            <th>more</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transactions as $transaction)
                            <tr>
                                <td>
                                    @if ($transaction->user != null)
                                        <a href="{{ route('profile.show', $transaction->user->email) }}" title="{{ $transaction->user != null? $transaction->user->email: '__' }}">{{ $transaction->user != null? $transaction->user->name: '__' }}</a>
                                    @else
                                        <a href="javascript:void(0)">{{ $transaction->user != null? $transaction->user->name: '__' }}</a>
                                    @endif

                                </td>
                                <td>{{ date('l jS M, h:i a', strtotime($transaction->resultCode === 0? $transaction->transactionDate: $transaction->created_at)) }}

                            <td>{{ $transaction->amount }}</td>
                            <td>{{ $transaction->resultCode == 0? 'Successfull': 'canceled' }}</td>
                            <td>{{ $transaction->phoneNumber }}</td>
                            <td> <a name="" id="" class="btn btn-info" href="{{ route('admin.mpesa.show', $transaction->id) }}" role="button"> <i class="fa fa-eye" aria-hidden="true"></i>  </a> </td>
                        </tr>
                        @endforeach


                    </tbody>
                    <tfoot>
                        <tr>
                            <th>User Name</th>
                            <th>Transaction Date</th>
                            <th>Amount</th>
                            <th>Result status</th>
                            <th>Phone</th>
                            <th>More</th>
                        </tr>
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
