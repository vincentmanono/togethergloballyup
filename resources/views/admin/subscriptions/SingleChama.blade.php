@extends('layouts.auth.app')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    {{-- <section class="content-header">
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
    </section> --}}

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> View my Subscribed  Chama Details
                    <a name="" id="" class="btn btn-primary" href="{{ route('user.chama.subscribed') }}" role="button">Back</a>
                    <button type="button" class="btn btn-dark pull-right" data-toggle="modal" data-target="#deposite">
                        Deposit To wallet
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
                                    <th>Duration in days </th>
                                    <th>Members</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                       <tr>
                                           <td> {{ $chama->name }}</td>
                                           <td>Ksh  {{ number_format($chama->amount,2,'.',',')  }}</td>
                                           <td>
                                            <a title="Email the chama Administrator" href="mailto:{{$chama->admin->email  }}" class="text text-info" >
                                            {{ $chama->admin->name}}
                                            </a>

                                                </td>
                                           <td class="text text-bold" >
                                            {{ ($chama->duration) .' days' }}
                                           </td>

                                           <td> {{ $chama->users->count() }}</td>
                                           <td>
                                               <!-- Button trigger modal -->
                                               @if ($shouldvote->given == 0 && $shouldvote->as_vote == 0 && $chama->openVote == 1 )
                                                    <a name="" id="" class="btn btn-primary" href="{{ route('user.chama.subscribed.vote',$chama->id) }}" role="button">Vote</a>

                                               @endif

                                               <!-- Modal -->
                                               <div class="modal fade wallet " id="deposite" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                   <div class="modal-dialog" role="document">
                                                       <div class="modal-content">
                                                           <div class="modal-header">
                                                               <h5 class="modal-title">Depositing to my wallet Wallet</h5>
                                                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                       <span aria-hidden="true">&times;</span>
                                                                   </button>
                                                           </div>
                                                           <div class="modal-body">
                                                               <form action="{{ route('deposit.to.wallet') }}" method="post">
                                                                   @csrf

                                                                   <div class="form-group">
                                                                     <label for="amount">Amount to deposit</label>
                                                                     <input type="number" name="amount" id="amount"
                                                                     class="form-control @error('phone') is-invalid @enderror"
                                                                      placeholder="Amount to deposit"
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
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Deposit</button>
                                                                </div>
                                                             </form>

                                                           </div>

                                                       </div>
                                                   </div>
                                               </div>
                                           </td>
                                       </tr>

                                </tbody>
                        </table>
                        <table class="table table-striped table-inverse table-responsive">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>Wallet Amount</th>
                                    <th>Deposited On</th>
                                    <th>Withdrawn on </th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row">Ksh {{ number_format($wallet->amount,2,'.',',' ) }}</td>
                                        <td>{{date('l jS M, h:i a', strtotime($wallet->deposite_at))  }}</td>
                                        <td>{{date('l jS M, h:i a', strtotime($wallet->withdraw_at))  }}</td>
                                    </tr>

                                </tbody>
                        </table>
                    </div>
                    <div class="col-md-10">
                        <div id="accordianId" role="tablist" aria-multiselectable="true">
                            <div class="card">
                                <div class="card-header" role="tab" id="section1HeaderId">
                                    <h5 class="mb-0">
                                        <a data-toggle="collapse" data-parent="#accordianId" href="#section1ContentId" aria-expanded="true" aria-controls="section1ContentId">
                                 Group members
                                </a>
                                    </h5>
                                </div>
                                <div id="section1ContentId" class="collapse in" role="tabpanel" aria-labelledby="section1HeaderId">
                                    <div class="card-body">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Chama Members and there Contributions</h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                <table id="example1" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Phone</th>
                                                            <th>Voted</th>
                                                            <th> Won Vote </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($tickets as  $ticket)
                                                             <tr>
                                                            <td>{{ $ticket->user->name }}</td>
                                                            <td>{{ $ticket->user->phone }}</td>
                                                            <td >

                                                                @if (  $ticket->as_vote )
                                                                    <span class="text text-success" >Yes </span>
                                                                @else
                                                                <span class="text text-danger" >Not Yet </span>
                                                                @endif

                                                            </td>
                                                            <td >

                                                                @if (  $ticket->given )
                                                                    <span class="text text-success" >Yes </span>
                                                                @else
                                                                <span class="text text-danger" >No </span>
                                                                @endif

                                                            </td>
                                                        </tr>
                                                        @empty

                                                        @endforelse

                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Phone</th>
                                                            <th>Voted</th>
                                                            <th> Won Vote </th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" role="tab" id="section2HeaderId">
                                    <h5 class="mb-0">
                                        <a data-toggle="collapse" data-parent="#accordianId" href="#section2ContentId" aria-expanded="true" aria-controls="section2ContentId">
                                  Description Of Chama
                                </a>
                                    </h5>
                                </div>
                                <div id="section2ContentId" class="collapse in" role="tabpanel" aria-labelledby="section2HeaderId">
                                    <div class="card-body">
                                        <span class="text text-black text-justify" >
                                            {{ $chama->description }}
                                        </span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <form action="{{ route('user.chama.exit') }}" method="post">
                    @csrf
                    <input type="hidden" name="chamaID" value="{{ $chama->id }}" >
                    <button type="submit" class="btn btn-danger">Unsubscribe</button>
                </form>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
</section>
    <!-- /.content -->
</div>
@endsection
