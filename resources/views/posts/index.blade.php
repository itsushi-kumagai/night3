<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="{{ asset('/css/main-posts.css') }}">
    <title>Event Confirmation</title>
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
    <div class="content">
        <div class="userinfo">
            <div class="content"> 
                @if($posts->count() > 0)
                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Organizer</th>
                            <th>Title</th>
                            <th>Location</th>   
                            <th>Date</th>       
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr></tr>
                            <td>{{ $post->id }}</td>
                            <td>
                                <a href="{{ route('categories.edit', $post->category->id) }}" 
                                    style="text-decoration: none; color: white;">
                                    {{ $post->category->name }}
                                </a>
                            </td>
                            <td>{{ $post->organizer }}</td>  
                            <td>{{ str_limit($post->title,20) }}</td>    
                            <td>{{ str_limit($post->place,30) }}</td>    
                            <td>{{ $post->date }}</td> 
                            
                        <td>
                            @if($post->trashed())
                                    <form action="{{ route('restore-posts', $post->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="restore-btn" type="submit">Restore</button>
                                    </form>
                                <br>
                            @else
                                <button btn="" class="edit-btn">
                                    <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
                                </button>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn" >
                                    {{ $post->trashed() ? 'Delete' : 'Trash' }}
                                </button><br>
                            </form>
                            
                        </td>    
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                <h3 style="margin: 15rem; color: white;">No Posts Yet</h3>
                @endif
                
                </div>   
        </div>
    </div>    
            
    </div>
    
    <a href="{{ route('posts.create') }}"><button btn="" class="add-btn">Add</button></a>
    <div class="paginate" style="margin-left: 25rem;">

    {{$posts->appends(Illuminate\Support\Facades\Input::except('page'))->links()}}
    
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
