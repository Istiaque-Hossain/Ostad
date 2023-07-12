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

                        <ul class="comment-list" id="comment-list">
                            {{-- @php
                                $i = 0;
                            @endphp --}}
                            @foreach ($post->post_comments as $comments)
                                <li class="comment">
                                    <div class="vcard bio">
                                        {{-- <img src="images/person_2.jpg" alt="Image" /> --}}
                                        <span style="font-size: .7rem; font-weight: 600;">
                                            {{ $comments->created_at }}</span>

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
                            <form action="{{ route('comment.store', ['id' => $post->id]) }}" method="POST" class=""
                                id="comment-form">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name *</label>
                                    <input name="name" type="text" class="form-control" id="name" />
                                </div>
                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input name="email" type="email" class="form-control" id="email" />
                                </div>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="cmnt" id="message" cols="30" rows="10" class="form-control"></textarea>
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
    {{-- <script>
        // const axios = require("axios");
        // import axios from "axios";

        document.addEventListener("DOMContentLoaded", function() {

            const commentForm = document.getElementById("comment-form");
            const commentsList = document.getElementById("comment-list");

            commentForm.addEventListener("submit", function(event) {
                event.preventDefault();
                // console.log('hiiiiiiiiiiiiiiiiii');

                const formData = new FormData(commentForm);
                const commentName = formData.get("name");
                const commentEmail = formData.get("email");
                const commentCmnt = formData.get("cmnt");
                const blogId = commentForm.getAttribute("action").split("/")[4];

                console.log(blogId);
                axios
                    .post('{{ route('comment.store', ['id' => $post->id]) }}', {
                        name: commentName,
                        email: commentEmail,
                        cmnt: commentCmnt,
                    })
                    .then((response) => {
                        const comment = response.data;
                        const newCommentElement = document.createElement("li");

                        const newCommentDiv = document.createElement("div");
                        newCommentDiv.classList.add("comment-body");

                        const h3Element = document.createElement("h3");
                        h3Element.textContent = comment.name;
                        newCommentDiv.appendChild(h3Element);

                        const h6Element = document.createElement("h6");
                        h6Element.textContent = comment.email;
                        newCommentDiv.appendChild(h6Element);

                        const pElement = document.createElement("p");
                        pElement.textContent = comment.cmnt;
                        newCommentDiv.appendChild(pElement);

                        newCommentElement.appendChild(newCommentDiv);

                        commentsList.appendChild(newCommentElement);
                        commentForm.reset();
                    })
                    .catch((error) => {
                        console.error(error);
                    });
            });
        });
    </script> --}}
@endsection
