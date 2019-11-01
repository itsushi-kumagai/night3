<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/verify.css') }}">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <title>Password-send-page</title>
</head>
<body>
    <section>
        <div class="prompt">
            <div class="prompt-erea">
                <div class="prompt-contents">
                    <div class="prompt-inner">
                        <h2>Great !</h2>
                        <div class="send-icon">
                            <img src="../prompt/send.png" alt="send-icn">
                        </div>
                        <p>Before proceeding, please check your email for a verification link.</p>
                        <div class="pass-link">If you did not receive the email,
                            <a href="{{ route('verification.resend') }}">click here to request another</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>