<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="{{ asset('/css/main-posts-create.css') }}">
    <title>Event Edit</title>
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
            <div class="content">
                <form action="{{ isset($tag) ? route('tags.update', $tag->id) : route('tags.store') }}" method="POST">
                            @csrf
                            @if(isset($tag))
                                @method('PUT')
                            @endif
                <div class="userinfo">
                    <ul class="information">
                        <li>Tag name :<br><input type="text" class="name" name="name" value="{{ isset($tag) ? $tag->name : '' }}" required></li><br>
                    </ul>
                    <div class="save">
                        <input type="submit" value="save">
                    </div>
                </div>
            </div>
        </div>
        </form>
        <div class="footer">
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