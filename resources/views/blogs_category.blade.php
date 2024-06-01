<style>
    .pagination a {
        font-size: 10px; /* Smaller text */
    }

    .pagination svg {
        width: 10px; /* Smaller icons */
        height: 10px; /* Maintain aspect ratio */
    }
</style>
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
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item">
                                <a href="{{route('main')}}">{{ __('messages.home') }}</a>

                            </li>
                            <li class="breadcrumb-item active" aria-current="page"> {{ __('messages.Blogs') }}</li>
                        </ol>
                        <h2 class="page-header-title" style="display: flex; justify-content: flex-start">{{ __('messages.All_articles') }}</h2>
                    </div>
                </div>
                <div class="col-md-7">
                    <h5 class="showing-pagination-results mt-5 mt-md-9 text-center text-md-end">{{ __('messages.Showing') }} {{$category->blogs_count}} {{ __('messages.Results') }}</h5>
                </div>
            </div>
        </div>
    </section>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start Product Category Area Wrapper ==-->
    <section class="section-space pb-0">
        <div class="container">
            @php
            use App\Models\Category;
            use App\Models\Service;
            use App\Models\Blog;

            $categories = Category::where('type','blog')->simplePaginate(6);

        @endphp
            <div class="row g-3 g-sm-6">
                @php
                    $colors = ['', '#FFEDB4', '#DFE4FF', '#FFEACC', '#FFDAE0', 'FFF3DA']; // Add more colors as needed
                @endphp
                @foreach ($categories as $index => $blogcategory)
                    <div class="col-6 col-lg-4 col-lg-2 col-xl-2 mt-xl-0 mt-sm-6 mt-4">
                        <!--== Start Product Category Item ==-->
                        <a href="{{ route('details_category', $blogcategory->id) }}" class="product-category-item"
                            data-bg-color="{{ $colors[$index % count($colors)] }}">
                            <img class="icon" src="{{ URL::asset('storage/' . $blogcategory->avatar) }}" width="80"
                                height="80" alt="Image-HasTech">
                            <h3 class="title">{{ app()->getLocale() == 'ar' ? $blogcategory->ar_details : $blogcategory->details }}</h3>
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
                        <h2 class="title"> {{ __('messages.Blogs') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row mb-n4 mb-sm-n10 g-3 g-sm-6">
                @foreach ($category->blogs as $blog)
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
                                <li class="author-info"><span>By:</span> <a
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
    <!--== End Product Area Wrapper ==-->

    <!--== Start Product Banner Area Wrapper ==-->
    <section>
        <div class="container">
            <!--== Start Product Category Item ==-->
            <a href="product.html" class="product-banner-item">
                <img src="{{URL::asset('assets/images/shop/banner/7.webp')}}" width="1170" height="240" alt="Image-HasTech">
            </a>
            <!--== End Product Category Item ==-->
        </div>
    </section>
    <!--== End Product Banner Area Wrapper ==-->

</main>

@endsection
