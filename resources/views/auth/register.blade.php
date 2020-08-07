
@extends('layouts.app')

@section('content')
<body class="hold-transition register-page">
    <div class="register-box">
      <div class="register-logo">
        <a href="/">  {{ config('app.name', 'togethergloballyup') }}</a>
      </div>

      <div class="card">
        <div class="card-body register-card-body">
          <p class="login-box-msg">Register a new membership</p>

          <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="input-group mb-3">
              <input id="name" type="text" placeholder="Your full name" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>

            <div class="input-group mb-3">
                <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
                <input id="phone" type="number" placeholder="Phone Number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
                <input id="password-confirm" type="password" placeholder="Confirm password" class="form-control" name="password_confirmation" required autocomplete="new-password">

              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-8">
                <div class="icheck-primary">
                  <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                  <label for="agreeTerms">
                   I agree to the <a href="#">terms</a>
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Register</button>
              </div>
              <!-- /.col -->
            </div>
          </form>

          <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="{{ route('social.oauth', 'facebook') }}" class="btn btn-block btn-primary">
              <i class="fab fa-facebook mr-2"></i>
              Sign up using Facebook
            </a>
            <a href="{{ route('social.oauth', 'google') }}" class="btn btn-block btn-danger">
              <i class="fab fa-google-plus mr-2"></i>
              Sign up using Google+
            </a>
          </div>

          <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
        </div>
        <!-- /.form-box -->
      </div><!-- /.card -->
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

