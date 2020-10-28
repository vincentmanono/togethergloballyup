@extends('layouts.auth.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> <i class="fa fa-user" aria-hidden="true"></i> My Wallet  </h1>
                    <h2>Wallet Balance Ksh {{ $user->wallet->amount }} </h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Wallet</li>
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
                <h3 class="card-title mr-3">Deposit or withdraw from wallet</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
      <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="row" >
                    <div class="col-md-6 col-sm-12 col-lg-6   " style="background-color: #0cca ; color:black ; " >
                        <div class="text text-capitalize text-center text-bold h2 " >
                            Deposit To Wallet
                        </div>
                        <div>Enter amount below, 'use' your <span class="text text-dark" >MPESA PIN </span>  to authorize the transaction</div>
                        <form action="{{ route('deposit.to.wallet') }}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <input id="phone" type="number" placeholder="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              <div class="input-group-append">
                                <div class="input-group-text">
                                  <span class="fas fa-envelope"></span>
                                </div>
                              </div>
                            </div>
                            <div class="input-group mb-3">
                                <input id="amount" type="number" placeholder="amount (KSH)" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" required autocomplete="amount">

                                @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="fa fa-money" aria-hidden="true"></i>
                                </div>
                              </div>
                            </div>
                              <button type="submit" class="btn btn-success">Deposit now</button>
                        </form>

                    </div>
                    <div class="col-md-6 col-sm-12 col-lg-6   " style="background-color: rgba(114, 70, 165, 0.667) ; color:black ; " >
                        <div class="text text-capitalize text-center text-warning  text-bold h2 " >
                            Withdraw From Wallet
                        </div>
                        <div class="text text-dark text-bold" >Enter amount below to initiate transaction</div>
                        <form action="{{ route('user.withdraw') }}" method="post">
                            @csrf



                              <div class="input-group">
                                <input id="amountW" type="number" placeholder="amount (KSh)" class="form-control @error('amountW') is-invalid @enderror" name="amountW" value="{{ old('amountW') }}" required autocomplete="amountW">

                                @error('amountW')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="fa fa-money" aria-hidden="true"></i>
                                </div>
                              </div>
                            </div>



                              <button type="submit" class="btn btn-secondary">withdraw now</button>

                        </form>

                    </div>

                </div>

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
