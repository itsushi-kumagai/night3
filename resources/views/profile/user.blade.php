<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="{{ asset('/css/main-profile.css') }}">
    
    <title>Profile</title>
</head>
<body>
<div class="container">
    <section id="header-container">
        <div id="header">
            <div class="header-sp">               
            <label for="chk" class="show-menu-btn">
                <i class="fas fa-bars" style="color: white;"></i>
            </label>
            <a href="#"><span class="logo">Dark Code</span></a>
            <button type="submit" class="search-btn-sp">
                <i class="fas fa-search "></i>
            </button>
        </div>   
<div class="head">
            
<div class="menu">
    <div class="menu-list">
        <a href="/">Home</a>
        <a href="{{ route('posts.result') }}">Events</a>
        @if(Auth::check())
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @else
        <a href="/login">Login</a>
        @endif
        @if(Auth::check())
            @if(empty(Auth::user()->profile->image))
                <a href="/user/profile">
                <img src="{{asset('image/image3.jpg')}}" class="image-preview__image">
                </a>
                @else
                <a href="/user/profile">
                <img src="{{asset('uploads/')}}/{{Auth::user()->profile->image}}" class="image-preview__image">
                </a>
            @endif
        @else
            <a href="/register">Register</a>
        @endif
        <label for="chk" class="hide-menu-btn">
            <i class="fas fa-times" style="color: white;"></i>
        </label>
    </div>
</div> 
        <label for="chk" class="hide-menu-btn">
            <i class="fas fa-times" style="color: white;"></i>
        </label>
        <input type="checkbox" id="chk">
    </div>
</div>
<div class="header2">
    <input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
    <label for="openSidebarMenu" class="sidebarIconToggle">
        <div class="spinner diagonal part-1"></div>
        <div class="spinner horizontal"></div>
        <div class="spinner diagonal part-2"></div>
    </label>
    <div id="sidebarMenu">
    <ul class="sidebarMenuInner">
        <li><a href="#" target="_blank">Home</a></li>
        <li><a href="#" target="_blank">Events</a></li>
        <li><a href="#" target="_blank">Profile</a></li>
        <li><a href="#" target="_blank">Log out</a></li>
    </ul>
    </div>
    <input type="checkbox" class="openSidebarSearch" id="openSidebarSearch">
    <label for="openSidebarSearch" class="sidebarIconSearch">
    <i class="fas fa-search search_icon"></i>
    </label>
        <div id="sidebarSearch">
            <div class="search-erea">
            <div class="search-title">Enter the name of event</div>
                <input type="text" class="search_text">
            </div>
            <div class="search-erea">
                <div class="search-title">Categorys</div>
                <div class="Category-list">
                <dl class="Category">
                    <dt><img src="../image/martini.png" alt="bar-img"></dt>
                    <dd>bar</dd>
                </dl>
                <dl class="Category">
                    <dt><img src="../image/beer.png" alt="pub-img"></dt>
                    <dd>pub</dd>
                </dl>
                <dl class="Category">
                    <dt><img src="../image/dj.png" alt="club-img"></dt>
                    <dd>club</dd>
                </dl>
                </div>
            </div>
            <div class="search-erea">
                <div class="search-title">Day</div>
                <input type="text" id="date-box" class="Day-box">
            </div>
        </div>
    </div>
</section>

<div class="content">
    <div class="userinfo">
        <div class="profile">
        </div>
        <div class="person">
            @if(empty($user->profile->image))
                <img src="{{asset('people/person5.jpg')}}" >
            @else
            <img src="{{asset('uploads/')}}/{{$user->profile->image}}" class="image-preview__image">
            @endif
            {{-- @if(!empty($user->profile->image))
            <img src="{{asset('uploads/profile')}}/{{$user->profile->image}}" >
            @else
            <img src="{{asset('people/person7.jpg')}}">
            @endif --}}
        </div>
        
        <ul class="information">
        <li>Name :<br>
            
            <p>{{ $user->name }}
            </p>
            
        </li><br>
            <li>Gender :<br>
                @if(!empty($user->profile->gender))
                <p>{{ $user->profile->gender}}
                </p>
                @endif
            </li><br>
            <li>Country :<br>
                @if(!empty($user->profile->country))
                <p>{{ $user->profile->country}}
                </p>
                @endif
            </li><br>
            <li>Birthday :<br>
                @if(!empty($user->profile->bod))
                <p>{{ $user->profile->bod}}
                </p>
                @endif
            </li><br>
            <li>Instagram :<br>
                @if(!empty($user->profile->instagram))
                <p>{{ $user->profile->instagram}}
                </p>
                @endif
            </li><br>
        </ul>
        <div class="description"><span class="user-description">・User Description</span><br>
            @if(!empty($user->profile->description))
            <p>{{ $user->profile->description}}
            </p>
            @endif
            </li>
        </div>
    </div>
</div>
</div>            
</form>
    <div class="footer">
    
    </div>

    <script src="{{ mix('/js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#date", {
            minDate: "today"
        });

        flatpickr("#date-box", {
            minDate: "today"
        });

        var prevScrollpos = window.pageYOffset;
            window.onscroll = function() {
                var currentScrollpos = window.pageYOffset;
                if(prevScrollpos > currentScrollpos){
                    document.getElementById("header").style.top = "0";
                } else {
                    document.getElementById("header").style.top = "-1000px";
                }

                prevScrollpos = currentScrollpos;
            }

    </script>
        
</body>
</html>