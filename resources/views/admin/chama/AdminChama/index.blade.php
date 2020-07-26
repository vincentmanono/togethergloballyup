@extends('layouts.auth.app')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> All My Chama </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"> All My chama </li>
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
                <h3 class="card-title"> Monitor Your created chama
                </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
      <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
      <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">


                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Chama</th>
                      <th>Amount</th>
                      <th>members</th>

                      <th>next Voting</th>

                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($chamas as $chama)
                            <tr class="{{ $chama->activate ?'bg-success':'bg-danger' }}" >
                      <td>{{ $chama->name }}</td>
                      <td> {{"Ksh ". $chama->amount }} </td>
                      <td> {{ $chama->users->count()}}</td>

                      <td>
                        {{ date('l jS M Y, h:i a', strtotime($chama->nextVote)) }}
                            </td> 
                      <td>
                          <a name="chama" id="" class="btn btn-primary" href="{{ route('admin.allmychama.show',$chama->id) }}" role="button">
                              <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                  View More
                              </i>
                          </a>
                      </td>
                    </tr>

                        @endforeach

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Chama</th>
                        <th>Amount</th>
                        <th>Description</th>

                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>



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
