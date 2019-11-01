<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/user-dashboard.css') }}">
   
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
                                <form action="#" class="search">
                                    <input type="description" class="search_text" placeholder="Enter the key words">
                                    <select name="gender" id="select" class="Genre">
                                        <option value="" hidden">gender</option>
                                        <option value="1">male</option>
                                        <option value="2">female</option>
                                        <option value="3">any</option>
                                    </select>
                                    <select name="country" id="select" class="Genre">
                                        <option value="" hidden">country</option>
                                        <option value="1">England</option>
                                        <option value="2">United States</option>
                                        <option value="3">Canada</option>
                                    </select>
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
                    <div class="content">
                    @if($users->count() > 0)
                    <table class="table">
                        <thead>
                            <th>id</th>
                            <th></th>
                            <th>Name</th>   
                            <th>E-mail</th>
                            <th>Gender</th>   
                            <th>Country</th>   
                            <th>Bod</th>     
                            <th>Instagram</th>     
                            <th></th> 
                            <th></th>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>    
                                <img class="image" src="{{asset('image/image3.jpg')}}" alt="">
                            </td>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>    
                                {{ $user->email }}
                            </td>
                            <td>    
                                @if(!empty($user->profile->gender))
                                {{ $user->profile->gender }}
                                @endif
                            </td>
                            <td>    
                                @if(!empty($user->profile->country))
                                {{ $user->profile->country }}
                                @endif
                            </td>
                            <td>    
                                @if(!empty($user->profile->bod))
                                {{ $user->profile->bod }}
                                @endif
                            </td>
                            <td>
                                @if(!empty($user->profile->instagram))
                                {{ $user->profile->instagram }}
                                @endif
                            </td>
                            <td>
                            @if($user->trashed())
                                <form action="{{ route('restore-users', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                <button class="restore-btn" type="submit">Restore</button>
                                    </form>
                                <br>
                            @else
                                <button btn="" class="edit-btn">
                                    <a href="{{ route('user.show', $user->id) }}">Profile</a>
                                </button>
                            @endif
                            </td>
                            <td>
                    <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                            <button type="submit" class="delete-btn" >
                                {{ $user->trashed() ? 'Delete' : 'Ban' }}
                            </button>
                    </form>        
                            </td>    
                        </tr>
                        @endforeach
                        </tbody>
                    </table>    
                    @else
                    <h3>No user yet.</h3>
                    @endif
                    </div>
                </div>
            </div> 
        </div>
        <button class="trashed-btn"><a href="{{ route('banned-users.index') }}">Banned</a></button>
        <div class="page">
            {{$users->appends(Illuminate\Support\Facades\Input::except('page'))->links()}}
        </div>
        
        
        <div class="footer">
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

