@extends('layouts.auth.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner row">
                  <div class="col-md-6" >
                      <h3>{{ $admins }}</h3>


                <p>Admins</p>
                  </div>
                  <div class="col-md-6  border-left border-dark " >
                    <h3>{{ $super }}</h3>

                    <p>Super</p>
                  </div>

              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ route('admin.all.super') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3> {{ $users }}</h3>

                <p>Users</p>
              </div>
              <div class="icon">
                <i class="fa fa-users" aria-hidden="true"></i>
              </div>
              <a href="{{ route('admin.users.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $active_subscribers }}</h3>

                    <p>Users with active subscriptions.</p>

              </div>
              <div class="icon">
                <i class="fa fa-users" aria-hidden="true"></i>
              </div>
              <a href="{{ route('admin.active.subscription') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $active_chamas }}</h3>

                <p> Active Chamas </p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>

              </div>
              <a href="{{ route('admin.chama') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">



            <!-- TO DO List -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  Withdraw Requests
                </h3>

                <div class="card-tools">
                  {{ $withdraws->links()  }}
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <table class="table table-hover table-inverse ">
                    <thead class="thead-inverse">
                        <tr>
                            <th>User</th>
                            <th>Amount</th>
                            <th>Phone</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach ($withdraws as $withdraw)
                                <tr>
                                <td scope="row">{{$withdraw->user->name }}</td>
                                <td>{{ $withdraw->amount }}</td>
                                <td>{{ $withdraw->user->phone }}</td>
                                <td> {{ $withdraw->created_at->  format("Y/M/d H:i:s A") }} </td>
                                <td>
                                    @if ($withdraw->confirmed )
                                        <span class="badge badge-pill badge-success">Completed</span>
                                    @else
                                    <span class="badge badge-pill badge-warning">Pedding</span>

                                    @endif
                                </td>
                                <td>

                                    @if (! $withdraw->confirmed)
                                    <form action="{{ route('user.withdraw.confirm',$withdraw->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Confirm</button>
                                    </form>
                                    @else

                                    @endif


                                </td>
                            </tr>
                            @endforeach



                        </tbody>
                </table>



              </div>

            </div>
            <!-- /.card -->
          </section>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
