<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/main-profiles.css') }}">
    <title>Event Confirmation</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2 class="logo">Dark Code</h2>
                <input type="checkbox" id="chk">
                <label for="chk" class="show-menu-btn">
                    <i class="fas fa-bars" style="color: white;"></i>
                </label>
            <ul class="menu">
                <div class="menu-list">
                    <a href="{{ route('admin.dashboard') }}"><i class="fa fa-home" ></i></a>
                    <a href="{{ route('profiles.index') }}">Post</a>
                    <a href="{{ route('categories.index') }}">Category</a>
                    <a href="{{ route('tags.index') }}">Tags</a>
                    <a href="{{ route('trashed-profiles.index') }}">Bin</a>
                    <label for="chk" class="hide-menu-btn">
                        <i class="fas fa-times" style="color: white;"></i>
                    </label>
                </div>
            </ul>
        </div>
            <div class="content">
                <div class="userinfo">
                    <div class="content"> 
                        @if($users->count() > 0)
                            <table class="table">
                                <thead>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Country</th>
                                    <th>Age</th>   
                                    <th>Description</th>   
                                </thead>
                                <tbody>
                                    @foreach($user as $users)
                                    <tr></tr>
                                    <td><img src="{{asset('uploads/')}}/{{$user->profile->image}}" ></td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->profile->gender }}</td>  
                                    <td>{{ $user->profile->country }}</td>    
                                    <td>{{ $user->profile->bod }}</td>    
                                    <td>{{ $user->profile->description }}</td> 
                                   
                                <td>
                                    @if($profile->trashed())
                                            <form action="{{ route('restore-profiles', $user->profile->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button class="restore-btn" type="submit">Restore</button>
                                            </form>
                                        <br>
                                    @else
                                        <button btn="" class="edit-btn">
                                            <a href="{{ route('profiles.edit', $user->profile->id) }}">Edit</a>
                                        </button>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('profiles.destroy', $user->profile->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-btn" >
                                            {{ $user->profile->trashed() ? 'Delete' : 'Trash' }}
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
        
        <a href="{{ route('profiles.create') }}"><button btn="" class="add-btn">Add</button></a>
        {{$profiles->links()}}
</body>
</html>
