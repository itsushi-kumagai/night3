<section>
    <h2>HOW TO USE</h2>
    
    <div class="contents">
        @if(Auth::check())
        @else
        <div class="use_contents">        
                <img src="../../LPImages/phone image 1@2x.png" alt="phone1">
            <div class="Description">
                <h3>register</h3>
                <p>register or login to use it more comfortably.</p>
                
                <div class="register-btn">
                    <a href="/register">Register</a>
                </div>
                
            </div>
        </div>
        @endif

        <div class="use_contents use_contents2">           
            <div class="Description" style="align-items: center;">
                <h3>Create a profile</h3>
                <p>make your profile and let peopleknow who you are.</p>
            </div>
            <img src="../../LPImages/phone image 2@2x.png" alt="phone2">
        </div>

        <div class="use_contents">        
            <img src="../../LPImages/phone image 3@2x.png" alt="phone1">
                <div class="Description">
                    <h3>Find events</h3>
                    <h4><span style="color: #F70661">●</span> Save function</h4>
                        <div class="phone-3">
                                <p>You can use the save function. 
                                Save and stock events of interest</p>
                        </div> 
                    <h4><span style="color: #F70661">●</span> Show recommendations</h4>
                        <div class="phone-3">
                            <p>We can introduce recommended 
                                events tailored to you</p>
                        </div>        
                </div> 
        </div>

        <div class="use_contents use_contents2">
                <div class="Description">
                    <h3>Alternating current</h3>
                    <p>Chat about events with
                    many other users using 
                    the chat feature.</p>
                </div>
                <img src="../../LPImages/phone image 4@2x.png" alt="phone2">
        </div>
    </div>   
    @if(Auth::check())
    @else
        <div class="start">
            <h3>Let's start</h3>
            <div class="register-btn">
                    <a href="/register">Register</a>
            </div>
        </div>
    @endif
</section>