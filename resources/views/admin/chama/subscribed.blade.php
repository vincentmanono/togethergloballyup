@extends('layouts.auth.app')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ "All my Subscribed chamas" }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">chama</li>
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
                <h3 class="card-title"> View my Subscribed  Chamas Details
                    <button type="button" class="btn btn-dark pull-right" data-toggle="modal" data-target="#deposite">
                        Deposite To wallet
                      </button>
                </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
      <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-10 offset-1">
                        <table class="table table-bordered table-inverse table-responsive">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Admin</th>
                                    <th>Members</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                   @forelse ($chamas as $chama)
                                       <tr>
                                           <td> {{ $chama->name }}</td>
                                           <td> {{ $chama->amount }}</td>
                                           <td> {{ $chama->admin->name }}</td>

                                           <td> {{ $chama->users->count() }}</td>
                                           <td class="row" >
                                               <a name="" id="" class="btn btn-primary col-6" href="{{ route('user.chama.subscribed.single',$chama) }}" role="button">
                                                   <i class="fa fa-eye" aria-hidden="true"></i>
                                                   View More</a>
                                               <form action="{{ route('user.chama.exit') }}" class="col-6" method="post">
                                                   @csrf
                                                   <input type="hidden" name="chamaID" value="{{ $chama->id }}" >
                                                   <button type="submit" class="btn btn-danger">Unsubscribe</button>
                                               </form>
                                           </td>
                                       </tr>
                                   @empty

                                   @endforelse
                                </tbody>
                        </table>
                    </div>

                </div>
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



<!-- Modal -->
<div class="modal  fade wallet" id="deposite" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Depositing to my wallet </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('deposte.to.wallet') }}" method="post">
                    @csrf

                    <div class="form-group">
                      <label for="amount">Amount to deposite</label>
                      <input type="number" name="amount" id="amount"
                      class="form-control @error('phone') is-invalid @enderror"
                       placeholder="Amount to deposite"
                       value="{{ old('amount') }}"
                       autocomplete="amount" autofocus>

                       @error('amount')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror

                    </div>


                    <div class="form-group">
                     <input id="phone" type="number" aria-describedby="helpId"
                      class="form-control @error('phone') is-invalid @enderror"
                       name="phone"
                       placeholder="07********"
                       value="{{ old('phone') }}" required
                       autocomplete="phone" autofocus>
                     <small   id="helpId"  class="form-text text-muted">Change if you do not want to 'use' your number</small>

                             @error('phone')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror

                 </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Deposite</button>
            </div>
         </form>
        </div>
    </div>
</div>


@endsection
