<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/main-result.css') }}">
    <title>Result Page</title>
</head>
<body>
    <div class="container">
            <section id="header-container">
                    <div id="header">
                    <div class="header-sp">               
                        <label for="chk" class="show-menu-btn">
                            <i class="fas fa-bars" style="color: white;"></i>
                        </label>
                        <button type="submit" class="search-btn-sp">
                            <i class="fas fa-search "></i>
                        </button>
                    </div> 
                    <div class="head">
                        <div class="seach-erea">
                                <form action="{{ route('admin-posts.result') }}" class="search" method="GET">
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
                                    <a href="{{ route('admin.dashboard') }}"><i class="fa fa-home" ></i></a>
                                    <a href="{{ route('user.index') }}">User</a>
                                    <a href="{{ route('posts.index') }}">Post</a>
                                    <a href="{{ route('categories.index') }}">Category</a>
                                    <a href="{{ route('tags.index') }}">Tags</a>
                                    <a href="{{ route('trashed-posts.index') }}">Bin</a>
                                    <a href="{{ route('admin.logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        Change Account
                                    </a>
                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                    </div>
                                </div>
                            </div> 
                            <label for="chk" class="hide-menu-btn">
                                    <i class="fas fa-times" style="color: white;"></i>
                                </label>
                            <input type="checkbox" id="chk">
                        </div>
                    </div>
                </section>
            @foreach($posts as $post)
            <div class="results">
                <div class="contents">
                        
                    <div class="card">
                        <a href="{{ route('posts.edit', $post->id) }}"><img src="{{ asset('storage/'.$post->image) }}" alt="" width="300px"></a>
                    </div>
                    
                    <div class="title">
                        <h2><a href="{{ route('posts.edit', $post->id) }}">{{ str_limit($post->title,25) }}</a></h2>
                        <p class="description">{{ str_limit($post->description,35) }} <a href="{{ route('posts.edit', $post->id) }}">...seemore</a>
                        </p>
                        <div class="place">
                            <i class="fas fa-map-marked" style="color: white;"></i>
                            <a href="{{ $post->map  }}" target="_blank">{{ str_limit($post->place,35)  }}</a>
                        </div>
                            <div class="date">
                                {{ $post->date }}
                            </div> 
                            
                        <div class="fav">
                            <div class="genre">
                            Category<p>{{ $post->category->name }}</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
            
            @endforeach
            
        </div>
           
        {{ $posts->appends($_GET)->links() }}
           
            
        </div>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script type="text/javascript">
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