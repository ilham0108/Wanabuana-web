@extends('layouts.Frontend.main-layouts')

@section('Title')
    <h2>About Wanabuana</h2>
@endsection

@section('Content')
    <section id="post" class="services p-0">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-lg-8">
                    {!! $about->about !!}
                </div>
            </div>
        </div>
    </section>
@endsection
