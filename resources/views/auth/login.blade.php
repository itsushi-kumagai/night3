<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/main-login.css') }}">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <title>Prompt-page-1</title>
</head>
<body>
    <section>
        <div class="prompt">
            <div class="prompt-erea">
                <div class="prompt-contents">
                    <div class="prompt-inner">
                       
                        <h2>{{ __('Login') }}</h2>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="text-box">
                                <div class="text">
                                    <label for="name">{{ __('E-Mail Address') }}</label>
                                </div> 
                                <div class="box">
                                    <input type="mail" id="name" name="email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus><br>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-box">
                                <div class="text">
                                    <label for="email">Password<br>(6 characters minimum)</label>
                                </div>
                                <div class="box">
                                    <input type="password" id="email" name="password" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="sns-icon-erea">
                                <div class="sns-icon face"><a href="{{url('login/facebook')}}"><i class="fab fa-facebook-f"></i><a></div>
                                <div class="sns-icon twi"><a href="{{url('login/facebook')}}"><i class="fab fa-twitter"></i></a></div>
                                <div class="sns-icon goo"><a href="{{url('login/google')}}" ><i class="fab fa-google"></i></a></div>
                            </div>
                        
                        <!--<input type="button" value="Login" class="btn1">--->
                        <button type="submit" class="btn1">
                            {{ __('Login') }}
                        </button>
                        @if (Route::has('password.request'))
                        <div class="pass-link">
                            <a  href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                        @endif
                        <div class="btn2">
                            <a href="/register">Register</a>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>