@extends('layouts.app')





@section('content')
<body class="hold-transition register-page bg-info ">
    <div class="register-box">
      <div class="register-logo">
        <a href="/" class="text text-capitalize  text-dark" >  {{ config('app.name', 'togethergloballyup') }}</a>
      </div>


      <div class="card">
        <div class="card-body register-card-body">
        <div class="card-header login-box-msg">{{ __('Verify Your Email Address') }}</div>

        <div class="card-body">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif

            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }},
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
            </form>
        </div>
    </div>


    </div>
    <!-- /.register-box -->

       <!-- jQuery -->
       <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
       <!-- Bootstrap 4 -->
       <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
       <!-- AdminLTE App -->
       <script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
    </body>
@endsection

