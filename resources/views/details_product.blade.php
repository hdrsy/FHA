@extends('layouts.index.layout')
@section('css')

@endsection
@section('title')
{{ __('messages.Beauty') }}
@stop
@section('content')
<main class="main-content">

    <!--== Start Page Header Area Wrapper ==-->
    <section class="page-header-area pt-10 pb-9" data-bg-color="#FFF3DA">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="page-header-st3-content text-center text-md-start">
                        <ol class="breadcrumb justify-content-start">
                            <li class="breadcrumb-item">
                                <a href="{{route('main')}}">{{ __('messages.home') }}</a>

                            </li>
                            <li class="breadcrumb-item active" aria-current="page"> {{ __('messages.Product_Detail') }}</li>
                        </ol>
                        <h2 class="page-header-title" style="display: flex; justify-content: flex-start;">{{ __('messages.Product_Detail') }}</h2>
                    </div>
                </div>
                <div class="col-md-7">
                    <h5 class="showing-pagination-results mt-5 mt-md-9 text-center text-md-end">{{ __('messages.Showing_Single_Product') }}</h5>
                </div>
            </div>
        </div>
    </section>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start Product Details Area Wrapper ==-->
    <section class="section-space">
        <div class="container">
            <div class="row product-details">
                <div class="col-lg-4">
                    <div class="product-details-thumb">
                        <img src="{{ URL::asset('storage/'.$product->image) }}" width="570" style="height: 450px" alt="Image">
                        {{-- <span class="flag-new">{{ __('messages.new') }}</span> --}}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-details-content bottom-price">
                        <h5 class="product-details-collection">
                            {{ app()->getLocale() == 'ar' ? __('messages.collection') . ' ' . $product->category->ar_details : $product->category->details . ' ' . __('messages.collection') }}
                        </h5>
                        <h3 class="product-details-title">{{ app()->getLocale() == 'ar' ? $product->ar_name : $product->name }}</h3>

                        <div class="product-details-qty-list">
                            <h3 class="product-details-desc" style="font-size: medium;">
                                {{ app()->getLocale() == 'ar' ? $product->ar_desc : $product->desc }}
                            </h3>
                        </div>
                        <div class="product-details-action">
                            <h4 class="price">{{$product->price}}  {{__('messages.sp')}}</h4>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--== End Product Details Area Wrapper ==-->

    <!--== Start Product Area Wrapper ==-->
    <section class="section-space">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="title">  {{__('messages.Related_Products')}}</h2>
                    </div>
                </div>
            </div>
            <div class="row mb-n10">
                <div class="col-12">
                    <div class="swiper related-product-slide-container">
                        <div class="swiper-wrapper">
                            @foreach ($relatedProducts as $product)
                            <div class="swiper-slide mb-10">
                                <!--== Start Product Item ==-->
                                <div class="product-item product-st2-item">
                                    <div class="product-thumb">
                                        <a class="d-block" href="{{route('details_product',$product->id)}}">
                                            <img src="{{ URL::asset('storage/'.$product->image) }}" width="370" style="height: 450px" alt="Image-HasTech">
                                        </a>
                                        {{-- <span class="flag-new">{{__('messages.new')}}</span> --}}
                                    </div>
                                    <div class="product-info">
                                        <div class="product-details-review mb-5 justify-content-start">
                                            <button type="button"
                                                class="product-review-show justify-content-start" style="text-align: start !important">{{ app()->getLocale() == 'ar' ? mb_substr($product->ar_desc, 0, 45) . '...' : mb_substr($product->desc, 0, 45) . '...' }}</button>
                                        </div>
                                        <h4 class="title"><a href="{{route('details_product',$product->id)}}">{{ app()->getLocale() == 'ar' ? $product->ar_name : $product->name }}</a></h4>
                                        <div class="prices">
                                            <span class="price">{{$product->price}} {{__('messages.sp')}}</span>
                                        </div>
                                    </div>
                                </div>
                                <!--== End prPduct Item ==-->
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Product Area Wrapper ==-->

</main>
@endsection
    {{-- <div class="breadcrumbs-main is-2nd">
        <a href="{{ route('main') }}" class="breadcrumb-text-main is-light">Home</a><img
            src="https://assets.website-files.com/63bab3c727acad36f05e17b8/63bab3c727acad06445e1934_arrow-right-fill0-wght400-grad0-opsz48 (1).svg"
            loading="lazy" alt="" class="breadcrumb-icon-main" /><a
            href="{{ route('products') }}"
            class="breadcrumb-text-main is-light">Products</a><img
            src="https://assets.website-files.com/63bab3c727acad36f05e17b8/63bab3c727acad06445e1934_arrow-right-fill0-wght400-grad0-opsz48 (1).svg"
            loading="lazy" alt="" class="breadcrumb-icon-main" /><a
            href="{{ route('details_category', ['id' => $product->category->id]) }}"
            class="breadcrumb-text-main is-light">{{ $product->category->details }}</a><img
            src="https://assets.website-files.com/63bab3c727acad36f05e17b8/63bab3c727acad06445e1934_arrow-right-fill0-wght400-grad0-opsz48 (1).svg"
            loading="lazy" alt="" class="breadcrumb-icon-main" />
            <a href="#" aria-current="page"
            class="breadcrumb-text-main is-light w--current">{{ $product->name }}</a>
    </div>
    <div data-w-id="6d2b7dd5-1efa-18a1-d71e-c8523a73be57" class="header-3">
        <div class="header-3-padding">
            <div class="header-3-grid">
                <div id="w-node-_6d2b7dd5-1efa-18a1-d71e-c8523a73be5a-0808f7ca" class="header-3-block-1">
                    <div class="header-3-content-1">
                        <p data-w-id="6d2b7dd5-1efa-18a1-d71e-c8523a73be5d" class="product-text">
                            Product
                        </p>
                        <h1 data-w-id="6d2b7dd5-1efa-18a1-d71e-c8523a73be60" class="heading is-large-title">
                            {{ $product->name }}
                        </h1>
                        <a data-w-id="80cf4e46-fe0c-aabf-6a6c-6b383f9ecea5"
                            href="https://mancino-beauty-ecommerce-template.webflow.io/type/face-care"
                            class="product-small-link w-inline-block">
                        </a>
                        <p data-w-id="6d2b7dd5-1efa-18a1-d71e-c8523a73be63" class="header-3-subtitle-4">
                            {{ $product->desc }}
                        </p>
                    </div>
                </div>
                <div class="gallery-item w-dyn-item w-dyn-repeater-item" style="max-height: 500px">
                    <!-- Assuming 'ecommerce/imgs/' is correct path for your images -->
                    <img src="{{ URL::asset('storage/' . $product->image_cover) }}"
                        alt="product image" class="covr-ie is-parax" />
                </div>
            </div>
        </div>
    </div>
    <section id="discover" data-w-id="6d2b7dd5-1efa-18a1-d71e-c8523a73be6f"
        class="section with-purple-black-bg overflow-visible">
        <div class="padding for-sticky-content">
            <div class="vertical-flex with-gap-4em">
                <div class="sticky-content">
                    <div class="rich-text-on-dark-bg is-bigger w-richtext">
                        <h3>About the product</h3>
                        <p>
                            <strong>{{ $product->details }} </strong> </p>
                    </div>
                </div>
                <div class="sticky-content-image">
                    <div class="sticky-content-image-heigh">
                        <div class="sticky-content-image-block">
                            <div class="while-scrolling-effect-5rem">
                                <div class="image-animation-trigger">
                                    <div class="parallax-animation">
                                        <div class="animation-color-bg is-purple-dark"></div>
                                        <img loading="lazy" alt="Fluid cream"
                                            src="{{ URL::asset('storage/' . $product->image) }}"
                                            sizes="(max-width: 479px) 38vw, (max-width: 767px) 33vw, 30vw"
                                            class="cover-image is-parallax" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const movingImage = document.getElementById('movingImage');

        document.addEventListener('mousemove', (event) => {
            const mouseX = event.clientX;
            const mouseY = event.clientY;

            // Calculate rotation values based on mouse position
            const rotateY = (mouseX / window.innerWidth - 0.5) *
            30; // Adjust the factor for rotation sensitivity
            const rotateX = (mouseY / window.innerHeight - 0.5) * -
            30; // Adjust the factor for rotation sensitivity

            // Apply the 3D rotation transformation
            if (movingImage) {
                movingImage.style.transform =
                    `rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateZ(50px)`;
            }

            window.scrollBy(0, event.deltaY);

            // Prevent the default scrolling behavior
            event.preventDefault();
        });
        document.addEventListener('wheel', (event) => {

            // Scroll the webpage based on the wheel delta
            window.scrollBy(0, event.deltaY);

            // Prevent the default scrolling behavior
            event.preventDefault();
        });


    });
</script> --}}
