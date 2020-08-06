@extends('layouts.auth.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Testimonies from Clients</h1>
                </div>
                <div style="float:left">

            </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Testimonies</li>
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
                <h3 class="card-title">Monitor testimonies from clients  </h3>
                {{-- <a href="/testimonies/create" class="btn btn-sm btn-primary ml-3 mr-3 ">Write Testimony</a> --}}
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm ml-3 mr-3" data-toggle="modal" data-target="#modelId">
                    Write Testimony
                </button>
<div>
</div>
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
                      <th>Owner</th>
                      <th>Body</th>
                      <th>Options</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($testimonies as $testimony)
                            <tr>
                    <td class="text text-capitalize text-bold" >{{$testimony->user->name }}</td>
                    <td>{{ Str::limit($testimony->body , 60 , '...') }}</td>
                    <td class="row" >
                        <a name="" id="" class="btn btn-primary btn-sm mr-2" href="{{ route('testimonies.show',$testimony) }}" role="button">Read More</a>
                        @if (auth()->user()->role == "super" || auth()->user()->id == $testimony->user_id )
                              <a class="btn btn-sm btn-info col " href="{{ route('testimonies.edit',$testimony) }}"
                              style="float:left"> <i class="fa fa-pencil" aria-hidden="true">Edit</i> </a>

                        @endif

                    </td>
                    </tr>

                        @endforeach


                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Body</th>
                        <th>Options</th>
                    </tr>
                    </tfoot>
                  </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              Testimonies
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>


<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Write Something about us</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('testimonies.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="">Testimony</label>
                      <textarea  class="form-control  @error('body') is-invalid @enderror" name="body" id="body"  rows="3">
                          {{ old('body') }}
                      </textarea>
                    </div>
                    @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Testimony</button>
                        </div></form>
            </div>

        </div>
    </div>
</div>




@endsection
