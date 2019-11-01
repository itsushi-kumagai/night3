<div class="container">
<section id="header-container">
        <div id="header" >
        <a href="#"><h1 class="logo">Dark Code</h1></a>
            <input type="checkbox" id="chk">
            <label for="chk" class="show-menu-btn">
                <i class="fas fa-bars" style="color: white;"></i>
            </label>        
            <ul class="menu">
            <div class="menu-list">
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
        </ul> 
    </div>
</section>


   
<div class="header2">
<input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
<label for="openSidebarMenu" class="sidebarIconToggle">
  <div class="spinner diagonal part-1"></div>
  <div class="spinner horizontal"></div>
  <div class="spinner diagonal part-2"></div>
</label>
<div id="sidebarMenu">
    <ul class="sidebarMenuInner">
        <li><a href="{{ route('home.show') }}">Home</a></li>
        @if(Auth::check())
        <li><a href="{{ route('logout') }}"
            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                Logout</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @else
        <li><a href="/login">Login</a></li>
        @endif
        <li><a href="{{ route('posts.result') }}">Events</a></li>
        {{-- <li><a href="#">Log in</a></li>
        <li><a href="#">Log out</a></li> --}}
        @if(Auth::check())
            <li><a href="/user/profile">Profile</a></li> 
        @else
            <li><a href="/register" >Register</a></li>
        @endif
    </ul>
</div>




<input type="checkbox" class="openSidebarSearch" id="openSidebarSearch">
<label for="openSidebarSearch" class="sidebarIconSearch">
<i class="fas fa-search search_icon"></i>
</label>

    <div id="sidebarSearch">
        <form action="{{ route('posts.result') }}"  method="GET">
            <div class="search-erea">
            <div class="search-title">Enter the name of event</div>
                <input type="text" class="search_text" name="description">
            </div>
            <div class="search-erea">
                <div class="search-title">Categories</div>
                <div class="Category-list">
                    <select name="category_id" id="select" class="Genre">
                        <option value="" hidden>Category</option>
                        @foreach(App\Category::all() as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="search-erea">
                <div class="search-title">Day</div>
                <input type="text" id="date" class="Day-box" name="date" >
            </div>
            <button type="submit" class="test">
                <i class="fas fa-search "></i>
            </button>
        </div>
    </form>

        <div class="seach-erea">
            <form action="{{ route('posts.result') }}" class="search" method="GET">
                <input type="text" name="description" class="search_text" placeholder="Enter the key words">
                <select name="category_id" id="select" class="Genre">
                    <option value="" hidden>Category</option>
                    @foreach(App\Category::all() as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                <input type="text" name="date" class="search_date" id="date" placeholder="Choose date">
                <button type="submit" class="test">
                    <i class="fas fa-search "></i>
                </button>
            </form>
        </div>
    </div>
  </div>

<div class="background-img">  
<div class="main_search">
    <div class="seach-erea">
        <form action="{{ route('posts.result') }}" class="search" method="GET">
            <input type="text" name="description" class="search_text" placeholder="Enter the key words">
            <select name="category_id" id="select" class="Genre">
                <option value="" hidden>Category</option>
                @foreach(App\Category::all() as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            <input type="text" name="date" class="search_date" id="date-box" placeholder="Choose date">
            <button type="submit" class="test">
                <i class="fas fa-search search_icon"></i>
            </button>
        </form>
    </div>
</div>
</div>

