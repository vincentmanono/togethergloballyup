@extends('layouts.auth.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class=" col-sm-8">

                        @if (!$chama->activate)
                            <div class="alert alert-danger alert-dismissible fade show " role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <strong>Status!</strong> Please activate your chama by paying <span
                                    class="text text-info">Ksh 150.00 </span> only .
                            </div>
                        @endif





                    </div>
                    <div class="col-sm-2">
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
                    <h3 class="card-title"> View Chama Details
                        <a name="" id="" class="btn btn-primary" href="{{ route('admin.allmychama') }}"
                            role="button">Back</a>

                        @if (!$chama->activate)

                            <!-- Button trigger modal -->

                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                data-target="#activatechama">
                                Activate Chama
                            </button>

                            <!-- Modal -->

                            <div class="modal fade" id="activatechama" tabindex="-1" role="dialog"
                                aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Activate chama <span
                                                    class="text text-capitalize text-bold">( {{ $chama->name }}) </span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div>
                                                Your are about to pay <span class="text text-info">Ksh 150.00 only</span>.
                                                Payment will be processed using Mpesa. Enter phone number below to confirm
                                            </div>
                                            <form action="{{ route('admin.activate.chama', $chama->id) }}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="phone">+254</label>
                                                    <input type="text" name="phone" id="phone" class="form-control"
                                                        value="{{ auth()->user()->phone }}" placeholder="Phone number"
                                                        aria-describedby="helpId">
                                                    <small id="helpId" class="text-muted">Change Mobile number if you need
                                                        to</small>
                                                </div>


                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>

                                                    <button type="submit" class="btn btn-primary">Pay now</button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Button trigger modal -->
                        @endif
                        {{-- @if (auth()->user()->role == 'admin' && $chama->activate == 0 && $chama->user_id == auth()->user()->id)
                            <button type="button" class="btn btn-success ml-5" data-toggle="modal"
                                data-target="#activatechama">
                                Activate chama
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="activatechama" tabindex="-1" role="dialog"
                                aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Activate {{ $chama->name }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="text text-dark">
                                                You are required to pay <span class="text text-success">Ksh 150 only</span>
                                                to activate your account
                                            </div>
                                            <form action="" method="post">
                                                <div class="form-group">
                                                    <label for="phone">Phone number</label>
                                                    <input type="tel" name="phone" id="phone" class="form-control" required
                                                        placeholder="07********" aria-describedby="helpPhone">
                                                    <small id="helpPhone" class="text-muted">Enter your mobile number
                                                        here</small>
                                                </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary pull-left"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary pull-right">Pay</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                        @endif --}}



                    </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                            title="Remove">
                            <i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 ">
                            <table class="table table-bordered table-inverse table-responsive">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>Name</th>
                                        <th>Amount</th>
                                        {{-- <th>Admin</th> --}}
                                        <th>Duration</th>
                                        <th>next Voting</th>

                                        <th>Members</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $chama->name }}</td>
                                        <td scope="row">Ksh {{ number_format($chama->amount, 2, '.', ',') }}</td>
                                        {{-- <td>
                                            {{ $chama->admin->firstName . ' ' . $chama->admin->lastName }}</td>
                                        --}}
                                        {{-- <td>
                                            @if ($chama->activate)
                                                <span class="text text-success text-bold ">Activated</span>
                                                @else
                                                <span class="text text-warning text-bold">Not Activated</span>
                                            @endif
                                        </td> --}}
                                        <td> {{ $chama->duration }} days </td>
                                        <td>
                                            {{ date('l jS M Y, h:i a', strtotime($chama->nextVote)) }}
                                        </td>

                                        <td>{{ $chama->users->count() }}</td>

                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary btn-sm mr-3 " data-toggle="modal"
                                                data-target="#openvoting">
                                                Open Voting
                                            </button>


                                            @can('update', $chama)
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                                    data-target="#modal-lg">
                                                    Edit Chama
                                                </button>
                                            @endcan



                                            <!-- Modal -->
                                            <div class="modal fade" id="openvoting" tabindex="-1" role="dialog"
                                                aria-labelledby="modelTitleId" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Activate Voting</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="container-fluid">
                                                                <p>You are allowing members of this Chama to start voting
                                                                </p>
                                                                <form
                                                                    action="{{ route('admin.allmychama.openvoting', $chama->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method("PUT")
                                                                    <div class="form-group">
                                                                        <input type="hidden" class="form-control"
                                                                            name="vote">

                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary"> <i
                                                                            class="fa fa-envelope-open"
                                                                            aria-hidden="true"></i> Open Voting</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>









                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text text-capitalize text-dark">
                                            {{ $chama->description }}
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                        <div id="accordianId" role="tablist" aria-multiselectable="true">
                            <div class="card">
                                <div class="card-header" role="tab" id="section1HeaderId">
                                    <h5 class="mb-0">
                                        <a data-toggle="collapse" class="btn btn-secondary" data-parent="#accordianId" href="#section1ContentId"
                                            aria-expanded="true" aria-controls="section1ContentId">
                                            Monitor Chama users
                                        </a>
                                    </h5>
                                </div>
                                <div id="section1ContentId" class="collapse in" role="tabpanel"
                                    aria-labelledby="section1HeaderId">
                                    <div class="card-body">
                                        <table class="table table-hover table-inverse table-responsive">
                                            <thead class="thead-inverse">
                                                <tr>
                                                    <th> Name </th>
                                                    <th> Email</th>
                                                    <th> Wallet</th>

                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($chama->users as $user)
                                                    <tr>
                                                        <td scope="row"> {{ $user->name }}</td>
                                                        <td> <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                                        </td>
                                                        <td> {{ $user->wallet->amount }} </td>
                                                        <td>
                                                            <form action="{{ route('admin.allmychama.removeUser') }}"
                                                                method="post">
                                                                @csrf
                                                                <input type="hidden" name="userId" value="{{ $user->id }}">
                                                                <input type="hidden" name="chamaId"
                                                                    value="{{ $chama->id }}">
                                                                <button type="submit" class="btn btn-danger">Remove
                                                                    User</button>
                                                            </form>

                                                        </td>
                                                    </tr>
                                                @endforeach


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    @can('delete', $chama)
                        <form class="col-6" action="{{ route('admin.chama.destroy', $chama) }}" id="deletechamaform"
                            method="post">
                            @method("DELETE")
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete Chama</button>
                        </form>
                    @endcan
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->


            <div class="modal fade" id="modal-lg">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Chama Details</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                            <form action="{{ route('admin.chama.update', $chama) }}" method="post">
                                @method("PUT")
                                @csrf
                                <div class="form-group">
                                    <label for="">Chama Name</label>
                                    <input type="text" name="name" id="" value="{{ $chama->name }}" class="form-control"
                                        placeholder="Chama name" aria-describedby="chamaNamehelp">
                                    <small id="chamaNamehelp" class="text-muted">Us.e unique Name</small>
                                </div>
                                <div class="form-group">
                                    <label for="">Amount</label>
                                    <input type="text" name="amount" id="" value="{{ $chama->amount }}" class="form-control"
                                        placeholder="Chama amount" aria-describedby="chamaamounthelp">
                                    <small id="chamaamounthelp" class="text-muted">Amount to be contributed by
                                        members</small>
                                </div>
                                <div class="form-group">
                                    <label for="duration">Duration</label>
                                    <input type="number" name="duration" id="" value="{{ $chama->duration }}" class="form-control"
                                        placeholder="Chama duration" aria-describedby="durationhelp">
                                    <small id="durationhelp" class="text-muted">number of days</small>
                                </div>
                                <div class="form-group">
                                    <label for="description">Chama Description</label>
                                    <textarea class="form-control" name="description" id=""
                                        rows="3">{{ $chama->description }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Save changes</button>



                                </p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                        </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>



        </section>
        <!-- /.content -->
    </div>
@endsection
