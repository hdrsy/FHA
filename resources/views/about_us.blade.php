@extends('layouts.index.layout')
<style>
    .swiper-wrapper img{
        width: 100%;  /* Make the image take the full width of its container */
        height: 100%; /* Make the image take the full height of its container */
        object-fit: contain; /* Scale the image to preserve its aspect ratio while fitting within the element's content box */
    }
</style>
@section('css')
@endsection
@section('title')
{{ __('messages.Beauty') }}
@stop
@section('content')

@php
    use App\Models\AboutUs;
    use App\Models\Product;
    use App\Models\Category;
    use App\Models\User;

    $about_us = AboutUs::take(1)->get();
    $products_count = Product::count();
    $categories_count = Category::count();
    $customers_count = User::count();
@endphp
    <main class="main-content">
        <!--== Start Page Header Area Wrapper ==-->
        <section class="page-header-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-7 col-lg-7 col-xl-5">
                        <div class="page-header-content">
                            <div class="title-img"><img src="assets/images/photos/about-title.webp" alt="Image"></div>
                            <h2 class="page-header-title">{{ __('messages.page_header_title') }}</h2>
                            <h4 class="page-header-sub-title">{{ __('messages.page_header_subtitle') }}</h4>
                            <p class="page-header-desc">{{ __('messages.page_header_description') }}</p>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-5 col-xl-7">
                        <div class="page-header-thumb">
                            <img src="{{ URL::asset('storage/' . $about_us[0]->image) }}" width="570" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Page Header Area Wrapper ==-->

        <!--== Start Funfact Area Wrapper ==-->
        <section class="funfact-area section-space">
            <div class="container">
                <div class="row mb-n6">
                    <div class="col-sm-6 col-lg-4 mb-6">
                        <!--== Start Funfact Item ==-->
                        <div class="funfact-item">
                            <div class="icon">
                                <img src="assets/images/icons/funfact1.webp" width="110" height="110" alt="Icon">
                            </div>
                            <h2 class="funfact-number">+ 5000</h2>
                            <h6 class="funfact-title">{{ __('messages.clients') }}</h6>
                        </div>
                        <!--== End Funfact Item ==-->
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-6">
                        <!--== Start Funfact Item ==-->
                        <div class="funfact-item">
                            <div class="icon">
                                <img src="assets/images/icons/funfact2.webp" width="110" height="110" alt="Icon">
                            </div>
                            <h2 class="funfact-number">{{$products_count}}</h2>
                            <h6 class="funfact-title">{{ __('messages.products') }}</h6>
                        </div>
                        <!--== End Funfact Item ==-->
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-6">
                        <!--== Start Funfact Item ==-->
                        <div class="funfact-item">
                            <div class="icon">
                                <img src="assets/images/icons/funfact3.webp" width="110" height="110" alt="Icon">
                            </div>
                            <h2 class="funfact-number">{{$categories_count}}</h2>
                            <h6 class="funfact-title">{{ __('messages.cosmetic_lines') }}</h6>
                        </div>
                        <!--== End Funfact Item ==-->
                    </div>
                </div>
            </div>
        </section>
        <!--== End Funfact Area Wrapper ==-->

        <!--== Start About Area Wrapper ==-->
        <section class="section-space pt-0 mb-n1">
            <div class="container">
                <div class="about-thumb">
                    <img src="{{ URL::asset('assets/images/image 5.jpg') }}" alt="Image">
                </div>
                <div class="about-content">
                    <h2 class="title">{{ __('messages.about') }}</h2>
                    <p class="desc">{{ __('messages.about_desc') }} </p>
                </div>
            </div>
        </section>
        <!--== End About Area Wrapper ==-->

        <!--== Start Feature Area Wrapper ==-->
        <div class="feature-area section-space">
            <div class="container">
                <div class="row mb-n9">
                    <div class="col-md-6 col-lg-4 mb-8">
                        <!--== Start Feature Item ==-->
                        <div class="feature-item">
                            <h5 class="title"><img class="icon" src="assets/images/icons/feature1.webp" width="60" height="60" alt="Icon"> {{ __('messages.support_team') }}</h5>
                            <p class="desc">{{ __('messages.feature_desc1') }}</p>
                        </div>
                        <!--== End Feature Item ==-->
                    </div>
                    <div class="col-md-6 col-lg-4 mb-8">
                        <!--== Start Feature Item ==-->
                        <div class="feature-item">
                            <h5 class="title"><img class="icon" src="assets/images/icons/feature2.webp" width="60" height="60" alt="Icon"> {{ __('messages.certification') }}</h5>
                            <p class="desc">{{ __('messages.feature_desc2') }}</p>
                        </div>
                        <!--== End Feature Item ==-->
                    </div>
                    <div class="col-md-6 col-lg-4 mb-8">
                        <!--== Start Feature Item ==-->
                        <div class="feature-item">
                            <h5 class="title"><img class="icon" src="assets/images/icons/feature3.webp" width="60" height="60" alt="Icon">{{ __('messages.natural_products') }} </h5>
                            <p class="desc">{{ __('messages.feature_desc3') }}</p>
                        </div>
                        <!--== End Feature Item ==-->
                    </div>
                </div>
            </div>
        </div>
        <!--== End Feature Area Wrapper ==-->

    </main>

@endsection
