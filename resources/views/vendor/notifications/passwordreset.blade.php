<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap">
    <title>Mail-send-page</title>
</head>
<body>
    <style>
  .prompt {
    height: 130vh;
    width: 0 auto;
    background: url(../../email/paul-fiedler-L-O36LuX9TY-unsplash.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: 40% -250px;
    color: #ffffff;
  }
  
  .prompt-erea {
    height: 120vh;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
        -ms-flex-pack: center;
            justify-content: center;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
  }
  
  .prompt-inner {
    position: absolute;
    margin-top: 3rem;
    height: 100vh;
    width: 95%;
    background: rgba(255, 255, 255, 0.95);
    border-radius: 30px;
    top: 90%;
    -webkit-transform: translateY(-90%);
            transform: translateY(-90%);
    padding: 4rem 2rem;
    -webkit-box-sizing: border-box;
            box-sizing: border-box;
    color: #000000;
  }
  
  .prompt-inner h1 {
    margin-bottom: 2rem;
    font-size: 2.5rem;
    font-weight: bold;
  }
  
  .prompt-inner h2 {
    margin-bottom: 1.5rem;
    font-size: 1.6rem;
  }

  .prompt-inner p {
    margin-bottom: 2rem;
  }
  
  .btn1 {
    color: #ffffff;
    background: #F70661;
    margin-top: 2rem;
    height: 30px;
    width: 200px;
    border: none;
    border-radius: 30px;
    font-size: 1.3rem;
    line-height: 1rem;
    cursor: pointer;
    outline: none;
    letter-spacing: 1.5px;
    font-size: 1.3rem;
    padding: 1rem;
    text-decoration: none;
  }
  
  .footer-area {
    color: black;
    position: absolute;
    height: 50px;
    width: 90%;
    border-top: solid 1px #000000;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
        -ms-flex-pack: center;
            justify-content: center;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
    bottom: 0;
    left: 50%;
    -webkit-transform: translateX(-50%);
            transform: translateX(-50%);
    margin-top: 3rem;
  }
  
  @media screen and (max-width: 1030px) {
    .prompt-inner h1 {
      margin-bottom: 2.2rem;
    }
    .prompt-inner h2 {
      margin-bottom: 1.2rem;
    }
    .prompt-inner p {
      font-size: 1.2rem;
    }

    .prompt-inner {
      height: 60rem;
      margin-top: 30rem;
    }
  }
  
  @media screen and (max-width: 766px) {
    .prompt-contents {
      width: 80%;
    }
    .prompt-inner {
      text-align: center;
      padding: 3rem 1.5rem;
    }
    .prompt-inner h1 {
      margin-bottom: 1rem;
      font-size: 1.8rem;
    }
    .prompt-inner h2 {
      margin-bottom: 0.5rem;
      font-size: 1.3rem;
    }
    .prompt-inner p {
      font-size: 1rem;
    }
    .btn1 {
      margin-top: 2.0rem;
      height: 20px;
    }
  }
  
  * {
    margin: 0;
    padding: 0;
    font-family: 'Lato', sans-serif;
    font-weight: 100;
  }
  
  body {
    letter-spacing: 1.5px;
    background: #000000;
  }
  
  .face {
    background: #305097;
  }
  
  .twi {
    background: #00aced;
  }
  
  .goo {
    background: #db4a39;
  }
  /*# sourceMappingURL=main.css.map */
    </style>
     <section>
      <div class="prompt">
          <div class="prompt-erea">
              <div class="prompt-inner">
                  <h1>Change password</h1>
                  <h2>Create a new password</h2>
                  <p>Please click the button below to change your password.</p>
                  <a href="{{$reset_url}}" class="btn1">Rest Paswword</a>
              </div> 
          </div>
          <footer>
            <div class="footer-area">@2019 DARK CODE</div>
        </footer>     
      </div>
  </section>

</body>
</html>