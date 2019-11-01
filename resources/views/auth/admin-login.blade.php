<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/main-login.css') }}">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <title>Prompt-page-1</title>
</head>
<body>
    <section>
        <div class="prompt">
            <div class="prompt-erea">
                <div class="prompt-contents">
                    <div class="prompt-inner">
                       
                        <h2>{{ __('Login') }}</h2>
                        <form method="POST" action="{{ route('admin.login.submit') }}">
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
                                    <label for="email">{{ __('Password') }}</label>
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
                        <!--<input type="button" value="Login" class="btn1">--->
                        <button type="submit" class="btn1">
                            {{ __('Login') }}
                        </button>
                        <div class="btn2">
                            <a href="{{ route('admin.register') }}">Register</a>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>