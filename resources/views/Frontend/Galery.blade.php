@extends('layouts.Frontend.main-layouts')

@section('Title')
    <h2>Galery</h2>
@endsection

@section('Content')
    <section id="galery" class="portfolio">
        <div class="container" data-aos="fade-up">
            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                @foreach ($galery as $item)
                    <div class="col-lg-4 col-md-6 portfolio-item {{ $item->category[0]->category }}">
                        <div class="portfolio-wrap" style="max-height: 310px">
                            <img src="{{ asset('storage/Image/Galery/' . $item->image) }}" class="img-fluid" alt="">
                            <div class="portfolio-links">
                                <a href="{{ asset('storage/Image/Galery/' . $item->image) }}" data-gallery="portfolioGallery" class="portfolio-lightbox"
                                    title="{{ $item->category[0]->category }}"><i class="bi bi-plus"></i></a>
                                <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                            </div>
                            <div class="portfolio-info">
                                <p>{{ $item->category[0]->category }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
