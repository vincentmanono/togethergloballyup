@extends('layouts.auth.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">User Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">



                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="{{ (Str::contains($user->avatar,'http') ? $user->avatar:'/storage/users/' . $user->avatar ) }}" alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{ $user->name }}</h3>

                                <p class="text-muted text-center">{{ $user->role }}</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Joined Chamas</b> <a class="float-right text-bold">
                                            {{ $user->chamaSubscribed->count() }} </a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Wallet Amount</b> <a class="float-right"><span
                                                class="text text-bold ">Ksh</span>{{ number_format($user->wallet->amount, 2, '.', ',') }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Email </b> <a class="float-right">{{ $user->email }}</a>
                                    </li>
                                </ul>

                                {{-- <a href="#"
                                    class="btn btn-primary btn-block"><b>Follow</b></a> --}}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About Me</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong><i class="fas fa-book mr-1"></i> Subscription</strong>

                                <p class="text-muted">

                                <p>

                                    {!! $user->subscription_expiry >= now()->format('Y-m-d H:i:s')
                                    ? 'Your subscription expires on: ' .
                                    '<span style="color: green">' .
                                        date(
                                        'l jS, M Y h:i
                                        a',
                                        strtotime($user->subscription_expiry),
                                        ) .
                                        '</span>'
                                    : '<span style="color: red">Subscription Expired</span>' !!}
                                </p>


                                </p>

                                <hr>

                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                                <p class="text-muted">Kenya</p>

                                <hr>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">My
                                            details</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#timeline"
                                            data-toggle="tab">Subscriptions</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a>
                                    </li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        <div class="x_content">
                                            <br />
                                            <ul class="list-group list-group-unbordered">
                                                <li class="list-group-item">
                                                    <b>Name</b> <a class="pull-right">{{ $user->name }}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Email</b> <a class="pull-right">{{ $user->email }}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Member Since</b> <a
                                                        class="pull-right">{{ date('F d, Y', strtotime($user->created_at)) }}</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Phone</b> <a
                                                        class="pull-right">{{ $user->phone == '' ? 'Not available' : $user->phone }}</a>
                                                </li>

                                                @if ($user->role == 'super')
                                                    <li
                                                        class="list-group-item {{ $user->role == 'super' ? '' : 'hidden' }}">
                                                        <b>Admin Status</b> <a class="pull-right">Super Admin</a>
                                                    </li>


                                                @endif
                                                @if ($user->role == 'admin')
                                                    <li
                                                        class="list-group-item {{ $user->role == 'admin' ? '' : 'hidden' }}">
                                                        <b>Admin Status</b> <a class="pull-right">Ordinary Admin</a>
                                                    </li>
                                                @endif
                                                @if ($user->role == 'user')
                                                    <li class="list-group-item {{ $user->role == 'user' ? '' : 'hidden' }}">
                                                        <b>User Type</b> <a class="pull-right">Togethergloballyup User</a>
                                                    </li>
                                                @endif

                                            </ul>
                                            <br><br>
                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
                                                    <!-- Small modal -->
                                                    <button type="button" class="btn btn-lg btn-danger" data-toggle="modal"
                                                        data-target=".bs-example-modal-sm">Delete Account</button><br><br>

                                                    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">

                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close"><span aria-hidden="true">×</span>
                                                                    </button>
                                                                    <h4 class="modal-title" id="myModalLabel2">Delete
                                                                        Account</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <h4>Confirmation</h4>
                                                                    <p>Are you sure you want to delete this account for
                                                                        {{ $user->name }}? This
                                                                        action cannot be
                                                                        undone once confirmed.</p>

                                                                </div>

                                                                <div class="modal-footer">
                                                                    <form action="{{ route('profile.destroy',$user->slug) }}" method="post">
                                                                        @csrf
                                                                        @method("DELETE")
                                                                        <button type="button" class="btn btn-default"
                                                                        data-dismiss="modal">Cancel</button>

                                                                    <button class="btn btn-xs btn-danger"
                                                                        type="submit">Delete</button>
                                                                    </form>


                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="timeline">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Start Date</th>
                                                    <th>Expiry Date</th>
                                                    <th>Amount</th>
                                                    <th>Phone</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($user->subscriptions as $sub)
                                                    <tr>
                                                        <td>{{ date('l jS M, h:i a', strtotime($sub->start_date)) }}</td>
                                                        <td>{{ date('l jS M, h:i a', strtotime($sub->expiry_date)) }}</td>

                                                        <td>{{ number_format($sub->amount, 2, '.', ',') }} </td>
                                                        <td>{{ $sub->user->phone }}</td>
                                                        <td>
                                                            @if ($sub->expiry_date >= now())
                                                                <span class="text text-success">Active</span>
                                                            @else
                                                                <span class="text text-danger">Domant</span>
                                                            @endif

                                                        </td>

                                                    @empty
                                                        <td>{{ 'No data yet' }}</td>
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
                                    <!-- /.tab-pane -->

                                    <div class="tab-pane" id="settings">
                                        <form action="{{ route('profile.update', $user->id) }}" method="POST"
                                            class="form-horizontal" enctype="multipart/form-data">
                                            @csrf
                                            @method("put")

                                            <div class="form-group row">
                                                <label for="name" class="col-sm-2 col-form-label">User Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text"
                                                        class="form-control @error('name') is-invalid @enderror" id="name"
                                                        value="{{ $user->name }}" name="name" placeholder="Your name">
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email"
                                                        class="form-control @error('email') is-invalid @enderror" id="email"
                                                        name="email" value="{{ $user->email }}" placeholder="Email">
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                                <div class="col-sm-10">
                                                    <input type="tel"
                                                        class="form-control @error('phone') is-invalid @enderror" id="phone"
                                                        name="phone" value="{{ $user->phone }}"
                                                        placeholder="Your phone number">
                                                    @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="avatar" class="col-sm-2 col-form-label">Picture</label>
                                                <div class="col-sm-10">
                                                    <input type="file"
                                                        class="form-control-file @error('avatar') is-invalid @enderror"
                                                        id="avatar" name="avatar" placeholder="Update profile">
                                                    @error('avatar')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <hr>
                                            @if (auth()->user()->role != 'super' && auth()->user()->password != null )

                                                <div class="form-group row">
                                                    <label for="old_password"
                                                        class="col-sm-12 col-form-label text-capitalize ">Input your
                                                        password To
                                                        Update your account</label>

                                                    <div class="col-sm-10">
                                                        <input type="password"
                                                            class="form-control @error('old_password') is-invalid @enderror"
                                                            style="background-color: rgba(184, 120, 84, 0.5);color:black;"
                                                            id="old_password" name="old_password"
                                                            placeholder="Previous Password">
                                                    </div>
                                                </div>

                                            @endif



                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <input id="password" type="password" placeholder="Password"
                                                        style="background-color: rgba(184, 120, 84, 0.5);color:black;"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" autocomplete="new-password">
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                                </div>
                                                <div class="col-sm-6">
                                                    <input id="password-confirm"
                                                        style="background-color: rgba(184, 120, 84, 0.5);color:black;"
                                                        type="password" placeholder="Confirm password" class="form-control"
                                                        name="password_confirmation" autocomplete="new-password">
                                                    @error('password_confirmation')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            @if (auth()->user()->role == 'super')
                                                <div class="form-check">

                                                    <input type="checkbox" name="role"   @if ($user->role == 'super') checked  @endif>
                                            <label for="role" class="form-check-label">Make Super Admin</label>
                                    </div>
                                    @endif


                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-8">
                                            <button type="submit" class="btn btn-danger btn-block">Submit</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>

@stop
