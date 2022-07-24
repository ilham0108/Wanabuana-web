@extends('layouts.Frontend.main-layouts')

@section('Title')
    Post
@endsection

@section('Content')
    <section id="post" class="services p-0">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-8">
                    <div class="card shadow p-3 mb-5 bg-body rounded" style="border-color: white">
                        <div class="card-header" style="vertical-align: middle; background-color:white">
                            <h4 style="font-weight: bold"><strong>{{ $post->title }}</strong></h4>
                            <span class="mt-2"><i class="fas fa-globe"></i> Posted on {{ date('d F Y', strtotime($post->created_at)) }}</span>
                            <span class="mt-2" style="margin-left: 30px"><i class="fa-solid fa-book-open"></i> {{ rand(0, 99) }} min read</span>
                        </div>
                        <div class="card-body">
                            <img src="{{ asset('storage/Image/Post/' . $post->image) }}" width="100%" class="card-img-top" style="height: 25rem" alt="...">
                            <div class="mt-4  article-content">
                                {!! $post->body !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card shadow p-3 mb-5 bg-body rounded" style="border-color: white">
                        <div class="card-header" style="vertical-align: middle; background-color:white">
                            <h5><i class="fa-solid fa-bars-staggered"></i> Categories</h5>
                        </div>
                        <div class="card-body">
                            @foreach ($category as $item)
                                <ul>
                                    <li>{{ $item->name }}</li>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                    <div class="card shadow p-3 mb-5 bg-body rounded" style="border-color: white">
                        <div class="card-header" style="vertical-align: middle; background-color:white">
                            <h5><i class="fa-solid fa-bars-staggered"></i> Recent Post</h5>
                        </div>
                        <div class="card-body">
                            @foreach ($recent_post as $item)
                                <ul>
                                    <li>
                                        <a href="/post/{{ $item->slug }}">{{ $item->title }}</a> <br>
                                        <span class="mt-2" style="font-size: 9pt">
                                            {{ date('d F Y', strtotime($post->created_at)) }}
                                        </span>
                                    </li>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Services Section -->
@endsection
