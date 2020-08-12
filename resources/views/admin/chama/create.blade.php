@extends('layouts.auth.app')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create new Chama</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
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
                <h3 class="card-title"> Create Chama
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
                    <div class="col-md-6 col-sm-12 ">
                        <div id="accordianId" role="tablist" aria-multiselectable="true">
                            <div class="card">
                                <div class="card-header" role="tab" id="section1HeaderId">
                                    <h5 class="mb-0">
                                        <a data-toggle="collapse" data-parent="#accordianId" href="#section1ContentId" aria-expanded="true" aria-controls="section1ContentId">
                                  How to Activate your Chama
                                </a>
                                    </h5>
                                </div>
                                <div id="section1ContentId" class="collapse in" role="tabpanel" aria-labelledby="section1HeaderId">
                                    <div class="card-body">
                                        <ul class="list-group">
                                            <li class="list-group-item active">After Creating chama You will be redirected to page requesting you to Activate Your Chama</li>
                                            <li class="list-group-item ">Your are required to Pay <span class="text text-info" >KES 150.00</span> only to Activate Your Chama</li>

                                            <li class="list-group-item ">Click On the button  green button named <span class="text text-success" > (Activate Chama)  </span></li>
                                            <li class="list-group-item ">
                                                Enter mobile Number to Pay for Activation.
                                            </li>
                                            <li class="list-group-item ">
                                                Popup menu will show on your mobile . requesting you to pay 150.00 To activate your chama
                                            </li>
                                            <li class="list-group-item ">
                                               Enter your Mpesa PIN to authorize payment
                                            </li>
                                            <li class="list-group-item ">
                                                Congradulation !! your chama is now activated ..
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>





                    <div class="card card-primary col-md-6 col-sm-12">
                        <div class="card-header">
                          <h3 class="card-title">Create Chama</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" id="quickForm" method="POST" action="{{ route('user.chama.store') }}"  novalidate="novalidate">
                            @method("POST")
                            @csrf
                          <div class="card-body">
                            <div class="form-group">
                              <label for="Name">Name of the Chama</label>
                              <input id="name" type="text" placeholder="Name of the Chama" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                              @error('name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>

                                      </span>
                                  @enderror


                                  <label for="amount">Amount </label>
                                  <input id="amount" type="text" placeholder="Amount Members will be contributing"
                                   class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}"
                                    required autocomplete="amount" autofocus>

                                  @error('amount')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>

                                          </span>
                                      @enderror
                                      <div class="form-group">

                                     <label for="duration">duration </label>
                                      <input id="amount" type="number" placeholder="Duration in days"
                                       class="form-control @error('duration') is-invalid @enderror" name="duration" value="{{ old('duration') }}"
                                        required autocomplete="duration" autofocus>

                                      @error('duration')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>

                                              </span>
                                          @enderror
                                      </div>





                                      <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea  class="form-control @error('description') is-invalid @enderror" class="form-control" placeholder="Write something about the chama" name="description" id="description" rows="3">{{ old('description') }}</textarea>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>

                                        </span>
                                         @enderror
                                      </div>


                            <div class="form-group mb-0">
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="terms" class="custom-control-input is-invalid"
                                 id="exampleCheck1" aria-describedby="terms-error">



                                <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
                              </div>
                            <span id="terms-error" class="error invalid-feedback" style="display: inline;">Please accept our terms</span></div>
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </form>
                      </div>




                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a name="" id="" class="btn btn-primary" href="{{ route('admin.chama') }}" role="button">Back</a>

            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

   </section>
    <!-- /.content -->
</div>
@endsection
