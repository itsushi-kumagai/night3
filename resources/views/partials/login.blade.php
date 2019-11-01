<section>
    @if(Auth::check())
    @else
    <form method="POST" action="{{ route('login') }}">
        @csrf
    <div class="login">
            <div class="login-contents">
                <div class="login-base">                  
                    
                    <div class="sns-icon-erea">
                        <div class="sns-icon face"><a href="{{url('login/facebook')}}"><i class="fab fa-facebook-f"></i><a></div>
                        <div class="sns-icon twi"><a href="{{url('login/facebook')}}"><i class="fab fa-twitter"></i></a></div>
                        <div class="sns-icon goo"><a href="{{url('login/google')}}" ><i class="fab fa-google"></i></a></div>
                    </div>
                    <div class="login-erea">
                        <p>E-mail adress</p>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus><br>
                        <p>Password<br>(6 characters minimum)</p>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"><br>
                        <br>
                        </div>
                    <div class="login-link">
                        <button type="submit" class="btn btn-primary text-white py-3 px-4 rounded" data-toggle="modal" data-target="#exampleModal" value="minimum length:6">
                            Login
                        </button>
                    </div>
                </form>
                    <div class="forgot">
                        <a href="#" class="forget">
                            Forgot Password ?
                        </a>
                    </div>
                </div>
            </div>
        </div>
    
    @endif
    
</section>
</div>