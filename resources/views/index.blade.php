@extends('layouts.index.master')

@section('title')
{{__('messages.Beauty')}}
@endsection
@section('content')
    <main class="main-content">

        <!--== Start Hero Area Wrapper ==-->
        <section class="hero-slider-area position-relative">
            <div class="swiper hero-slider-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide hero-slide-item">
                        <div class="container">
                            <div class="row align-items-center position-relative tt">
                                <div class="col-12 col-md-6">
                                    <div class="hero-slide-content">
                                        <div class="hero-slide-text-img"><img src="assets/images/slider/text-theme.webp"
                                                width="427" height="232" alt="Image"></div>
                                        <h2 class="hero-slide-title">{{ app()->getLocale() == 'ar' ? $abouts->ar_name : $abouts->name }}</h2>
                                        <p class="hero-slide-desc">{{ app()->getLocale() == 'ar' ? $abouts->ar_type : $abouts->type }}</p>

                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="hero-slide-thumb">
                                        <img src="{{ URL::asset('storage/' . $abouts->image) }}" width="841"
                                            height="832" alt="Image">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hero-slide-text-shape"><img src="assets/images/slider/text1.webp" width="70"
                                height="955" alt="Image"></div>
                        <div class="hero-slide-social-shape"></div>
                    </div>
                    <div class="swiper-slide hero-slide-item">
                        <div class="container">
                            <div class="row align-items-center position-relative tt">
                                <div class="col-12 col-md-6">
                                    <div class="hero-slide-content">
                                        <div class="hero-slide-text-img"><img src="assets/images/slider/text-theme.webp"
                                                width="427" height="232" alt="Image"></div>
                                        <h2 class="hero-slide-title">{{ app()->getLocale() == 'ar' ? $abouts->ar_name : $abouts->name }}</h2>
                                        <p class="hero-slide-desc">{{ app()->getLocale() == 'ar' ? $abouts->ar_type : $abouts->type }}</p>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="hero-slide-thumb">
                                        <img src="{{ URL::asset('storage/' . $abouts->video) }}" width="841"
                                            height="832" alt="Image">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hero-slide-text-shape"><img src="assets/images/slider/text1.webp" width="70"
                                height="955" alt="Image"></div>
                        <div class="hero-slide-social-shape"></div>
                    </div>
                </div>
                <!--== Add Pagination ==-->
                <div class="hero-slider-pagination"></div>
            </div>
            <div class="hero-slide-social-media">
                <a href="https://www.instagram.com/fhapharma?fbclid=IwZXh0bgNhZW0CMTAAAR0p_vGdUvxWFxi6JXnxlpueZH6wf2a9ajbdCVjP3s643XcvIZbzw5clU5Y_aem_AfOSZ65HpJUucSJxXwMvSo-QiymuvkLSIbdSm95KVWieV9IT-X-YQZ6RTQfglz1G8XVSag8Z2pLbfPI8nxjNbaWG" target="_blank" rel="noopener">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.facebook.com/profile.php?id=61552599025055" target="_blank" rel="noopener">
                    <i class="fab fa-facebook-f"></i>  <!-- Note: 'fa-facebook-f' might be the correct class for Facebook depending on the specific icon style you want -->
                </a>
                <a href="https://wa.me/+963983055000" target="_blank" rel="noopener">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </div>
        </section>
        <!--== End Hero Area Wrapper ==-->

        <!--== Start Product Category Area Wrapper ==-->
        <section class="section-space pb-0">
            <div class="container">
                @php
                    use App\Models\Category;
                    use App\Models\Product;
                    use App\Models\Service;
                    use App\Models\Blog;

                    $categories = Category::where('type', 'product')->simplePaginate(6);
                    $products = Product::get();
                    $blogs = Blog::take(3)->get();
                @endphp
                <div class="row g-3 g-sm-6">
                    @php
                        $colors = ['', '#FFEDB4', '#DFE4FF', '#FFEACC', '#FFDAE0', 'FFF3DA']; // Add more colors as needed
                    @endphp
                    @foreach ($categories as $index => $category)
                        <div class="col-6 col-lg-4 col-lg-2 col-xl-2 mt-xl-0 mt-sm-6 mt-4">
                            <!--== Start Product Category Item ==-->
                            <a href="{{ route('details_category', $category->id) }}" class="product-category-item"
                                data-bg-color="{{ $colors[$index % count($colors)] }}">
                                <img class="icon" src="{{ URL::asset('storage/' . $category->avatar) }}" width="80"
                                    height="80" alt="Image-HasTech">
                                <h3 class="title">{{ app()->getLocale() == 'ar' ? $category->ar_details : $category->details }}</h3>
                            </a>
                            <!--== End Product Category Item ==-->
                        </div>
                    @endforeach
                    <div class="col-12" style="margin-top: 20px">
                        <center>
                            <div class="pagination">
                                {{ $categories->links() }}
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Product Category Area Wrapper ==-->

        <!--== Start Product Area Wrapper ==-->
        <section class="section-space">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h2 class="title">{{ __('messages.Our_Products') }}</h2>
                            <p>{{__('messages.our_products_desc')}}</p>
                        </div>
                    </div>
                </div>
                <div class="row mb-n4 mb-sm-n10 g-3 g-sm-6">
                    @foreach ($products as $product)
                        <div class="col-6 col-lg-4 mb-4 mb-sm-9">
                            <!--== Start Product Item ==-->
                            <div class="product-item">
                                <div class="product-thumb">
                                    <a class="d-block" href="{{ route('details_product', $product->id) }}">
                                        <img src="{{ URL::asset('storage/' . $product->image) }}" width="370"
                                            style="height: 450px" alt="Image-HasTech">
                                    </a>
                                    <div class="product-action">
                                        <button type="button" class="product-action-btn action-btn-quick-view"
                                            data-bs-toggle="modal"
                                            data-bs-target="#action-QuickViewModal-{{ $product->id }}">
                                            <i class="fa fa-expand"></i>
                                        </button>
                                        <!--== Start Product Quick View Modal ==-->
                                        <aside class="product-cart-view-modal modal fade"
                                            id="action-QuickViewModal-{{ $product->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div class="product-quick-view-content">
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal">
                                                                <span class="fa fa-close"></span>
                                                            </button>
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <!--== Start Product Thumbnail Area ==-->
                                                                        <div class="product-single-thumb">
                                                                            <img src="{{ URL::asset('storage/' . $product->image) }}"
                                                                                width="544"
                                                                                style="height: 450px"
                                                                                alt="Image-HasTech">
                                                                        </div>
                                                                        <!--== End Product Thumbnail Area ==-->
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <!--== Start Product Info Area ==-->
                                                                        <div class="product-details-content">
                                                                            <h5 class="product-details-collection">
                                                                                {{ app()->getLocale() == 'ar' ?  $product->category->ar_details :  $product->category->details }}</h5>
                                                                            <h3 class="product-details-title">
                                                                                {{ $product->name }}</h3>
                                                                            <p class="mb-6">{{ app()->getLocale() == 'ar' ? $product->ar_desc : $product->desc }}</p>

                                                                            <div class="product-details-action">
                                                                                <h4 class="price">{{ $product->price }}
                                                                                    {{__('messages.sp')}}</h4>
                                                                            </div>
                                                                        </div>
                                                                        <!--== End Product Info Area ==-->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </aside>
                                        <!--== End Product Quick View Modal ==-->

                                    </div>
                                </div>
                                <div class="product-info">
                                    <div class="product-details-review mb-5 justify-content-start">
                                        <button type="button"
                                            class="product-review-show justify-content-start" style="text-align: start !important">{{ app()->getLocale() == 'ar' ? mb_substr($product->ar_desc, 0, 50) . '...' : mb_substr($product->desc, 0, 50) . '...' }}</button>
                                    </div>
                                    <h4 class="title"><a
                                            href="{{ route('details_product', $product->id) }}">{{ app()->getLocale() == 'ar' ? $product->ar_name : $product->name }}</a>
                                    </h4>
                                    <div class="prices">
                                        <span class="price">{{ $product->price }} {{__('messages.sp')}}</span>
                                    </div>
                                </div>
                                <div class="product-action-bottom">
                                    <button type="button" class="product-action-btn action-btn-quick-view"
                                        data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                        <i class="fa fa-expand"></i>
                                    </button>
                                </div>
                            </div>
                            <!--== End prPduct Item ==-->
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--== Start Blog Area Wrapper ==-->
        <section class="section-space">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h2 class="title">{{__('messages.All_articles')}}</h2>
                        </div>
                    </div>
                </div>
                <div class="row mb-n9">
                    @foreach ($blogs as $blog)
                        <div class="col-sm-6 col-lg-4 mb-8">
                            <!--== Start Blog Item ==-->
                            <div class="post-item">
                                <a href="{{route('bolg_details',$blog->id)}}" class="thumb">
                                    <img src="{{ URL::asset('storage/' . $blog->image) }}" width="370"
                                        style="height: 320px" alt="Image-HasTech">
                                </a>
                                <div class="content">
                                    <a class="post-category" href="{{route('bolg_details',$blog->id)}}">{{app()->getLocale() == 'ar' ? $blog->ar_title : $blog->title }}</a>
                                    <h4 class="title"><a href="{{route('bolg_details',$blog->id)}}">{{ app()->getLocale() == 'ar' ? mb_substr($blog->ar_article, 0, 50) . '...' : mb_substr($blog->article, 0, 50) . '...' }}</a></h4>
                                    <ul class="meta">
                                        <li class="author-info"><span>{{__("messages.By")}}</span> <a
                                                href="blog.html">{{app()->getLocale() == 'ar' ? $blog->ar_author : $blog->author  }}</a></li>
                                        <li class="post-date">{{ $blog->created_at }}</li>
                                    </ul>
                                </div>
                            </div>
                            <!--== End Blog Item ==-->
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--== End Blog Area Wrapper ==-->

        <!--== Start News Letter Area Wrapper ==-->
        <section class="section-space pt-0">
            <div class="container">
                <div class="newsletter-content-wrap" data-bg-img="assets/images/photos/bg1.webp">
                    <div class="newsletter-content">
                        <div class="section-title mb-0">
                            <h2 class="title">{{ __('messages.Join_with_us') }}</h2>
                            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam.</p> --}}
                        </div>
                    </div>
                    <div class="newsletter-form">
                        <form>
                            <input type="email" class="form-control" placeholder="enter your email">
                            <button class="btn-submit" type="submit"><i class="fa fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--== End News Letter Area Wrapper ==-->

    </main>

@endsection
