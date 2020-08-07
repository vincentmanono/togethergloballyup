@extends('layouts.auth.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                        <h2><i class="fa fa-user"></i> Transaction
                            {!! $transaction->resultCode === '0'? '<small style="color: green">Successful<i class="fa fa-check text-success"></i></small>': '<small style="color: red"><i class="fa fa-times text-danger"></i>Failed</small> | <small>Feeling like the transaction went through? <a  href="/power/mpesa/query-request?checkoutRequestID=' . $transaction->checkoutRequestID . '">click here</a></small>' !!}</h2>

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Transaction</li>
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
                <h3 class="card-title"> Mpesa Transactions Details </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
      <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">


                <br />
                <ul class="list-group list-group-unbordered ml-3 mr-4 ">
                    <li class="list-group-item" style="overflow:auto">
                        <b>Transaction Date</b> <a class="float-right mr-4 ">{{ $transaction->resultCode === '0'? $transaction->transactionDate: $transaction->created_at }}</a>
                    </li>
                    <li class="list-group-item" style="overflow:auto">
                        <b>Users Name</b>
                        @if ($transaction->user != null)
                        <a class=" text text-bold float-right mr-4"  href="{{ route('profile.show', $transaction->user->email) }}" title="{{ $transaction->user != null? $transaction->user->email: '__' }}">{{ $transaction->user != null? $transaction->user->name: '__' }}</a>
                    @else
                        <a class=" text text-bold float-right mr-4"  href="javascript:void(0)">{{ $transaction->user != null? $transaction->user->name: '__' }}</a>
                    @endif
                    </li>
                    <li class="list-group-item" style="overflow:auto">
                        <b>Phone</b> <a class="float-right mr-4 ">{{ $transaction->phoneNumber }}</a>
                    </li>
                    {{--  <li class="list-group-item" style="overflow:auto">
                        <b>Plan</b> <a class="float-right">{{ $transaction->plan != null? $transaction->plan->title: '__' }}</a>
                    </li>  --}}

                    <li class="list-group-item" style="overflow:auto">
                        <b>Response Status</b> <a class="float-right mr-4 "><td>{{ $transaction->responseCode === '0'? 'Successful': $transaction->responseDescription . ': '. $transaction->responseCode }}</td></a>
                    </li>
                    <li class="list-group-item" style="overflow:auto">
                        <b>Checkout Request ID</b> <a class="float-right mr-4 ">{{ $transaction->checkoutRequestID }}</a>
                    </li>
                    <li class="list-group-item" style="overflow:auto">
                        <b>Merchant Request ID</b> <a class="float-right mr-4 ">{{ $transaction->merchantRequestID }}</a>
                    </li>
                    @if ($transaction->responseCode === '0')
                        <li class="list-group-item" style="overflow:auto">
                            <b>Result Status</b> <a class="float-right mr-4 ">
                                {{ $transaction->resultCode === '0'? 'Successful': $transaction->resultDesc }}
                                {{ $transaction->resultCode === null? 'Pending...': '' }}</a>
                        </li>
                        @if ($transaction->resultCode === '0')
                            <li class="list-group-item" style="overflow:auto">
                                <b>Amount</b> <a class="float-right">Ksh. {{ $transaction->amount }}</a>
                            </li>
                            <li class="list-group-item" style="overflow:auto">
                                <b>Receipt Number</b> <a class="float-right mr-4 ">{{ $transaction->mpesaReceiptNumber }}</a>
                            </li>
                        @endif
                    @endif
                </ul>
                <br><br>



            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a name="" id="" class="btn btn-primary " href="{{ route('admin.mpesa.all') }}" role="button"> <i class="fa fa-backward" aria-hidden="true"></i> Back</a>

            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
@endsection
