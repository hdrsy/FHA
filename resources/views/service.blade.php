@extends('layouts.index.master')
@section('css')
@endsection
@section('title')
{{__('messages.Beauty')}}
@stop
@section('content')
    <header data-w-id="6ee38662-1f92-0872-549e-283e42272700" class="header-7">
        <div class="header-7-flex">
            <div class="header-7-content">
                <div class="_3d-block-for-text">
                    <p data-w-id="6ee38662-1f92-0872-549e-283e42272704" class="uppercase-title-dark">
                        Service
                    </p>
                </div>
                <div class="_3d-block-for-text">
                    <h1 data-w-id="6ee38662-1f92-0872-549e-283e42272707" class="heading is-header-4-title-1">
                        {{ app()->getLocale() == 'ar' ? $service->ar_name : $service->name }}
                    </h1>
                </div>
                <div class="_3d-block-for-text">
                    <div data-w-id="25fa98ae-5ab3-7449-c4cf-7c2529ceb0ac">
                        <a href="#discover" data-w-id="6e867e74-f6b6-f9d4-4f80-2b500ab7e4fc"
                            class="main-circle-button w-inline-block">
                            <div class="circle-button-content">
                                <p class="circle-button-text-1">Discover</p>
                            </div>
                            <img src="{{ Storage::url($service->avatar) }}" loading="lazy" alt=""
                                class="circle-button-icon-1" />
                            <div class="circle-button-border-1"></div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="header-7-image-1">
                <div class="while-scrolling-effect-5rem">
                    <div class="image-animation-trigger-vertical">
                        <div class="parallax-animation-medium">
                            <div class="animation-color-bg"></div>
                            <img loading="lazy" alt="Makeup application" src="{{ Storage::url($service->video_cover) }}"
                                sizes="(max-width: 479px) 76vw, (max-width: 767px) 73vw, (max-width: 991px) 588px, (max-width: 1439px) 49vw, (max-width: 1919px) 686px, 784px"
                                class="cover-image is-parallax-medium" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-absolute-video">
            <div class="video-sticky-block">
                <div class="image-animation-trigger-vertical">
                    <div class="header-4-bg-3"></div>
                    <div class="animation-color-bg is-purple-dark"></div>
                    <div data-poster-url="https://assets.website-files.com/63971da05572a3765487f270/63977dbb038b4262107aff5c_pexels-karolina-grabowska-7305582-poster-00001.jpg"
                        data-video-urls="https://assets.website-files.com/63bab3c727acad36f05e17b8/63bab3c727acadacc25e18b8_pexels-karolina-grabowska-7305582-transcode.mp4,https://assets.website-files.com/63bab3c727acad36f05e17b8/63bab3c727acadacc25e18b8_pexels-karolina-grabowska-7305582-transcode.webm"
                        data-autoplay="true" data-loop="true" data-wf-ignore="true"
                        class="video-background w-background-video w-background-video-atom">
                        <video id="cde2ff33-5900-dd8c-7442-8ad3c47be047-video" autoplay="" loop=""
                            style="
            background-image: url(_https_/assets.website-files.com/63971da05572a3765487f270/63977dbb038b4262107aff5c_pexels-karolina-grabowska-7305582-poster-00001.html);
          "
                            muted="" playsinline="" data-wf-ignore="true" data-object-fit="cover">
                            <source src="{{ Storage::url($service->avatar) }}" data-wf-ignore="true" />
                            <source src="{{ Storage::url($service->avatar) }}" data-wf-ignore="true" />
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section id="discover" class="section with-purple-black-bg">
        <div class="container is-full-width">
            <div class="padding">
                <div class="vertical-flex with-gap-8em">
                    @if ($service->reviews)
                        @foreach ($service->reviews as $feature)
                            <div class="w-layout-grid content-grid-3">
                                <div id="w-node-ce22b1fe-2b6c-9ced-3cd7-5b18eee4e934-685e17e5" class="block-with-elipse">
                                    <div id="w-node-ce22b1fe-2b6c-9ced-3cd7-5b18eee4e935-685e17e5"
                                        class="content-grid-3-image">
                                        <div class="_3d-block">
                                            <div class="_3d-trigger">
                                                <div class="image-animation-trigger">
                                                    <div class="parallax-animation">
                                                        <div class="animation-color-bg is-purple-dark"></div>
                                                        <img loading="lazy" alt="Makeup application"
                                                            src="{{ URL::asset('ecommerce/imgs/63bab3c727acad1be85e17ec/63bab3c727acad887d5e1a20_pexels-gustavo-fring-3985323.jpg') }}"
                                                            sizes="(max-width: 479px) 92vw, (max-width: 1919px) 100vw, 1980px"
                                                            class="cover-image is-parallax" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-w-id="18ca1418-b522-97aa-89dc-addea8c7841b" class="elipse-bg">
                                        <div data-w-id="18ca1418-b522-97aa-89dc-addea8c7841c" class="elipse-bg is-2nd">
                                        </div>
                                        <div data-w-id="18ca1418-b522-97aa-89dc-addea8c7841d"
                                            class="elipse-bg is-2nd is-left">
                                        </div>
                                        <div data-w-id="18ca1418-b522-97aa-89dc-addea8c7841e" class="elipse-bg is-3rd">
                                        </div>
                                        <div data-w-id="18ca1418-b522-97aa-89dc-addea8c7841f"
                                            class="elipse-bg is-3rd is-left">
                                        </div>
                                    </div>
                                </div>
                                <div id="w-node-ce22b1fe-2b6c-9ced-3cd7-5b18eee4e93d-685e17e5"
                                    class="content-grid-3-block-1">
                                    <div class="while-scrolling-effect-3rem">
                                        <div class="elipse with-animation">
                                            <div class="elipse-trigger">
                                                <img src="{{ URL::asset('ecommerce/imgs/service/63bab3c727acad36f05e17b8/63bab3c727acaddbe05e1932_star-fill0-wght400-grad0-opsz48.svg') }}"
                                                    loading="lazy" alt="" class="circle-1-icon" />
                                            </div>
                                            <div data-w-id="ce22b1fe-2b6c-9ced-3cd7-5b18eee4e942" class="elipse is-2nd">
                                            </div>
                                            <div data-w-id="ce22b1fe-2b6c-9ced-3cd7-5b18eee4e943" class="elipse is-3rd">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="while-scrolling-effect-3rem">
                                        <h3 data-w-id="ce22b1fe-2b6c-9ced-3cd7-5b18eee4e945"
                                            class="heading is-small-title">
                                            {{ app()->getLocale() == 'ar' ? $feature['ar_name'] : $feature['name'] }}
                                        </h3>
                                    </div>
                                    <div class="while-scrolling-effect-1rem">
                                        <p data-w-id="ce22b1fe-2b6c-9ced-3cd7-5b18eee4e948" class="content-grid-3-text-2">
                                            {{ app()->getLocale() == 'ar' ? $feature['ar_comment'] : $feature['comment'] }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>


    </section>

@endsection
