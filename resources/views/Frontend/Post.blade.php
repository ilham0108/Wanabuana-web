@extends('layouts.Frontend.main-layouts')

@section('Title')
    <h2>Post</h2>
@endsection

@section('Content')
    <section id="post" class="services">
        <div class="container" data-aos="fade-up">
            <div class="row">
                @foreach ($post as $item)
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="card icon-box p-0" style="width: 20rem;">
                            @if ($item->image == null)
                                <img src="{{ asset('storage/Image/Post/not_avaible.png') }}" width="100%" class="card-img-top" style="height: 15rem" alt="...">
                            @else
                                <img src="{{ asset('storage/Image/Post/' . $item->image) }}" width="100%" class="card-img-top" style="height: 15rem" alt="...">
                            @endif
                            <div class="card-body" style="text-align: left">
                                @foreach ($item->tags as $tag)
                                    {{-- <span class="badge text-bg-primary">Primary</span> --}}
                                    <span class="badge text-bg-primary">{{ $tag->tag }}</span>
                                @endforeach
                                <h5 class="card-title mt-3"><strong><a href="/post/{{ $item->slug }}" class="text-dark">{{ $item->title }}</a></strong></h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section><!-- End Services Section -->
@endsection
