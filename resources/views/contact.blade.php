@extends('layouts.index.layout')
@section('css')
@endsection
@section('title')
{{ __('messages.Beauty') }}
@stop
@section('content')
    <main class="main-content" style="margin-top: 100px">

        <!--== Start Contact Area Wrapper ==-->
        <section class="contact-area">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-6 col-lg-6">
                        <div class="section-title position-relative">
                            <h2 class="title">{{ app()->getLocale() == 'ar' ? $contact->ar_contact_title : $contact->contact_title }}</h2>
                            <p class="m-0">{{ app()->getLocale() == 'ar' ? $contact->ar_contact_description : $contact->contact_description }}</p>
                            <div class="line-left-style mt-4 mb-1"></div>
                        </div>
                        <!--== Start Contact Form ==-->
                        {{-- <div class="contact-form">
                        <form id="contact-form" action="https://whizthemes.com/mail-php/raju/arden/mail.php" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="con_name" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" type="email" name="con_email" placeholder="Email address">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="con_message" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb-0">
                                        <button class="btn btn-sm" type="submit">SUBMIT</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> --}}
                        <!--== End Contact Form ==-->

                        <!--== Message Notification ==-->
                        <div class="form-message"></div>
                    </div>
                </div>
            </div>
            <div class="contact-left-img" data-bg-img="{{ URL::asset('storage/' . $contact->cover) }}"></div>
        </section>
        <!--== End Contact Area Wrapper ==-->

        <!--== Start Contact Area Wrapper ==-->
        <section class="section-space">
            <div class="container">
                @php
                    $links = json_decode($contact->links, true);
                @endphp
                    <div class="contact-info">


                        <div class="contact-info-item">
                            <img class="icon" src="assets/images/icons/1.webp" width="30" height="30"
                                alt="Icon">
                                @foreach ($links as $link)
                            <a href="tel://+11020303023">{{ $link['phone'] }}</a>
                            @endforeach
                        </div>
                        <div class="contact-info-item">
                            <img class="icon" src="assets/images/icons/2.webp" width="30" height="30"
                                alt="Icon">
                                @foreach ($links as $link)
                            <a href="mailto://example@demo.com">{{ $link['email'] }}</a>
                            @endforeach
                        </div>

                        <div class="contact-info-item mb-0">
                            <img class="icon" src="assets/images/icons/3.webp" width="30" height="30"
                                alt="Icon">
                            <p>{{ app()->getLocale() == 'ar' ? $contact->ar_location : $contact->location }}</p>
                        </div>
                    </div>

            </div>
        </section>
        <!--== End Contact Area Wrapper ==-->

        <div class="map-area">
            <iframe
    src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3272.4203392118843!2d35.944688045485925!3d34.86916759147084!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzTCsDUyJzE1LjYiTiAzNcKwNTYnNTUuMCJF!5e0!3m2!1sar!2s!4v1713255214053!5m2!1sar!2s"
    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
    referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div>

    </main>
    {{-- <section class="section sticky-content-sec">
        <div class="padding-80vh">
            <div class="container">
                <div data-w-id="b6c8c9fc-28bb-af6a-df76-66f3a77cf67d" class="large-title-block-1">
                    <div class="scolling-title">
                        <div class="_3d-block-for-text">
                            <h1 class="heading is-large-uppercase-title-1">Contact</h1>
                        </div>
                    </div>
                    <div class="scolling-image-1">
                        <div class="while-scrolling-effect-5rem">
                            <div class="image-animation-trigger-vertical">
                                <div class="parallax-animation">
                                    <div class="animation-color-bg"></div>
                                    <img src="{{ URL::asset('storage/' . $abouts->image) }}" loading="lazy"
                                        alt="Mancino - Beauty Webflow template" sizes="25vw"
                                        class="cover-image is-parallax" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="absolute-block">
                <div class="sticky-100vh-block">
                    <div data-w-id="b6c8c9fc-28bb-af6a-df76-66f3a77cf68a" class="bg-color-for-sticky-sec-1"></div>
                    <div class="image-animation-trigger-vertical">
                        <div class="header-4-bg-3"></div>
                        <div class="animation-color-bg is-purple-dark"></div>

                        <div data-poster-url="https://assets.website-files.com/63bab3c727acad36f05e17b8/63bab3c727acad088c5e1914_pexels-ron-lach-8141575-poster-00001.jpg"
                            data-video-urls="{{ URL::asset('storage/' . $abouts->video) }}

                    ,{{ URL::asset('storage/' . $abouts->video) }}"
                            data-autoplay="true" data-loop="true" data-wf-ignore="true"
                            class="cover-image w-background-video w-background-video-atom">
                            <video id="4c1a5808-3d1a-2c90-9f2d-535cd19e0047-video" autoplay="" loop=""
                                style="background-image: url(_https_/assets.website-files.com/63bab3c727acad36f05e17b8/63bab3c727acad088c5e1914_pexels-ron-lach-8141575-poster-00001.html);
                       "
                                muted="" playsinline="" data-wf-ignore="true" data-object-fit="cover">
                                <source src="{{ URL::asset('storage/' . $abouts->video) }}" data-wf-ignore="true" />
                                <source src="{{ URL::asset('storage/' . $abouts->video) }}" data-wf-ignore="true" />
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section with-purple-black-bg">
        <div class="container">
            <div class="padding less-paddings">
                <div class="vertical-flex with-gap-4em">
                    <div class="w-layout-grid content-grid-9">

                        @php
                            $features = json_decode($abouts->feature, true);
                        @endphp

                        @foreach ($features as $index => $feature)
                            <div class="content-grid-9-block">
                                <div class="elipse-container while-scrolling-effect-3rem">
                                    <div class="elipse with-animation">
                                        <div class="elipse-trigger">
                                            <div class="elipse-number" id="number-animation">{{ $index + 1 }}</div>
                                        </div>
                                        <div class="elipse is-2nd"></div>
                                        <div class="elipse is-3rd"></div>
                                    </div>
                                </div>
                                <div class="text-container while-scrolling-effect-1rem">
                                    <!-- Displaying the feature title -->
                                    <p class="content-grid-9-text-1">
                                        {{ $feature['title'] }}
                                    </p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section with-purple-black-bg">
        <div class="container">
            <div class="padding top-0em">
                <div class="w-layout-grid form-grid-1">
                    <div id="w-node-b6c8c9fc-28bb-af6a-df76-66f3a77cf693-a55e17db" class="form-content-block">
                        <div class="form-content">
                            <p data-w-id="b6c8c9fc-28bb-af6a-df76-66f3a77cf695" class="uppercase-title-light">
                                Contact
                            </p>
                            <h2 data-w-id="467da73f-e223-7f16-2fc8-a5f3e4bd326d"
                                class="heading is-extra-small-title is-normal">
                                {{ $contact->contact_title }}
                            </h2>
                            <p data-w-id="b6c8c9fc-28bb-af6a-df76-66f3a77cf699" class="content-text-4">
                                {{ $contact->contact_description }}
                            </p>
                        </div>
                    </div>
                    <div id="w-node-b6c8c9fc-28bb-af6a-df76-66f3a77cf69b-a55e17db" class="form-block-3">
                        <div class="form on-dark-bg w-form">
                            <form id="wf-form-Contact-form" name="wf-form-Contact-form" data-name="Contact form"
                                method="get" class="form-block on-dark-bg" data-wf-page-id="63bab3c727acad4ca55e17db"
                                data-wf-element-id="9c1a92f6-8753-8efd-89c0-9fd518613384">
                                <input type="text" class="form-field on-dark-bg w-input" maxlength="256"
                                    name="Name" data-name="Name" placeholder="Your name" id="Name"
                                    required="" /><input type="email" class="form-field on-dark-bg w-input"
                                    maxlength="256" name="Email" data-name="Email" placeholder="Your email"
                                    id="Email" required="" /><input type="tel"
                                    class="form-field on-dark-bg w-input" maxlength="256" name="Phone"
                                    data-name="Phone" placeholder="Your Phone" id="Phone" required="" /><input
                                    type="text" class="form-field on-dark-bg w-input" maxlength="256" name="Subject"
                                    data-name="Subject" placeholder="Subject" id="Form-Subject" />
                                <textarea id="Message" name="Message" maxlength="5000" data-name="Message" placeholder="Message"
                                    class="form-field is-text-area on-dark-bg w-input"></textarea><label class="w-checkbox checkbox-field">
                                    <div class="w-checkbox-input w-checkbox-input--inputType-custom checkbox"></div>
                                    <input type="checkbox" id="Subscribe-to-newsletter" name="Subscribe-to-newsletter"
                                        data-name="Subscribe to newsletter"
                                        style="opacity: 0; position: absolute; z-index: -1" /><span
                                        class="checkbox-label w-form-label" for="Subscribe-to-newsletter">I want to
                                        subscribe to a newsletter</span>
                                </label><label class="w-checkbox checkbox-field">
                                    <div class="w-checkbox-input w-checkbox-input--inputType-custom checkbox"></div>
                                    <input type="checkbox" id="Terms-and-conditions" name="Terms-and-conditions"
                                        data-name="Terms and conditions" required=""
                                        style="opacity: 0; position: absolute; z-index: -1" /><span
                                        class="checkbox-label w-form-label" for="Terms-and-conditions">I agree to the
                                        terms and conditions</span>
                                </label><input type="submit" value="Submit the message" data-wait="Sending..."
                                    class="form-submit-button w-button" />
                            </form>
                            <div class="form-success-message-1 w-form-done">
                                <div class="form-success-title">Sent!</div>
                                <p>Thank you for your interest.</p>
                            </div>
                            <div class="form-error-message w-form-fail">
                                <p class="form-error-paragraph">
                                    An error has occurred somewhere and it is not possible
                                    to submit the form. Please try again later.<a href="#"
                                        class="form-error-link"></a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section overflow-visible">
        <div class="container is-content-grid-2">
            <div class="padding is-content-grid-2">
                <div class="w-layout-grid content-grid-2">
                    <div class="grid-2-block-3">
                        <div class="grid-2-image">
                            <div class="image-animation-trigger-vertical">
                                <div class="parallax-animation">
                                    <div class="animation-color-bg is-green-light"></div>
                                    <img src="{{ URL::asset('storage/' . $contact->cover) }}" loading="lazy"
                                        alt="Image description" class="cover-image is-parallax">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid-2-block-6">
                        @php
                            $links = json_decode($contact->links, true);
                        @endphp
                        @foreach ($links as $link)
                            <div class="contact-card">
                                <p class="contact-title-1">{{ $link['name'] }}</p>
                                <div class="contact-links">
                                    <a href="tel:{{ $link['phone'] }}" class="contact-link">{{ $link['phone'] }}</a>
                                    <a href="mailto:{{ $link['email'] }}" class="contact-link">{{ $link['email'] }}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
