<style>
    .pagination a {
        font-size: 10px;
        /* Smaller text */
    }

    .pagination svg {
        width: 10px;
        /* Smaller icons */
        height: 10px;
        /* Maintain aspect ratio */
    }
</style>
@extends('layouts.index.layout')


@section('title')
    {{ __('messages.Beauty') }}
@stop
@section('content')

    <main class="main-content">
        @php
            use App\Models\Category;
            use App\Models\Product;
            use App\Models\Service;
            use App\Models\Blog;

            $categories = Category::where('type', 'product')->simplePaginate(6);
            $products = Product::all();
            $products_count = Product::count();
            $minPrice = Product::min('price');
            $maxPrice = Product::max('price');

        @endphp
        <!--== Start Page Header Area Wrapper ==-->
        <section class="page-header-area pt-10 pb-9" data-bg-color="#FFF3DA">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="page-header-st3-content text-center text-md-start">
                            <ol class="breadcrumb justify-content-start">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('main') }}">{{ __('messages.home') }}</a>
                                    @if (app()->getLocale() == 'ar')
                                        <span>&rlm;/</span>
                                    @endif
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"> {{ __('messages.products') }}</li>
                            </ol>
                            <h2 class="page-header-title" style="display: flex; justify-content: flex-start;">
                                {{ __('messages.all_products') }}</h2>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <h5 class="showing-pagination-results mt-5 mt-md-9 text-center text-md-end">
                            {{ __('messages.Showing') }}
                            {{ $products_count }} {{ __('messages.Results') }}</h5>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Page Header Area Wrapper ==-->

        <!--== Start Shop Top Bar Area Wrapper ==-->
        <div class="shop-top-bar-area">
            <div class="container">
                <div class="shop-top-bar">
                    <select class="select-sorting" onchange="fetchSortedProducts()">
                        <option value="">{{ __('messages.Sort') }}</option>
                        <option value="az">{{ __('messages.A_Z') }}</option>
                        <option value="za">{{ __('messages.Z_A') }}</option>
                        <option value="low_high">{{ __('messages.low_to_high') }}</option>
                        <option value="high_low">{{ __('messages.high_to_low') }}</option>
                        <option value="new_old">{{ __('messages.new_to_old') }}</option>
                        <option value="old_new">{{ __('messages.old_to_new') }}</option>
                    </select>

                    <div class="select-price-range">
                        <h4 class="title">{{ __('messages.pricing') }}</h4>
                        <div class="select-price-range-slider">
                            <div class="slider-range" id="slider-range"></div>
                            <div class="slider-labels">
                                <span id="slider-range-value1">{{ $minPrice }} {{ __('messages.sp') }}</span>
                                <span>-</span>
                                <span id="slider-range-value2">{{ $maxPrice }} {{ __('messages.sp') }}</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--== End Shop Top Bar Area Wrapper ==-->

        <!--== Start Product Category Area Wrapper ==-->
        <section class="section-space pb-0">
            <div class="container">

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
                                <h3 class="title">
                                    {{ app()->getLocale() == 'ar' ? $category->ar_details : $category->details }}</h3>
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
                            <h2 class="title">{{ __('messages.our_products') }}</h2>
                            <p>{{ __('messages.our_products_desc') }}</p>
                        </div>
                    </div>
                </div>
                @if ($products && $products->isNotEmpty())
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
                                                                                    width="544" alt="Image-HasTech">
                                                                            </div>
                                                                            <!--== End Product Thumbnail Area ==-->
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <!--== Start Product Info Area ==-->
                                                                            <div class="product-details-content">
                                                                                <h5 class="product-details-collection">
                                                                                    {{ app()->getLocale() == 'ar' ? $product->category->ar_details : $product->category->details }}
                                                                                </h5>
                                                                                <h3 class="product-details-title">
                                                                                    {{ app()->getLocale() == 'ar' ? $product->ar_name : $product->name }}
                                                                                </h3>

                                                                                <p class="mb-6">
                                                                                    {{ app()->getLocale() == 'ar' ? $product->ar_desc : $product->desc }}
                                                                                </p>

                                                                                <div class="product-details-action">
                                                                                    <h4 class="price">
                                                                                        {{ $product->price }}
                                                                                        {{ __('messages.sp') }}</h4>
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
                                            <button type="button" class="product-review-show justify-content-start"
                                                style="text-align: start !important">{{ app()->getLocale() == 'ar' ? mb_substr($product->ar_desc, 0, 50) . '...' : mb_substr($product->desc, 0, 50) . '...' }}</button>
                                        </div>
                                        <h4 class="title"><a
                                                href="product-details.html">{{ app()->getLocale() == 'ar' ? $product->ar_name : $product->name }}</a>
                                        </h4>
                                        <div class="prices">
                                            <span class="price">{{ $product->price }} {{ __('messages.sp') }}</span>
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
                @else
                    <div class="row mb-n4 mb-sm-n10 g-3 g-sm-6">
                        <center>
                            <p>{{ __('messages.no_products') }}</p>
                        </center>
                    </div>
                @endif
            </div>
        </section>
        <!--== End Product Area Wrapper ==-->

        <!--== Start Product Banner Area Wrapper ==-->
        <section>
            <div class="container">
                <!--== Start Product Category Item ==-->
                <a href="#" class="product-banner-item">
                    <img src="{{ URL::asset('assets/images/image 6.jpg') }}" width="1170" height="240"
                        alt="Image-HasTech">
                </a>
                <!--== End Product Category Item ==-->
            </div>
        </section>
        <!--== End Product Banner Area Wrapper ==-->

    </main>

@endsection
<script>
    function fetchSortedProducts() {

        console.log('Function called');
        var sort = document.querySelector('.select-sorting').value;
        fetch(`/products/sort/${sort}`, {

                method: 'GET'
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                updateProductSection(data.products.data);
            })
            .catch(error => console.error('Error fetching data:', error));



    }

    function updateProductSection(products) {
    const row = document.querySelector('.section-space .row.mb-n4.mb-sm-n10.g-3.g-sm-6');
    row.innerHTML = ''; // Clear current products

    if (products && products.length > 0) {
        products.forEach(product => {
            const colDiv = document.createElement('div');
            colDiv.className = 'col-6 col-lg-4 mb-4 mb-sm-9';
            colDiv.innerHTML = `
                <div class="product-item">
                    <div class="product-thumb">
                        <a class="d-block" href="/product/${product.id}">
                            <img src="/storage/${product.image}" width="370" style="height: 450px" alt="${product.name}">
                        </a>
                    </div>
                    <div class="product-info">
                        <h4 class="title"><a href="/product/${product.id}">${product.name}</a></h4>
                        <div class="prices">
                            <span class="price">${product.price} SP</span>
                        </div>
                    </div>
                </div>
            `;
            row.appendChild(colDiv);
        });
    } else {
        const noProductsDiv = document.createElement('div');
        noProductsDiv.className = 'col-12';
        noProductsDiv.innerHTML = '<p>No products found.</p>';
        row.appendChild(noProductsDiv);
    }
}

</script>
