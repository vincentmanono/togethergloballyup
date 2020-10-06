@extends('layouts.auth.app')
@section('content')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Found chama</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Chama Search</li>
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
                <div class="card-body">
                    <div class="row">

                        <div class="col-lg-6">
                            <ul class="list-group">
                                <li class="list-group-item ">Chama : <span class="float-right mr-3 text text-bold" >{{ $chama->name }}</span> </li>
                                <li class="list-group-item ">Amount : <span class="float-right mr-3 text text-bold" >{{ $chama->amount }}</span> </li>
                                <li class="list-group-item ">Duration <span class="float-right mr-3 text text-bold" >{{ $chama->duration . " days" }}</span> </li>
                                <li class="list-group-item ">Members <span class="float-right mr-3 text text-bold" >{{ $chama->users->count()  }}</span> </li>
                                <li class="list-group-item ">
                                    @php
                                        echo $chama->description ;
                                    @endphp
                                </li>

                            </ul>
                        </div>

                        <div class="col-lg-6">

                            <form action="{{ route('user.chama.join') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="authorize">Input authorization Code</label>

                                    <input id="authorize" type="text" placeholder="authorization code to join chama" class="form-control @error('authorize') is-invalid @enderror" name="authorize" value="{{ old('authorize') }}" required autocomplete="authorize" autofocus>

                                    @error('authorize')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>

                                            </span>
                                        @enderror
                                </div>
                                <button type="submit" class="btn btn-primary btn-block ">Join chama</button>
                            </form>
                        </div>

                    </div>






                </div>
            </div>

            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>




@endsection
