<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <title>Reset-password-page</title>
</head>
<body>
    <section>
        <div class="prompt">
            <div class="prompt-erea">
                <div class="prompt-contents">
                    <div class="prompt-inner">
                        <h2>Reset Password</h2>
                        <form method="POST" action="{{ route('password.update') }}">
                                @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="text-box">
                                <div class="text">
                                    <label for="name">E-mail address</label>
                                </div> 
                                <div class="box">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                </div>
                            </div>
                            <div class="text-box">
                                <div class="text">
                                    <label for="email">Password</label>
                                </div>
                                <div class="box">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="text-box">
                                    <div class="text">
                                        <label for="email">Confirm Password</label>
                                    </div>
                                    <div class="box">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                        <button type="submit" class="btn2">
                            Reset Password
                        </button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>