<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/main-prompt.css') }}">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <title>Prompt-page-1</title>
</head>
<body>
    <section>
        <div class="prompt">
            <div class="prompt-erea">
                <div class="prompt-contents">
                    <div class="prompt-inner">
                        <h2>Login or Register</h2>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="content-erea">
                                <dl class="content">
                                    <div class="content-inner">
                                        <dt class="content-img">
                                            <img src="../../prompt/heart (1).png" alt="save">
                                        </dt>
                                        <dd>Save the events</dd>
                                    </div>
                                    
                                    <div class="content-inner">
                                        <dt class="content-img">
                                            <img src="../../prompt/search.png" alt="list">
                                        </dt>
                                        <dd>Create my list</dd>
                                    </div>
                                    
                                    <div class="content-inner">
                                        <dt class="content-img">
                                            <img src="../../prompt/conversation.png" alt="chat">
                                        </dt>
                                        <dd>Chat with users</dd>
                                    </div>
                                </dl>
                                </div>
                                <div class="sns-icon-erea">
                                    <div class="sns-icon face"><i class="fab fa-facebook-f"></i></div>
                                    <div class="sns-icon twi"><i class="fab fa-twitter"></i></div>
                                    <div class="sns-icon goo"><i class="fab fa-google"></i></div>
                                </div>
                            <div class="text-box">
                                <div class="text">
                                    <label for="name">E-mail adress</label>
                                </div> 
                                <div class="box">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus><br>
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
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"><br>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
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
                    </div>
                </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>