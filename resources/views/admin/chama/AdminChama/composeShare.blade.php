@extends('layouts.auth.app')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Compose</h1>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Compose</li>

                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    @include('admin.messages.includes.menu')
                <!-- /.col -->
                <div class="col-md-8" style="margin-left:5%">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Compose New Message</h3>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ route('messages.store') }}" method="post">
                            @csrf


                                <div class="form-group">
                                  <label for="email"></label>
                                  <select class="form-control  @error('email') is-invalid @enderror"   placeholder="To:"  name="email" id="">
                                    <option value="" disabled selected >Select Email</option>
                                      @foreach ($emails as $email)
                                          <option value="{{ $email }}" > {{ $email }} </option>
                                      @endforeach




                                  </select>
                                  @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                                </div>

                                <div class="form-group">
                                    <input class="form-control  @error('subject') is-invalid @enderror" type="text"
                                        name="subject" value="{{ (old('subject')) ? old('subject') : 'sharing chama codes'  }}" placeholder="Subject:">
                                    @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <textarea id="editor" name="body" value="{{ old('body') }}"
                                        class="form-control  @error('body') is-invalid @enderror" style="height: 300px">
                                        @php
                                            echo '<p>You can join my chama using the folloing  chama credetials codes </p>';
                                            echo " <div> Chama Code <strong> ". $chama->chamacode ." </strong></div>";
                                            echo "<div>Chama authorization Code : <strong> ".  $chama->authorizationcode ."</strong> </div>" ;
                                        @endphp




                        </textarea>
                                    @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                {{-- <div class="form-group">
                                    <div class="btn btn-default btn-file">
                                        <i class="fas fa-paperclip"></i> Attachment
                                        <input type="file" name="attachment">
                                    </div>
                                    <p class="help-block">Max. 32MB</p>
                                </div>
                            </div> --}}
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <div class="float-right">

                                    <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i>
                                        Send</button>
                                </div>
                                <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
                            </div>
                        </form>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
