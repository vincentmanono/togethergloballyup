
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
                     src="{{ asset('admin/dist/img/user4-128x128.jpg') }}"
                     alt="User profile picture">
              </div>

              <h3 class="profile-username text-center">{{ $user->firstName . ' '. $user->lastName }}</h3>

              <p class="text-muted text-center">{{ $user->role }}</p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                 <b>Joined Chamas</b>  <a class="float-right text-bold"> {{ $user->chamaSubscribed->count() }} </a>
                </li>
                <li class="list-group-item">
                  <b>Wallet Amount</b> <a class="float-right"><span class="text text-bold " >Ksh</span>{{number_format($user->wallet->amount,2,'.',',') }}</a>
                </li>
                <li class="list-group-item">
                  <b>Email </b>  <a class="float-right">{{ $user->email }}</a>
                </li>
              </ul>

              {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
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

                    {!! $user->subscription_expiry >= now()->format('Y-m-d H:i:s')? 'Your subscription expires on: '
                    . '<span style="color: green">' .
                    date('l jS, M Y h:i a', strtotime($user->subscription_expiry)) . '</span>' : '<span
                        style="color: red">Subscription Expired</span>' !!}
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
                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">My details</a></li>
                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="activity">
                    <div class="x_content">
                        <br />
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Name</b> <a class="pull-right">{{ $user->firstName .' '. $user->lastName }}</a>
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

                            @if ($user->role == "super")
                                 <li class="list-group-item {{ $user->role == 'super' ? '' : 'hidden'}}">
                                <b>Admin Status</b> <a class="pull-right">Super Admin</a>
                            </li>


                            @endif
                            @if ($user->role == "admin")
                                <li class="list-group-item {{ $user->role == 'admin' ? '' : 'hidden'}}">
                                <b>Admin Status</b> <a class="pull-right">Ordinary Admin</a>
                            </li>
                            @endif
                            @if ($user->role == "user")
                                 <li class="list-group-item {{ $user->role == 'user' ? '' : 'hidden'}}">
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
                                                <h4 class="modal-title" id="myModalLabel2">Delete Account</h4>
                                            </div>
                                            <div class="modal-body">
                                                <h4>Confirmation</h4>
                                                <p>Are you sure you want to delete this account for
                                                    {{ $user->firstName . "" . $user->lastName }}? This
                                                    action cannot be
                                                    undone once confirmed.</p>

                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Cancel</button>
                                                @csrf
                                                <button class="btn btn-xs btn-danger" type="button">Delete</button>

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
                  <!-- The timeline -->
                  <div class="timeline timeline-inverse">
                    <!-- timeline time label -->
                    <div class="time-label">
                      <span class="bg-danger">
                        10 Feb. 2014
                      </span>
                    </div>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->

                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <div>
                      <i class="fas fa-camera bg-purple"></i>

                      <div class="timeline-item">
                        <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                        <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                        <div class="timeline-body">
                          <img src="http://placehold.it/150x100" alt="...">
                          <img src="http://placehold.it/150x100" alt="...">
                          <img src="http://placehold.it/150x100" alt="...">
                          <img src="http://placehold.it/150x100" alt="...">
                        </div>
                      </div>
                    </div>
                    <!-- END timeline item -->
                    <div>
                      <i class="far fa-clock bg-gray"></i>
                    </div>
                  </div>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="settings">
                  <form action="{{ route('profile.update',$user->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data" >
                      @csrf
                      @method("put")
                    <div class="form-group row">
                      <label for="firstame" class="col-sm-2 col-form-label">First Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="firstame"  name="firstname"
                         value="{{ $user->firstName }}" placeholder="Your firstname">
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="lastname" class="col-sm-2 col-form-label">User Names</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="lastname" value="{{ $user->lastName }}" name="lastname" placeholder="Your Lastname">
                        </div>
                      </div>

                    <div class="form-group row">
                      <label for="email" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email"  value="{{ $user->email }}" placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                      <div class="col-sm-10">
                        <input type="tel" class="form-control" id="phone" name="phone" value="{{ $user->phone }}"  placeholder="Your phone number">
                      </div>
                    </div>

                    <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label">Picture</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control-file" id="image" name="image"  placeholder="Update profile">
                        </div>
                    </div>



                    <hr>

                    <div class="form-group row">
                        <label for="image" class="col-sm-12 col-form-label">Update your Password</label>

                        <div class="col-sm-10">
                          <input type="password" class="form-control " style="background-color: rgba(184, 120, 84, 0.5);color:black;"  id="image" name="oldpassword" placeholder="Previous Password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                          <input type="password" class="form-control  " id="password" name="password" style="background-color: rgba(184, 120, 84, 0.5);color:black;"    placeholder="New Password">
                        </div>
                        <div class="col-sm-6">
                            <input type="password" class="form-control  " id="confirm" name="confirm" style="background-color: rgba(184, 120, 84, 0.5);color:black;"    placeholder="Confirm Password">
                          </div>
                    </div>


                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
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
