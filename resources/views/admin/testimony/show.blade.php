@extends('layouts.auth.app')
@section('content')



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Testimony</h1>
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
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h4 class="display-4">{{ $single->user->name }}
                    <span class="badge badge-success">Author</span> </h4>
                    <a name="" id="" class="btn btn-primary float-right mr-3" href="{{ route('testimonies.index') }}" role="button"> <i class="fa fa-backward" aria-hidden="true"></i> Back</a>
                <p class="lead">Published on <span class="text text-dark" >  {{ date('l jS M Y, h:i a', strtotime($single->created_at)) }}</span></p>
                <hr class="my-2">
                <p class="text text-dark border  p-3 py-3 m-2 " >{{ $single->body }}</p>
                <p class="lead">
                    @can('update', $single)
                    <a class="btn btn-info btn-sm" href="{{ route('testimonies.edit',$single) }}" role="button">Edit Testimony</a>

                    @endcan
                    @can('delete', $single)
                        <button type="button"class="btn btn-danger pull-right float-right mr-5" data-toggle="modal" data-target="#modelId">
                        delete
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete Testimony</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    <div class="modal-body">
                                        After deleting this testimony , you can not restore it ..
                                        <form action="{{ route('testimonies.destroy',$single) }}" method="post">
                                            @method("DELETE")
                                            @csrf
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary pull-left float-left" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger pull-right float-right">Delete</button>

                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endcan


                </p>
            </div>
        </div>

        <!-- Button trigger modal -->





    </section>
</div>
@endsection
