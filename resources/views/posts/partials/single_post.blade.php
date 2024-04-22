<div class="col-lg-8 posts-list">
    <div class="single-post">
        <div class="feature-img">
            <img class="img-fluid" src="{{ asset('storage/posts/' . $post->thumbnail) }}" alt="">
        </div>
        <div class="blog_details">
            <h2>{{ $post->title }}</h2>
            <ul class="blog-info-link mt-3 mb-4">
                <li><a href="#"><i class="fa fa-comments"></i> {{ $post->comments->count() }} Comments</a></li>
            </ul>
            <p class="excert">
                {{ $post->description }}
            </p>
        </div>

    </div>
    <!-- Информация об авторе -->
    <div class="blog-author">
        <div class="media align-items-center">
            <img src="img/blog/author.png" alt="Author Avatar">
            <div class="media-body">

                <div class="comments-area">
                    <h4>{{ $post->comments->count() }} </h4>
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="img/comment/comment_1.png" alt="">
                                </div>
                                <div class="desc">
                                    <p class="comment">
                                        @foreach ($post->comments as $comment)
                                            <li>
                                                <!-- Вывод текста комментария -->
                                                {{ $comment->content }}

                                            </li>
                                        @endforeach
                                    </p>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            @foreach ($post->comments as $comment)
                                                <h5>
                                                    {{ $post->user_id }}
                                                </h5>
                                                <p class="date">{{ $post->created_at->format('d, M') }}<< /p>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
