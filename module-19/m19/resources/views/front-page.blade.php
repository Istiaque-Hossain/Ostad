@extends('layout.main')

@section('main-container')
    <div class="ftco-blocks-cover-1">
        <div class="site-section-cover overlay" style="background-image: url('{{ asset('assets/images/hero_1.jpg') }}')">
            <div class="container">
                <div class="row align-items-center justify-content-center text-center">
                    <div class="col-md-5" data-aos="fade-up">
                        <h1 class="mb-3 text-white">Our Blog</h1>
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta veritatis in tenetur doloremque, maiores doloribus officia iste. Dolores.</p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                @php
                    $i = 0;
                @endphp
                @foreach ($posts as $post)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="post-entry-1 h-100">

                            <h1 class="text-center"><span class="badge text-white bg-secondary">{{ ++$i }}</span>
                            </h1>
                            <div class="post-entry-1-contents">
                                <h2><a href="{{ url('/post/' . $post->id) }}">{{ $post->title }}</a></h2>
                                <span class="meta d-inline-block mb-3">{{ $post->created_at }} <span
                                        class="mx-2">by</span> <a href="#">Admin</a></span>
                                <p>{{ $post->desc }}</p>
                                <a href="{{ url('/post/' . $post->id) }}">Read More . .</a>
                            </div>
                        </div>
                    </div>
                @endforeach






            </div>

            {{-- <div class="col-12 mt-5 text-center">
                <span class="p-3">1</span>
                <a href="#" class="p-3">2</a>
                <a href="#" class="p-3">3</a>
                <a href="#" class="p-3">4</a>
            </div> --}}
        </div>
    </div>
    <!-- END .site-section -->
@endsection
