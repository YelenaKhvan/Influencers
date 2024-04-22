@foreach ($posts as $post)
    <article class="blog_item">
        <div class="blog_item_img">
            <a href="{{ route('posts.show', $post->id) }}">
                <img class="card-img rounded-0" src="{{ asset('storage/posts/' . $post->thumbnail) }}" alt="picture">
            </a>
            <a href="#" class="blog_item_date">
                <h3>{{ $post->created_at->format('d') }}</h3>
                <p>{{ $post->created_at->format('M') }}</p>
            </a>
        </div>

        <div class="blog_details">
            <a class="d-inline-block" href="{{ route('posts.show', $post->id) }}">
                <h2>{{ $post->title }}</h2>
            </a>
            <p>{{ $post->description }}</p>
            <ul class="blog-info-link">
                @foreach ($post->comments as $comment)
                    <li>
                        <a href="{{ route('posts.show', $post->id) }}">
                            <i class="fa fa-user"></i>
                            {{ $comment->user_id }}
                        </a>
                    </li>
                @endforeach
                <li><a href="#"><i class="fa fa-comments"></i> {{ $post->comments->count() }} Comments</a></li>
            </ul>
        </div>
    </article>
@endforeach
{{ $posts->links('pagination::bootstrap-5') }}
