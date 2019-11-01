<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/main-posts-create.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />

    
    <title>Event Post</title>
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
                <div class="userinfo">
                    
                    <form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                     @if(isset($post))
                        @method('PUT')
                     @endif

                    <div class="image-preview" id="imagePreview">
                        @if(isset($post))
                        <img src="{{ asset('storage/'.$post->image) }}" id="image-preview__image">
                        @else
                        <img src="../../image/image3.jpg" id="preview">
                        @endif
                    </div>


                    <div class="preview">
                        <input type="file" id="file" accept="image/*" name="image">
                    <label for="file">
                        Change Image
                    </label>
                    </div>

                    <ul class="information">
                        <li>Category :<br>
                            <select name="category" id="category" class="category">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    @if(isset($post))
                                        @if($category->id === $post->category_id)
                                            selected
                                        @endif
                                    @endif
                                    >
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                        </li><br>
                       
                        <li>Event Title :<br>
                            <input name="title" type="text" class="name" id="title" required 
                            value="{{ isset($post) ? $post->title: '' }}">
                        </li><br>
                        <li>Place :<br>
                            <input name="place" type="text" class="place" id="olace" required 
                            value="{{ isset($post) ? $post->place: '' }}">
                        </li><br> 
                        <li>Map :<br>
                            <input  name="map" type="text" class="map" id="map" required 
                            value="{{ isset($post) ? $post->map: '' }}">
                        </li><br> 
                        <li>Event Date :<br>
                            <input  name="date" type="text" class="date" id="date" required 
                            value="{{ isset($post) ? $post->date: '' }}">
                        </li><br> 
                        <li>Organizer :<br>
                            <input name="organizer" type="text" class="name" id="organizer" required 
                            value="{{ isset($post) ? $post->organizer: '' }}">
                        </li><br>
                        <li>Organizer Link :<br>
                            <input name="organizer_link" type="text" class="name" id="organizer_link" required 
                            value="{{ isset($post) ? $post->organizer_link: '' }}">
                        </li><br>
                        <li>Published Date :<br>
                            <input name="published_at" type="text" class="place" id="published_at" required  
                            value="{{ isset($post) ? $post->published_at: '' }}">
                        </li><br> 
                        @if($tags->count()>0)
                        <li>Tags :<br><br>
                            
                            <select name="tags[]" id="tags" class="tags tags-selector" multiple>
                                
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}"
                                            @if(isset($post))
                                                @if($post->hasTag($tag->id))
                                                selected
                                                @endif
                                            @endif
                                            >
                                            {{ $tag->name }}
                                        </option>
                                    @endforeach
                                
                            </select>
                            
                        </li><br> 
                        @endif
                        ・Event Details<br><textarea name="description" id="" cols="60" rows="10" id="description" required>{{ isset($post) ? $post->description: '' }}</textarea></li>
                        
                    </ul>
                    
                </div>
                <div class="save">
                        <input type="submit" value='Post'>
                    </div>
                </form>
            </div>
        </div>
       
        <div class="footer">
        
        </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <script src="{{ asset('/js/select2.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="{{ asset('/js/flatpickr.js') }}"></script>
    <script src="{{ asset('/js/previewImg.js') }}"></script>
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






