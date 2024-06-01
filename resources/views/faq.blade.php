@extends('layouts.index.layout')
<style>
    /* RTL specific styles */
/* Ensure the direction is RTL */
[dir="rtl"] .accordion-button {
    display: flex;
    justify-content: space-between; /* Aligns content to the start, which is the right in RTL */
    flex-direction: row; /* Reverses the order, putting icon to the left */
}

[dir="rtl"] .accordion-button::after {
    margin-left: 0; /* Pushes the icon to the far left */
    margin-right: auto; /* Reset any right margin if existing */
}


</style>
@section('content')
<main class="main-content">
    <!--== Start Page Header Area Wrapper ==-->
    <nav aria-label="breadcrumb" class="breadcrumb-style1">
        <div class="container">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item">
                    <a href="{{route('main')}}">{{ __('messages.home') }}</a>
                    @if (app()->getLocale() == 'ar')

                    <span>&rlm;/</span>
                    @endif
                </li>
                <li class="breadcrumb-item active" aria-current="page"> {{ __('messages.FAQ') }}</li>
            </ol>
        </div>
    </nav>

    <!--== Start Faq Area Wrapper ==-->
    <section class="faq-area">
        <div class="container">
            <div class="row flex-xl-row-reverse">
                <div class="col-lg-6 col-xl-7">
                    <div class="faq-thumb">
                        <img src="{{ URL::asset('assets/images/FAQ.jpg') }}" width="601" style="height: 400px; margin-bottom:20px;" height="368" alt="Image">
                    </div>
                </div>
                <div class="col-lg-6 col-xl-5">
                    <div class="faq-content">
                        <div class="faq-text-img"><img src="assets/images/photos/faq.webp" width="199" height="169" alt="Image"></div>
                        <h2 class="faq-title">{{__('messages.Frequently_Questions')}}</h2>
                        <div class="faq-line"></div>
                        {{-- <p class="faq-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem has been the industry's standard</p> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="accordion" id="FaqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                    <p class="accordion-text">{{__('messages.Q1')}}</p>
                                </button>
                            </h2>
                            <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="heading1" data-bs-parent="#FaqAccordion">
                                <div class="accordion-body">
                                    <p>{{__('messages.A1')}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                    {{__('messages.Q2')}}
                                </button>
                            </h2>
                            <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#FaqAccordion">
                                <div class="accordion-body">
                                    <p>{{__('messages.A2')}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                    {{__('messages.Q3')}}
                                </button>
                            </h2>
                            <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#FaqAccordion">
                                <div class="accordion-body">
                                    <p>{{__('messages.A3')}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                    {{__('messages.Q4')}}
                                </button>
                            </h2>
                            <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#FaqAccordion">
                                <div class="accordion-body">
                                    <p>{{__('messages.A4')}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading5">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                    {{__('messages.Q5')}}
                                </button>
                            </h2>
                            <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="heading5" data-bs-parent="#FaqAccordion">
                                <div class="accordion-body">
                                    <p>{{__('messages.A5')}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading6">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                                    {{__('messages.Q6')}}
                                </button>
                            </h2>
                            <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="heading6" data-bs-parent="#FaqAccordion">
                                <div class="accordion-body">
                                    <p>{{__('messages.A6')}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading7">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                                    {{__('messages.Q7')}}
                                </button>
                            </h2>
                            <div id="collapse7" class="accordion-collapse collapse" aria-labelledby="heading7" data-bs-parent="#FaqAccordion">
                                <div class="accordion-body">
                                    <p>{{__('messages.A7')}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading8">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                                    {{__('messages.Q8')}}
                                </button>
                            </h2>
                            <div id="collapse8" class="accordion-collapse collapse" aria-labelledby="heading8" data-bs-parent="#FaqAccordion">
                                <div class="accordion-body">
                                    <p>{{__('messages.A8')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Faq Area Wrapper ==-->

</main>
@endsection
