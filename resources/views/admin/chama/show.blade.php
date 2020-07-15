@extends('layouts.auth.app')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $chama->name }}</h1>
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
                <h3 class="card-title"> View Chama Details
                    <a name="" id="" class="btn btn-primary" href="{{ route('admin.chama') }}" role="button">Back</a>
                    <!-- Button trigger modal -->
                    @if (auth()->user()->role == "admin"  && ($chama->activate == 0) && ($chama->user_id == auth()->user()->id) )
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#activatechama">
                        Activate chama
                       </button>

                       <!-- Modal -->
                       <div class="modal fade" id="activatechama" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                           <div class="modal-dialog" role="document">
                               <div class="modal-content">
                                   <div class="modal-header">
                                       <h5 class="modal-title">Activate {{ $chama->name }}</h5>
                                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                               <span aria-hidden="true">&times;</span>
                                           </button>
                                   </div>
                                   <div class="modal-body">
                                      <div class="text text-dark" >
                                          You are required to pay <span class="text text-success" >Ksh 150 only</span> to activate your account
                                      </div>
                                      <form action="" method="post">
                                          <div class="form-group">
                                            <label for="phone">Phone number</label>
                                            <input type="tel" name="phone" id="phone" class="form-control"  required placeholder="07********"

                                            aria-describedby="helpPhone">
                                            <small id="helpPhone" class="text-muted">Enter your mobile number here</small>
                                          </div>

                                   </div>
                                   <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Close</button>
                                       <button type="submit" class="btn btn-primary pull-right">Pay</button>
                                   </div>
                                </form>
                               </div>
                           </div>
                       </div>


                    @endif



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
                                    <th>Status</th>
                                    <th>Members</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{  $chama->name  }}</td>
                                        <td scope="row">Ksh {{ number_format( $chama->amount,2,'.',',')  }}</td>
                                        <td>{{ $chama->admin->firstName . ' '. $chama->admin->lastName }}</td>
                                        <td>
                                            @if ($chama->activate)
                                                <span class="text text-success text-bold " >Activated</span>
                                            @else
                                                <span class="text text-warning text-bold" >Not Activated</span>
                                            @endif
                                              </td>

                                        <td>{{ $chama->users->count() }}</td>

                                        <td class="row" >


                                              @can('update', $chama)
                                                 <button type="button" class="btn btn-warning btn-sm col-6" data-toggle="modal" data-target="#modal-lg">
                                                Edit Chama
                                              </button>
                                              @elsecan('delete', $chama)
                                                <form class="col-6" action="{{ route('admin.chama.destroy',$chama) }}" id="deletechamaform" method="post">
                                                @method("DELETE")
                                                  @csrf
                                                  <button type="submit"class="btn btn-danger">Delete Chama</button>
                                              </form>
                                              @endcan



                                        <form action="{{ route('user.chama.join') }}" method="post">
                                            @csrf



                                                <input type="hidden" class="form-control hidden "
                                                name="chamaID" value="{{ $chama->id }}" >

                                            @if ($chama->activate)
                                                 <button type="submit" class="btn btn-primary">Join Chama</button>
                                            @else
                                            <button type="button" class="btn btn-primary disabled ">Join Chama</button>

                                            @endif


                                        </form>




                                         </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text text-capitalize text-dark"  >
                                            {{ $chama->description }}
                                        </td>
                                    </tr>

                                </tbody>
                        </table>
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
                      <form action="{{ route('admin.chama.update',$chama) }}" method="post">
                          @method("PUT")
                          @csrf
                          <div class="form-group">
                            <label for="">Chama Name</label>
                            <input type="text" name="name" id="" value="{{ $chama->name }}" class="form-control" placeholder="Chama name" aria-describedby="chamaNamehelp">
                            <small id="chamaNamehelp" class="text-muted">Use unique Name</small>
                          </div>
                          <div class="form-group">
                            <label for="">Amount</label>
                            <input type="text" name="amount" id="" value="{{ $chama->amount }}" class="form-control" placeholder="Chama amount" aria-describedby="chamaamounthelp">
                            <small id="chamaamounthelp" class="text-muted">Amount to be contributed by members</small>
                          </div>
                          <div class="form-group">
                            <label for="description">Chama Description</label>
                            <textarea class="form-control" name="description" id="" rows="3">{{ $chama->description }}</textarea>
                          </div>



                  </p>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
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
