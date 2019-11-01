<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('/css/main-register.css') }}">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <title>register-page</title>
</head>
<body>
    <section>
        <div class="prompt">
            <div class="prompt-erea">
                <div class="prompt-contents">
                    <div class="prompt-inner">
                        <h2>{{ __('Register') }}</h2>
                        <form method="POST" action="{{ route('admin.register') }}">
                            @csrf
                            <div class="text-box">
                                    <div class="text">
                                        <label for="name">{{ __('Name') }}</label>
                                    </div> 
                                    <div class="box">
                                        <input type="text" id="name" name="name" @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                            </div>
                            <div class="text-box">
                                <div class="text">
                                    <label for="name">{{ __('E-Mail Address') }}</label>
                                </div> 
                                <div class="box">
                                    <input type="mail" id="name" name="email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"><br>
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
                                    <input type="text" id="email" name="password" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-box">
                                    <div class="text">
                                        <label for="email">{{ __('Confirm Password') }}</label>
                                    </div>
                                    <div class="box">
                                        <input type="password" id="email" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                            
                       
                        <button class="btn2" type="submit">
                            {{ __('Register') }}
                        </button>
                        <div class="pass-link"><a href="{{ route('admin.login') }}">Do you have an account ?</a></div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>