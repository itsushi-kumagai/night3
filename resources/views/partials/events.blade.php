<section  id="app">
        <h2>Fetured events</h2>
        
        <div class="swiper-container">
                
        <div class="swiper-wrapper">
                @foreach($posts as $post)
                <div class="swiper-slide">
                        <div class="image">
                            <a href="{{ route('posts.show', $post->id) }}">
                                <img src="{{ asset('storage/'.$post->image) }}" alt="" width="100%" height="auto">
                            </a>
                        </div>
                        <div class="card-information">
                                <div class="event-name">
                                    <div class="title">
                                        <a href="{{ route('posts.show', $post->id) }}">
                                            {{ str_limit($post->title, 20) }}
                                        </a>
                                    </div>
                                    <div class="event-button">
                                        @if(Auth::check())
                                            <favouritecard-component :postid={{$post->id}} :favourited={{$post->checkSaved()?'true':'false'}}></favouritecard-component>
                                        @else
                                            <button class="heart-button"><a href="{{ route('prompt.show') }}"><i class="fas fa-heart fa-2x" style="color: white;"></i></a></button>
                                        @endif
                                    </div>
                                </div>
                            <div class="event-date">
                                {{ $post->date }}
                            </div>
                            <div class="card-info">
                                <p>{{ str_limit($post->description, 25) }}
                                    <a href="{{ route('posts.show', $post->id) }}" style="color: white">see more</a>
                                </p>
                            </div>
                        </div>    
                    </div>
             @endforeach
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <div class="showmore">
            <a href="{{ route('posts.result') }}">show more</a>
        </div>
    </div>
   
    </section>