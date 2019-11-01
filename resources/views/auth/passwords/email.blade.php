<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/email.css') }}">
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
                        @if (session('status'))
                            <div class="alert alert-success" role="alert" style="margin-bottom: 1rem;">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h2>Forgot Password ?</h2>
                        <p >Please enter your email to reset your password</p>
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                        
                            <div class="text-box">
                                <div class="text">
                                    <label for="name">E-mail adress</label>
                                </div> 
                                <div class="box">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </div>
                            </div>
                        <button type="submit" class="btn1">
                            Send
                        </button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>