@extends('layouts.auth.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>System Super Administrators</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"> admins</li>
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
                <h3 class="card-title">System super admin Details</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
      <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div>
                            <h2>{{ $user->role != 'user' ? 'Admin' : 'User' }} Details</h2>
                        </div>
                        <ul class="list-group list-group-unbordered ml-3 ">

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
                                    class="pull-right">{{ $user->phone == ''? 'Not available': $user->phone }}</a>
                            </li>
                            {{-- @switch($user->role )
                                @case('super')
                                <li class="list-group-item">
                                    <b>Admin Status</b> <a class="pull-right">Super Admin</a>
                                </li>

                                    @break
                                @case('admin')
                                <li class="list-group-item ">
                                    <b>Admin Status</b> <a class="pull-right">Ordinary Admin</a>
                                </li>

                                    @break
                                @default
                                     <li class="list-group-item">
                                <b>User Type</b> <a class="pull-right">Togetherbloballyup User</a>
                            </li>
                            @endswitch --}}



                        </ul>
                        <div>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteaccount">
                              delete Account
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="deleteaccount" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                        </div>
                                        <div class="modal-body">
                                            <h4>Confirmation</h4>
                                            <p>Are you sure you want to delete this account for {{ $user->name  }} ? This
                                                action cannot be
                                                undone once confirmed.</p>

                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('profile.destroy',$user->slug) }}" method="post">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">Delete Acount</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div>
                            <div class="x_title">
                                <h2>Edit <small>{{ $user->role != 'user'? 'Admin' : 'User' }} Details</small></h2>
                                <div class="clearfix"></div>
                            </div>
                            <form action="{{ route('profile.update',$user->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data" >
                                @csrf
                                @method("put")
                                <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                                <div class="col-sm-10">
                                    <input type="text"   class="form-control @error('name') is-invalid @enderror"   id="name"  name="name"
                                    value="{{ $user->name }}" placeholder="Your full name">
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
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email"  value="{{ $user->email }}" placeholder="Email">
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
                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                    id="phone" name="phone" value="{{ $user->phone }}"  placeholder="Your phone number">
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
                                    <input type="file" class="form-control-file @error('avatar') is-invalid @enderror"
                                    id="avatar" name="avatar"  placeholder="Update profile">
                                    @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>
                                </div>



                                <hr>


                                <div class="form-group row">
                                    <div class="col-sm-6">
                                    <input id="password" type="password"
                                    placeholder="Password" style="background-color: rgba(184, 120, 84, 0.5);color:black;"
                                    class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
                                    @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                                    </div>
                                    <div class="col-sm-6">
                                        <input id="password-confirm" style="background-color: rgba(184, 120, 84, 0.5);color:black;"
                                        type="password" placeholder="Confirm password" class="form-control" name="password_confirmation"
                                            autocomplete="new-password">
                                        @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>

                            @if ( auth()->user()->role =='super' )
                                 <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="role" @if($user->role == 'super') checked @endif >
                                    Make Super Admin
                                  </label>
                                </div>
                            @endif




                                <div class="form-group row">
                                <div class="offset-sm-2 col-sm-8">
                                    <button type="submit" class="btn btn-info btn-block">Update</button>
                                </div>
                                </div>
                      </form>

                        </div>

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
@endsection
