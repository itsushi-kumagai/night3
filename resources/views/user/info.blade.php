<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="{{ asset('/css/user-info.css') }}">
   
   
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
            <button type="submit" class="search-btn-sp">
                <i class="fas fa-search "></i>
            </button>
        </div> 
        <div class="head">
            <div class="seach-erea">
                    <form action="#" class="search">
                        <input type="text" class="search_text" placeholder="Enter the key words">
                        <select name="select" id="select" class="Genre">
                            <option value="" hidden">genre</option>
                            <option value="1">bar</option>
                            <option value="2">pub</option>
                            <option value="3">club</option>
                        </select>
                        <input type="text" class="search_date" id="date" placeholder="Choose date">
                    <button type="submit" class="test">
                        <i class="fas fa-search "></i>
                    </button>
                        <!---</i>--->      
                    </form>                    
                </div>
                <div class="menu">
                <div class="menu-list">
                    <div class="login">
                        <a href="{{ route('admin.dashboard') }}"><i class="fa fa-home" ></i></a>
                        <a href="{{ route('posts.index') }}">User</a>
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
        <div class="userinfo">
            <div class="profile">
            </div>
            <div class="person">
                <img src="../people/person1.jpg" alt="">
            </div>
            <form>
            <ul class="information">
                <li>Name :<br>
                    <p>{{ $user->name }}</p>
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
                <p> @if(!empty($user->profile->description))
                    <p>{{ $user->profile->description}}
                    </p>
                    @endif</p></li>
            </div>
        </div>
    </div>
    <script type="text/javascript">
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