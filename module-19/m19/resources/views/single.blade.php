@extends('layout.main')

@section('main-container')
    <div class="ftco-blocks-cover-1">
        <div class="site-section-cover overlay" data-stellar-background-ratio="0.5"
            style="background-image: url('images/hero_1.jpg')">
            <div class="container">
                <div class="row align-items-center justify-content-center text-center">
                    <div class="col-md-7">
                        <span class="d-block mb-3 text-white" data-aos="fade-up">{{ $post->created_at }} <span
                                class="mx-2 text-primary">&bullet;</span> by Admin</span>
                        <h1 class="mb-4" data-aos="fade-up" data-aos-delay="100">{{ $post->title }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 blog-content">
                    <p class="lead">{{ $post->desc }}</p>

                    <div class="pt-5">
                        <h3 class="mb-5">Comments</h3>

                        <ul class="comment-list">
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($post->post_comments as $comments)
                                <li class="comment">
                                    <div class="vcard bio">
                                        {{-- <img src="images/person_2.jpg" alt="Image" /> --}}
                                        {{ ++$i }}
                                    </div>
                                    <div class="comment-body">
                                        <h3>{{ $comments->name }}</h3>
                                        <h6>{{ $comments->email }}</h6>
                                        {{-- <div class="meta">{{ $post->created_at }}</div> --}}
                                        <p>{{ $comments->cmnt }}</p>
                                        {{-- <p><a href="#" class="reply">Reply</a></p> --}}
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                        <!-- END comment-list -->

                        <div class="comment-form-wrap pt-5">
                            <h3 class="mb-5">Leave a comment</h3>
                            <form action="#" class="">
                                <div class="form-group">
                                    <label for="name">Name *</label>
                                    <input type="text" class="form-control" id="name" />
                                </div>
                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input type="email" class="form-control" id="email" />
                                </div>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Post Comment" class="btn btn-primary btn-md text-white" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
