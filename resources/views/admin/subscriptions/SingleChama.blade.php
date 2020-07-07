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
                    <a name="" id="" class="btn btn-primary" href="{{ route('admin.chama') }}" role="button">Back</a>
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
                                    <th>Next Contribution</th>
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
                                            {{ $chama->admin->firstName ." ".$chama->admin->lastName }}
                                            </a>

                                                </td>
                                           <td class="text text-bold" >
                                            {{ date('l jS M, h:i a', strtotime($chama->duration)) }}
                                           </td>

                                           <td> {{ $chama->users->count() }}</td>
                                           <td>
                                               <!-- Button trigger modal -->
                                               <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
                                                 Pay your money
                                               </button>

                                               <!-- Modal -->
                                               <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                   <div class="modal-dialog" role="document">
                                                       <div class="modal-content">
                                                           <div class="modal-header">
                                                               <h5 class="modal-title">My Contribution</h5>
                                                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                       <span aria-hidden="true">&times;</span>
                                                                   </button>
                                                           </div>
                                                           <div class="modal-body">
                                                               <form action="" method="post">
                                                                   <div class="form-group">
                                                                     <label for="phone">Phone Number</label>
                                                                     <input type="text"
                                                                       class="form-control" name="phone" id="phone" aria-describedby="phone" value="{{ auth()->user()->phone }}" placeholder="Phone number">
                                                                     <small id="phone" class="form-text text-muted">Change if you do not want to use your number</small>
                                                                   </div>

                                                           </div>
                                                           <div class="modal-footer">
                                                               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                               <button type="button" class="btn btn-primary">Pay out</button>
                                                           </div>
                                                        </form>
                                                       </div>
                                                   </div>
                                               </div>
                                           </td>
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
                                                            <th>Rank</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($chama->users as $user)
                                                             <tr>
                                                            <td>{{ $user->firstName . ' '.$user->lastName }}</td>
                                                            <td>{{ $user->phone }}</td>
                                                            <td>{{ "Not Yet" }}</td>
                                                        </tr>
                                                        @empty

                                                        @endforelse

                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Phone</th>
                                                            <th>Rank</th>
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
