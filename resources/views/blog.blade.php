@extends('layouts.index.layout')
@section('css')
@endsection
@section('title')
    {{ __('messages.Beauty') }}
@stop
@section('content')


    <main class="main-content">

        <!--== Start Page Header Area Wrapper ==-->
        <nav aria-label="breadcrumb" class="breadcrumb-style1 mb-10">
            <div class="container">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item">
                        <a href="{{ route('main') }}">{{ __('messages.home') }}</a>
                        @if (app()->getLocale() == 'ar')
                            <span>&rlm;/</span>
                        @endif
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"> {{ __('messages.blog') }}</li>
                </ol>

            </div>
        </nav>

        <section class="page-header-area page-header-style2-area {{ app()->getLocale() == 'ar' ? 'rtl-bg' : '' }}">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <div class="page-header-content page-header-st2-content">
                            <div class="title-img"><img src="assets/images/photos/page-header-text1.webp" alt="Image">
                            </div>
                            <h2 class="page-header-title">{{ __('messages.Whats_the_beauty_secrets') }}</h2>
                            {{-- <p class="page-header-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis.</p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Page Header Area Wrapper ==-->

        <!--== Start Blog Area Wrapper ==-->
        <section class="section-space pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h2 class="title">{{ __('messages.New_Blogs') }}</h2>
                            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis</p> --}}
                        </div>
                    </div>
                </div>
                <div class="row mb-n9">

                    @if ($new_blogs->isNotEmpty())
                        @foreach ($new_blogs as $blog)
                            <!-- Blog Item Start -->
                            <div class="col-sm-6 col-lg-4 mb-8">
                                <!--== Start Blog Item ==-->
                                <div class="post-item">
                                    <a href="{{ route('blog_details', $blog->id) }}" class="thumb">
                                        <img src="{{ URL::asset('storage/' . $blog->cover) }}" width="370"
                                            style="height: 320px" alt="Image-HasTech">
                                    </a>
                                    <div class="content">
                                        <a class="post-category"
                                            href="{{ route('blog_details', $blog->id) }}">{{ app()->getLocale() == 'ar' ? $blog->category->ar_details : $blog->category->details }}</a>
                                        <h4 class="title"><a
                                                href="{{ route('blog_details', $blog->id) }}">{{ app()->getLocale() == 'ar' ? $blog->ar_title : $blog->title }}</a>
                                        </h4>
                                        <ul class="meta">
                                            <li class="author-info"><span>{{ __('messages.By') }}</span> <a
                                                    href="{{ route('blog_details', $blog->id) }}">{{ app()->getLocale() == 'ar' ? $blog->ar_author : $blog->author }}</a>
                                            </li>
                                            <li class="post-date">{{ $blog->created_at }}</li>
                                        </ul>
                                    </div>
                                </div>
                                <!--== End Blog Item ==-->
                            </div>
                            <!-- Blog Item End -->
                        @endforeach
                    @else
                        <div class="col-12 text-center">
                            <p>{{ __('messages.no_blogs') }}</p>
                        </div>
                    @endif

                </div>
            </div>
        </section>
        <!--== End Blog Area Wrapper ==-->

        <!--== Start Blog Area Wrapper ==-->
        <section class="section-space">
            <div class="container">
                <div class="row mb-n9">
                    @if ($more_blogs->isNotEmpty())
                        @foreach ($more_blogs as $blog)
                            <div class="col-sm-6 mb-8">
                                <!--== Start Blog Item ==-->
                                <div class="post-item">
                                    <a href="{{ route('bolg_details', $blog->id) }}" class="thumb">
                                        <img src="{{ URL::asset('storage/' . $blog->cover) }}" width="570"
                                            style="height: 340px" alt="Image-HasTech">
                                    </a>
                                    <div class="content">
                                        <h4 class="title mt-0"><a
                                                href="{{ route('bolg_details', $blog->id) }}">{{ app()->getLocale() == 'ar' ? $blog->category->ar_details : $blog->category->details }}</a>
                                        </h4>
                                        <p class="desc">{{ app()->getLocale() == 'ar' ? $blog->ar_title : $blog->title }}
                                        </p>
                                        <ul class="meta">
                                            <li class="author-info"><span>{{ __('messages.By') }}</span> <a
                                                    href="{{ route('bolg_details', $blog->id) }}">{{ app()->getLocale() == 'ar' ? $blog->ar_author : $blog->author }}</a>
                                            </li>
                                            <li class="post-date">{{ $blog->created_at }}</li>
                                        </ul>
                                    </div>
                                </div>
                                <!--== End Blog Item ==-->
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 text-center">
                            <p>{{ __('messages.no_blogs') }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </section>
        <!--== End Blog Area Wrapper ==-->

        <!--== Start Blog Area Wrapper ==-->
        <section class="section-space pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h2 class="title">{{ __('messages.Other_blogs') }}</h2>
                            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis</p> --}}
                        </div>
                    </div>
                </div>
                <div class="row mb-n9">
                    @if ($blogs->isNotEmpty())
                        @foreach ($blogs as $blog)
                            <div class="col-sm-6 mb-8">
                                <!--== Start Blog Item ==-->
                                <div class="post-item">
                                    <a href="{{ route('bolg_details', $blog->id) }}" class="thumb">
                                        <img src="{{ URL::asset('storage/' . $blog->cover) }}" width="570"
                                            style="height: 340px" alt="Image-HasTech">
                                    </a>
                                    <div class="content">
                                        <h4 class="title"><a
                                                href="{{ route('bolg_details', $blog->id) }}">{{ app()->getLocale() == 'ar' ? $blog->ar_title : $blog->title }}</a>
                                        </h4>
                                        <p class="desc">
                                            {{ app()->getLocale() == 'ar' ? mb_substr($blog->ar_article, 0, 100) . '...' : mb_substr($blog->article, 0, 100) . '...' }}
                                        </p>
                                        <ul class="meta">
                                            <li class="author-info"><span>By:</span> <a
                                                    href="{{ route('bolg_details', $blog->id) }}">{{ app()->getLocale() == 'ar' ? $blog->ar_author : $blog->author }}</a>
                                            </li>
                                            <li class="post-date">{{ $blog->created_at }}</li>
                                        </ul>
                                    </div>
                                </div>
                                <!--== End Blog Item ==-->
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 text-center">
                            <p>{{ __('messages.no_blogs') }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </section>
        <!--== End Blog Area Wrapper ==-->

        <!--== Start Product Banner Area Wrapper ==-->
        <section class="section-space pt-0">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-10 col-lg-8">
                        <!--== Start Product Category Item ==-->
                        @if ($category!= null)
                        <a href="{{ route('details_blog_category', $category->id) }}" class="product-banner-item">
                            <img src="{{ URL::asset('storage/' . $category->cover) }}" width="770" height="250"
                                alt="Image-HasTech">
                        </a>
                        @endif
                        <!--== End Product Category Item ==-->
                    </div>
                </div>
            </div>
        </section>
        <!--== End Product Banner Area Wrapper ==-->

        <!--== Start Blog Area Wrapper ==-->
        <section class="section-space pt-0">
            <div class="container">
                <div class="row mb-n9">
                    @if (isset($category_blogs) && $category_blogs != null)

                    @foreach ($category_blogs as $blog)
                        <div class="col-sm-4 mb-8">
                            <!--== Start Blog Item ==-->
                            <div class="post-item">
                                <a href="{{ route('bolg_details', $blog->id) }}" class="thumb">
                                    <img src="{{ URL::asset('storage/' . $blog->cover) }}" width="370"
                                        style="height: 320px" alt="Image-HasTech">
                                </a>
                                <div class="content">
                                    <h4 class="title mt-0"><a
                                            href="{{ route('bolg_details', $blog->id) }}">{{ app()->getLocale() == 'ar' ? $blog->category->ar_details : $blog->category->details }}</a>
                                    </h4>
                                    <p class="desc">{{ app()->getLocale() == 'ar' ? $blog->ar_title : $blog->title }}</p>
                                    <ul class="meta">
                                        <li class="author-info"><span>{{ __('messages.By') }}</span> <a
                                                href="{{ route('bolg_details', $blog->id) }}">{{ app()->getLocale() == 'ar' ? $blog->ar_author : $blog->author }}</a>
                                        </li>
                                        <li class="post-date">{{ $blog->created_at }}</li>
                                    </ul>
                                </div>
                            </div>
                            <!--== End Blog Item ==-->
                        </div>
                    @endforeach
                    @endif
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

    {{-- <div class="header-1 is-dark">
        <div class="header-1-padding">
            <div class="container">
                <div class="header-1-flex-2">
                    <a href="#discover" data-w-id="6e867e74-f6b6-f9d4-4f80-2b500ab7e4fc"
                        class="main-circle-button w-inline-block">
                        <div class="circle-button-content">
                            <p class="circle-button-text-1">Read</p>
                        </div>
                        <img src="https://assets.website-files.com/63bab3c727acad36f05e17b8/63bab3c727acad85055e190d_arrow-icon-down-purple-1.svg"
                            loading="lazy" alt="" class="circle-button-icon-1" />
                        <div class="circle-button-border-1"></div>
                    </a>
                    <h1 class="heading is-header-1-title-2">Beauty blog</h1>
                    <div class="socials-4 w-dyn-list">
                        <div role="list" class="socials-4-list w-dyn-items">
                            <div role="listitem" class="social-1-item w-dyn-item">
                                <a aria-label="Social Button" data-w-id="e6e6b2fa-6563-0069-215e-945a1eb0cbb7"
                                    href="social/twitter.html" class="social-1-link-block w-inline-block"><img
                                        src="https://assets.website-files.com/63bab3c727acad1be85e17ec/63bab3c727acad01e55e17f1_twitter-logo-white.svg"
                                        loading="lazy" alt="Twitter" class="social-icon" />
                                    <div class="social-link-circle is-2nd"></div>
                                </a>
                            </div>
                            <div role="listitem" class="social-1-item w-dyn-item">
                                <a aria-label="Social Button" data-w-id="e6e6b2fa-6563-0069-215e-945a1eb0cbb7"
                                    href="social/facebook.html" class="social-1-link-block w-inline-block"><img
                                        src="https://assets.website-files.com/63bab3c727acad1be85e17ec/63bab3c727acad094d5e181b_facebook-logo-white.svg"
                                        loading="lazy" alt="Facebook" class="social-icon" />
                                    <div class="social-link-circle is-2nd"></div>
                                </a>
                            </div>
                            <div role="listitem" class="social-1-item w-dyn-item">
                                <a aria-label="Social Button" data-w-id="e6e6b2fa-6563-0069-215e-945a1eb0cbb7"
                                    href="social/linkedin.html" class="social-1-link-block w-inline-block"><img
                                        src="https://assets.website-files.com/63bab3c727acad1be85e17ec/63bab3c727acade6545e1892_linkedin-logo-white.svg"
                                        loading="lazy" alt="LinkedIn" class="social-icon" />
                                    <div class="social-link-circle is-2nd"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="discover" class="section with-purple-black-bg with-borders">
        <div class="container">
            <div class="padding">
                <div class="vertical-flex with-gap-2em">
                    <h2 class="heading is-blog-title-2">All articles</h2>
                    <div class="blogs w-dyn-list">
                        @foreach ($blogs as $blog)
                        <div role="listitem" class="blog-item w-dyn-item">
                            <a href="{{ route('bolg_details',$blog->id) }}}}" class="blog-link w-inline-block">
                                <div class="blog-image">
                                    <div class="_3d-block">
                                        <div class="_3d-trigger">
                                            <div class="image-animation-trigger">
                                                <div class="animation-color-bg is-purple-dark"></div>
                                                <img loading="lazy" alt="{{ $blog->title }}" src="{{ asset('storage/' . $blog->cover) }}"
                                                 class="cover-image" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-title-block">
                                    <div class="blog-categories">
                                        <p class="blog-category-text-1">{{ $blog->author }}</p>
                                        <p class="blog-featured-text-1 w-condition-invisible">Featured</p>
                                    </div>
                                    <h2 class="blog-name">{{ $blog->title }}</h2>
                                    <div class="main-button is-light">

                                        <div class="button-text">Read</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section> --}}

@endsection
