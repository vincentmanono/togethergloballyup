@extends('layouts.auth.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 justify-content-round  ">
                        <h1 class="m-0 text-dark"> Dashboard</h1>


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

                <!-- Info boxes -->
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1">
                                <i class="fa fa-subscript" aria-hidden="true"></i>

                                {{-- <i class="fas fa-cog"> --}}
                                </i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Subscription</span>
                                <span class="info-box-number">


                                    {!! auth()->user()->subscription_expiry >= now()->format('Y-m-d H:i:s')
                                    ? 'Your subscription expires on: ' . '<span style="color: green">' . date('l jS, M Y h:i
                                        a', strtotime(auth()->user()->subscription_expiry)) . '</span>'
                                    : '<span style="color: red">Subscription Expired</span>' !!}


                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1">
                                <i class="fa fa-hourglass-end" aria-hidden="true"></i>
                            </span>

                            <div class="info-box-content">
                                <span class="info-box-text">Joined Chamas</span>
                                <span class="info-box-number">{{ auth()->user()->chamaSubscribed->count() }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-dark elevation-1">

                                <i class="fa fa-comment" aria-hidden="true"></i>
                                </i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Testimonies</span>
                                <span class="info-box-number">
                                    {{ auth()->user()->testimonies->count() }}
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-secondary  elevation-1">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>

                            <div class="info-box-content">
                                <span class="info-box-text">Wallet</span>
                                <span class="info-box-number">
                                    {{ 'Ksh ' . number_format(auth()->user()->wallet->amount, 2, '.', ',') }}
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->


                <!-- Main row -->
                <div class="row">

                    <div class="col-md-3">
                        <!-- Info Boxes Style 2 -->
                        {{-- <div class="info-box mb-3 bg-warning">
                            <span class="info-box-icon"><i class="fas fa-tag"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Inventory</span>
                                <span class="info-box-number">5,200</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                        <div class="info-box mb-3 bg-success">
                            <span class="info-box-icon"><i class="far fa-heart"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Mentions</span>
                                <span class="info-box-number">92,050</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->

                        <!-- /.info-box -->
                        <div class="info-box mb-3 bg-info">
                            <span class="info-box-icon"><i class="far fa-comment"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Direct Messages</span>
                                <span class="info-box-number">163,921</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div> --}}
                        <!-- /.info-box -->
                        <!-- /.card -->

                        <!-- PRODUCT LIST -->
                        {{-- <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Recently Joined Member to you group</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <ul class="products-list product-list-in-card pl-2 pr-2">
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                                        </div>
                                        <div class="product-info">
                                            <a href="javascript:void(0)" class="product-title">Samsung TV
                                                <span class="badge badge-warning float-right">$1800</span></a>
                                            <span class="product-description">
                                                Samsung 32" 1080p 60Hz LED Smart HDTV.
                                            </span>
                                        </div>
                                    </li>
                                    <!-- /.item -->
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                                        </div>
                                        <div class="product-info">
                                            <a href="javascript:void(0)" class="product-title">Bicycle
                                                <span class="badge badge-info float-right">$700</span></a>
                                            <span class="product-description">
                                                26" Mongoose Dolomite Mens 7-speed, Navy Blue.
                                            </span>
                                        </div>
                                    </li>
                                    <!-- /.item -->
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                                        </div>
                                        <div class="product-info">
                                            <a href="javascript:void(0)" class="product-title">
                                                Xbox One <span class="badge badge-danger float-right">
                                                    $350
                                                </span>
                                            </a>
                                            <span class="product-description">
                                                Xbox One Console Bundle with Halo Master Chief Collection.
                                            </span>
                                        </div>
                                    </li>
                                    <!-- /.item -->
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                                        </div>
                                        <div class="product-info">
                                            <a href="javascript:void(0)" class="product-title">PlayStation 4
                                                <span class="badge badge-success float-right">$399</span></a>
                                            <span class="product-description">
                                                PlayStation 4 500GB Console (PS4)
                                            </span>
                                        </div>
                                    </li>
                                    <!-- /.item -->
                                </ul>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-center">
                                <a href="javascript:void(0)" class="uppercase">View All members</a>
                            </div>
                            <!-- /.card-footer -->
                        </div> --}}
                        <!-- /.card -->
                    </div>
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">Latest Subscription Payments</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead>
                                            <tr>
                                                <th>Amount</th>
                                                <th>Start date</th>
                                                <th>Expiry Date</th>
                                                {{-- <th>Phone</th> --}}
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($subscriptions as $sub)
                                                <tr>

                                                    <td>
                                                        {{ 'Ksh ' . number_format($sub->amount, 2, '.', ',') }}
                                                    </td>
                                                    <td>{{ date('l jS M, h:i a', strtotime($sub->start_date)) }}</td>
                                                    <td>{{ date('l jS M, h:i a', strtotime($sub->expiry_date)) }}</td>
                                                    {{-- <td>
                                                        {{ $sub->payment->phoneNumber }}
                                                    </td> --}}
                                                    <td>
                                                        @if($sub->expiry_date >= now())
                                                            <span class="badge badge-success">Active</span>
                                                        @else
                                                            <span class="badge badge-danger">Expired</span>
                                                        @endif

                                                    </td>

                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <button type="button" class="btn btn-sm btn-info float-left" data-toggle="modal"
                                    data-target="#subscription">
                                    Renew Subscription
                                </button>
                                <a href="{{ route('user.all.subscription') }}"
                                    class="btn btn-sm btn-secondary float-right">View All Subscriptions</a>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                    </div>

                </div>

                <!-- Button trigger modal -->


                <!-- Modal -->
                <div class="modal fade" id="subscription" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Renew Subscription</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h3 class="text text-cyan text-center">You can renew you Subscription with <span
                                        class="text text-success"> KSH 100 bob </span> only and access all our services</h3>
                                <form action="{{ route('user.renew.subscription') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Phone Number</label>
                                        <input type="text" class="form-control" name="phone" id="phone"
                                            aria-describedby="helpId" placeholder="07********">
                                        <small id="helpId" class="form-text text-muted">Type your Phone number here</small>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Send </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>




                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
