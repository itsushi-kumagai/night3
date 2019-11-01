<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('/css/main-result.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <title>Result Page</title>
</head>
<body>
    <div class="container" id="app">
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
                                
                            <div class="menu">
                                <div class="menu-list">
                                    <div class="login">
                                        <a href="#">Events</a>
                                        <a href="#">log out</a>
                                        <a href="#">
                                            @if(empty(Auth::user()->profile->image))
                                            <img src="{{asset('image/image1.jpg')}}" class="image-preview__image">
                                            @else
                                            <img src="{{asset('uploads/')}}/{{Auth::user()->profile->image}}" class="image-preview__image">
                                            @endif
                                        </a>
                                    </div>
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
                                <div class="search-title">Categories</div>
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
            @foreach($posts as $post)
            <div class="results">
                <div class="contents">
                    <div class="card">
                        <img src="{{ asset('storage/'.$post->image) }}" alt="" width="300px">
                    </div>
                    <div class="title">
                        <h2>{{ str_limit($post->title, 18) }}</h2>
                        <p class="description">{{ str_limit($post->description, 35) }} <br>...seemore
                        </p>
                            <div class="date">
                                {{ $post->date }}
                            </div> 
                        <div class="fav">
                            <div class="genre">
                            Category<p>{{ $post->category->name }}</p>
                            </div>
                                @if(Auth::check())
                                    <favouriteinfo-component :postid={{$post->id}} :favourited={{$post->checkSaved()?'true':'false'}}></favouriteinfo-component>
                                @else
                                <button class="fav-icon"><a href="{{ route('prompt.show') }}"><i class="fas fa-heart fa-2x" style="color: white;"></i></a></button>
                                @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
           
            
        </div>
            {{$posts->appends(Illuminate\Support\Facades\Input::except('page'))->links()}}
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