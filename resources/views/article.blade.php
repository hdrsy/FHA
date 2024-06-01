@extends('layouts.index.layout')
@section('css')
@endsection
@section('title')
{{ __('messages.Beauty') }}
@stop
@section('content')
<main class="main-content">

    <!--== Start Page Header Area Wrapper ==-->
    <nav aria-label="breadcrumb" class="breadcrumb-style1">
        <div class="container">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item">
                    <a href="{{route('main')}}">{{ __('messages.home') }}</a>
                    @if (app()->getLocale() == 'ar')
                        <span>&rlm;/ </span>
                    @endif
                </li>
                <li class="breadcrumb-item active" aria-current="page"> {{ __('messages.blog_detail') }}</li>
            </ol>
        </div>
    </nav>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start Blog Detail Area Wrapper ==-->
    <section class="section-space pb-0">
        <div class="container">
            <div class="blog-detail">
                <h3 class="blog-detail-title">{{ app()->getLocale() == 'ar' ? $blog->ar_title : $blog->title }}</h3>
                <div class="blog-detail-category">
                    <a class="category" href="#">{{ app()->getLocale() == 'ar' ? $blog->category->ar_details : $blog->category->details }}</a>
                    <a class="category" data-bg-color="#957AFF" href="#">{{ app()->getLocale() == 'ar' ? $blog->ar_title : $blog->title }}</a>
                </div>
                <img class="blog-detail-img mb-7 mb-lg-10" src="{{ URL::asset('storage/' . $blog->cover) }}" width="1170" height="1012" alt="Image">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-md-7">
                                <ul class="blog-detail-meta">
                                    <li class="meta-admin"><img src="{{ asset('assets/images/profile.png') }}" width="50px" style="height: 50px;" alt="Image"> {{ app()->getLocale() == 'ar' ? $blog->ar_author : $blog->author }}</li>
                                    <li>{{$blog->created_at}}</li>
                                </ul>
                            </div>
                        </div>
                        <p class="desc mt-4 mt-lg-7">{{ app()->getLocale() == 'ar' ? $blog->ar_article : $blog->article }}</p> </div>
                </div>
            </div>

            <div class="section-space pb-0">
                <!--== Start Product Category Item ==-->
                @foreach ($blog->images as $image)
                <a href="#" class="product-banner-item" style="margin-bottom: 20px">

                    <img class="quote-icon" src="{{ URL::asset('storage/' . $image) }}" width="1170" height="60" alt="Icon">

                </a>
                @endforeach
                <!--== End Product Category Item ==-->
            </div>

            <div class="row justify-content-between align-items-center pt-10 mt-4 section-space">
                @if ($previousBlog !=null)

                <div class="col-sm-6">
                    <a href="{{ route('bolg_details',$previousBlog->id) }}" class="blog-next-previous">
                        <div class="thumb">
                            <span class="arrow">PREV</span>
                            <img src="{{ URL::asset('storage/' . $previousBlog->cover) }}" width="93" height="80" alt="Image">
                        </div>
                        <div class="content">
                            <h4 class="title">{{ app()->getLocale() == 'ar' ? $previousBlog->ar_title : $previousBlog->title }}</h4>
                            <h5 class="post-date">{{$previousBlog->created_at}}</h5>
                        </div>
                    </a>
                </div>
                @endif
                @if ($nextBlog !=null)
                <div class="col-sm-6">
                    <a href="{{ route('bolg_details',$nextBlog->id) }}" class="blog-next-previous blog-next">
                        <div class="thumb">
                            <span class="arrow">NEXT</span>
                            <img src="{{ URL::asset('storage/' . $nextBlog->cover) }}" width="93" height="80" alt="Image">
                        </div>
                        <div class="content">
                            <h4 class="title">{{ app()->getLocale() == 'ar' ? $nextBlog->ar_title : $nextBlog->title }}</h4>
                            <h5 class="post-date">{{$nextBlog->created_at}}</h5>
                        </div>
                    </a>
                </div>
                @endif
            </div>

            {{-- <div class="blog-comment-form-wrap">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <h4 class="blog-comment-form-title">Comment</h4>
                        <div class="blog-comment-form-info">
                            <div class="blog-comment-form-social">
                                <span>Share:</span>
                                <a href="https://www.instagram.com/fhapharma?fbclid=IwZXh0bgNhZW0CMTAAAR0p_vGdUvxWFxi6JXnxlpueZH6wf2a9ajbdCVjP3s643XcvIZbzw5clU5Y_aem_AfOSZ65HpJUucSJxXwMvSo-QiymuvkLSIbdSm95KVWieV9IT-X-YQZ6RTQfglz1G8XVSag8Z2pLbfPI8nxjNbaWG" target="_blank" rel="noopener">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="https://www.facebook.com/profile.php?id=61552599025055" target="_blank" rel="noopener">
                                    <i class="fab fa-facebook-f"></i>  <!-- Note: 'fa-facebook-f' might be the correct class for Facebook depending on the specific icon style you want -->
                                </a>
                                <a href="https://wa.me/+963983055000" target="_blank" rel="noopener">
                                    <i class="fas fa-phone"></i>
                                </a>
                            </div>
                            <select class="blog-comment-form-select">
                                <option selected>Short By Newest</option>
                                <option value="1">Best</option>
                                <option value="2">Newest</option>
                                <option value="3">Oldest</option>
                            </select>
                        </div>
                        <div class="blog-comment-form">
                            <img class="blog-comment-img" src="assets/images/blog/form1.webp" width="110" height="110" alt="Image">
                            <textarea class="blog-comment-control" placeholder="type your comment"></textarea>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
    <!--== End Blog Detail Area Wrapper ==-->

    <!--== Start Blog Area Wrapper ==-->
    <section class="section-space">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h2 class="title">Blog posts</h2>
                    </div>
                </div>
            </div>
            <div class="row mb-n9">
                @foreach ($randomBlogs as $blog)
                <div class="col-sm-6 col-lg-4 mb-8">
                    <!--== Start Blog Item ==-->
                    <div class="post-item">
                        <a href="{{ route('bolg_details',$blog->id) }}" class="thumb">
                            <img src="{{ URL::asset('storage/' . $blog->cover) }}" width="370" style="height: 320px" alt="Image-HasTech">
                        </a>
                        <div class="content">
                            <a class="post-category" href="blog.html">{{ __('messages.Beauty') }}</a>
                            <h4 class="title"><a href="blog-details.html">{{ app()->getLocale() == 'ar' ? $blog->ar_title : $blog->title }}</a></h4>
                            <ul class="meta">
                                <li class="author-info"><span>{{ __('messages.By') }}</span> <a href="{{route('bolg_details',$blog->id)}}">{{ app()->getLocale() == 'ar' ? $blog->ar_author : $blog->author }}</a></li>
                                <li class="post-date">{{$blog->created_at}}</li>
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
            <div class="newsletter-content-wrap" data-bg-img="{{ URL::asset('assets/images/photos/bg1.webp') }}">
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
    {{-- <header data-w-id="d95ee648-8e99-94ab-6e2c-ed7b0505fec5" class="header-4 is-dark">
        <div class="header-4-flex" id="movingImage">
            <div class="header-4-content with-3d">
                <div class="_3d-block-for-text">
                    <p class="uppercase-title-dark">Article</p>
                </div>
                <div class="_3d-block-for-text">
                    <h1 class="heading is-small-title is-normal">
                        {{ $blog->title }}
                    </h1>
                </div>
                <div class="_3d-block-for-text">
                    <a href="#read" data-w-id="6e867e74-f6b6-f9d4-4f80-2b500ab7e4fc"
                        class="main-circle-button w-inline-block">
                        <div class="circle-button-content">
                            <p class="circle-button-text-1">Read</p>
                        </div>
                        <img src="https://assets.website-files.com/63bab3c727acad36f05e17b8/63bab3c727acad85055e190d_arrow-icon-down-purple-1.svg"
                            loading="lazy" alt="" class="circle-button-icon-1" />
                        <div class="circle-button-border-1"></div>
                    </a>
                </div>
            </div>
            @php
                $images = $blog->images;
                $imageCount = min(count($images), 4);
            @endphp
            @for ($i = 0; $i < $imageCount; $i++)
                <div class="header-4-image-{{ $i + 1 }} animate-fade-in">
                    <div class="_3d-block">
                        <div class="_3d-trigger">
                            <div class="image-animation-trigger-vertical">
                                <div class="parallax-animation">
                                    <div class="animation-color-bg is-green-light"></div>
                                    <img loading="lazy" alt="{{ $blog->title }}" sizes="(max-width: 479px) 33vw, 20vw"
                                        src="{{ asset('storage/' . $images[$i]) }}" class="cover-image is-parallax" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <div class="header-4-bg-2"></div>
        <div class="breadcrumbs-main">
            <a href="{{ route('main') }}" class="breadcrumb-text-main is-light">Home</a><img
                src="https://assets.website-files.com/63bab3c727acad36f05e17b8/63bab3c727acad06445e1934_arrow-right-fill0-wght400-grad0-opsz48 (1).svg"
                loading="lazy" alt="" class="breadcrumb-icon-main" /><a href="{{ route('blog') }}"
                class="breadcrumb-text-main is-light">Blogs</a><img
                src="https://assets.website-files.com/63bab3c727acad36f05e17b8/63bab3c727acad06445e1934_arrow-right-fill0-wght400-grad0-opsz48 (1).svg"
                loading="lazy" alt="" class="breadcrumb-icon-main" />
            <a href="#" class="breadcrumb-text-main is-light">{{ $blog->title }}</a><img
                src="https://assets.website-files.com/63bab3c727acad36f05e17b8/63bab3c727acad06445e1934_arrow-right-fill0-wght400-grad0-opsz48 (1).svg"
                loading="lazy" alt="" class="breadcrumb-icon-main" /><a </div>
    </header>
    <div class="section-blog-image">
        <div class="image-animation-trigger">
            <div class="parallax-animation">
                <div class="animation-color-bg is-midnight-purple"></div>
                <img src="{{ asset('storage/' . $blog->image) }}"
                    alt="Say Goodbye to Skincare Struggles: Expert-Recommended Beauty Services" sizes="100vw"
                    class="cover-image is-parallax" />
            </div>
        </div>
    </div>
    <section id="read" class="section">
        <div class="container">
            <div class="padding">
                <div class="blog-post">
                    <div class="blog-categories-block">
                        <div class="category-flex">
                            <p class="blog-category-text-2 is-1st">Author:</p>
                            <p class="blog-category-text-2">{{ $blog->author }}</p>
                        </div>
                        <div class="category-flex">
                            <p class="blog-category-text-2 is-1st">Published:</p>
                            <p class="blog-category-text-2">{{ $blog->created_at }}</p>
                        </div>
                    </div>
                    <div class="rich-text w-richtext">
                        <h2>{!! $blog->article !!}</h2>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const images = document.querySelectorAll('.cover-image.is-parallax');

            images.forEach((image) => {
                image.addEventListener('mousemove', (event) => {
                    const mouseX = event.clientX;
                    const mouseY = event.clientY;

                    // Calculate rotation values based on mouse position
                    const rotateY = (mouseX / window.innerWidth - 0.5) * 30;
                    const rotateX = (mouseY / window.innerHeight - 0.5) * -30;

                    // Apply the 3D rotation transformation to the current element
                    image.style.transform = `rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateZ(50px)`;

                    // Prevent the default scrolling behavior
                    event.preventDefault();
                });

                image.addEventListener('mouseleave', () => {
                    // Reset the transformation when mouse leaves the element
                    image.style.transform = 'none';
                });

                image.addEventListener('wheel', (event) => {
                    // Scroll the webpage based on the wheel delta
                    window.scrollBy(0, event.deltaY);

                    // Prevent the default scrolling behavior
                    event.preventDefault();
                });
            });
        });

        const fadeInElements = document.querySelectorAll('.animate-fade-in');

        fadeInElements.forEach((element) => {
            // Add the 'animate-active' class to trigger the fade-in animation
            element.classList.add('animate-active');
    });
    </script> --}}

@endsection
