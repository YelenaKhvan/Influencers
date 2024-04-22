@extends('layouts.layout')

@section('title', 'Home')
@section('content')

    <!-- bradcam_area_start  -->
    <div class="bradcam_area breadcam_bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Single Blog</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end  -->

    <!--================Blog Area =================-->
    <section class="blog_area single-post-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    @include('posts.partials.single_post')
                    @include('comments.comment_form')

                </div>
            </div>
        </div>
    </section>
    <!--================ Blog Area end =================-->


@endsection
