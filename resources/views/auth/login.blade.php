@extends('layouts.app')

@section('content')
<div class="container">

    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <script src="js/main.js"></script>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="POST" data-aos="fade-down" action="{{ route('login') }}">
                    @csrf
                    <span class="login100-form-title p-b-26" data-aos="zoom-out"> <!--제목-->
                        Welcome
                    </span>
                    <span class="login100-form-title p-b-48"> <!--그림-->
                        <i class="zmdi zmdi-font"></i>
                    </span>
                
                    <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">  <!--이메일-->
                        <input id="email" type="email" placeholder="E-Mail Address" class="input100 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Enter password"> <!--비밀번호-->
                        <input id="password" placeholder="Password" type="password" class="input100 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        <span class="focus-input100" ></span>
                    </div>
                    <div class="form-check"> 
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                    <div class="container-login100-form-btn"> <!--제출버튼-->
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button type="submit" class="login100-form-btn">
                                Login
                            </button>
                        </div>
                    </div>

                    <div class="text-center p-t-115"> <!--가입-->
                        <span class="txt1">
                            회원이 아니신가요?
                        </span>
                        @if (Route::has('password.request'))
                            <a class="txt2" href="{{ route('register') }}">
                                {{ __('가입') }}
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
