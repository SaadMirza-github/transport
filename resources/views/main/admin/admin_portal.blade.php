@include('partials.mainsite_pages.return_function')
@extends('layouts.mainsite')

@section('template_title')
    Admin portal
    @endsection

    @section('content')


<style>
    /* CSS reset */
    *,
    *::after,
    *::before {
        box-sizing: inherit;
        margin: 0;
        padding: 0;
    }

    .header_show{
        cursor: pointer;
    }
    html { font-size: 62.5%; }

    body {
        box-sizing: border-box;
        font-family: 'Open Sans', sans-serif;
        position: relative;
        background-image: linear-gradient(to right, rgb(113, 219, 255), rgb(255, 255, 255), rgb(44, 157, 226));
        /*background: linear-gradient( 135deg, #43CBFF 10%, #9708CC 100%);*/
        /*box-shadow: 2px 2px #9E9E9E;*/
    }

    /* Typography =======================*/

    /* Headings */

    /* Main heading for card's front cover */
    .card-front__heading {
        font-size: 21px;
        margin-top: .25rem;
    }

    /* Main heading for inside page */
    .inside-page__heading {
        padding-bottom: 1rem;
        width: 100%;
    }

    /* Mixed */

    /* For both inside page's main heading and 'view me' text on card front cover */
    .inside-page__heading,
    .card-front__text-view {
        font-size: 1.3rem;
        font-weight: 800;
        margin-top: .2rem;
    }

    .inside-page__heading--city,
    .card-front__text-view--city { color: #ff62b2; }

    .inside-page__heading--ski,
    .card-front__text-view--ski { color: #2aaac1; }

    .inside-page__heading--beach,
    .card-front__text-view--beach { color: #fa7f67; }

    .inside-page__heading--camping,
    .card-front__text-view--camping { color: #00b97c; }

    /* Front cover */

    .card-front__tp { color: #fafbfa; }

    /* For pricing text on card front cover */
    .card-front__text-price {
        font-size: 1.2rem;
        margin-top: -.2rem;
    }

    /* Back cover */

    /* For inside page's body text */
    .inside-page__text {
        color: #333;
        font-size: 11px;
    }

    /* Icons ===========================================*/

    .card-front__icon {
        fill: #fafbfa;
        font-size: 3vw;
        height: 3.25rem;
        margin-top: -.5rem;
        width: 3.25rem;
    }

    /* Buttons =================================================*/

    .inside-page__btn {
        background-color: transparent;
        border: 3px solid;
        border-radius: .5rem;
        font-size: 1.2rem;
        font-weight: 600;
        margin-top: 2rem;
        overflow: hidden;
        padding: .7rem .75rem;
        position: relative;
        text-decoration: none;
        transition: all .3s ease;
        width: 90%;
        z-index: 10;
    }

    .inside-page__btn::before {
        content: "";
        height: 100%;
        left: 0;
        position: absolute;
        top: 0;
        transform: scaleY(0);
        transition: all .3s ease;
        width: 100%;
        z-index: -1;
    }

    .inside-page__btn--city {
        border-color: #ff40a1;
        color: #ff40a1;
    }

    .inside-page__btn--city::before {
        background-color: #ff40a1;
    }

    .inside-page__btn--ski {
        border-color: #279eb2;
        color: #279eb2;
    }

    .inside-page__btn--ski::before {
        background-color: #279eb2;
    }

    .inside-page__btn--beach {
        border-color: #fa7f67;
        color: #fa7f67;
    }

    .inside-page__btn--beach::before {
        background-color: #fa7f67;
    }

    .inside-page__btn--camping {
        border-color: #00b97d;
        color: #00b97d;
    }

    .inside-page__btn--camping::before {
        background-color: #00b97d;
    }

    .inside-page__btn:hover {
        color: #fafbfa;
    }

    .inside-page__btn:hover::before {
        transform: scaleY(1);
    }

    /* Layout Structure=========================================*/

    .main {

        display: flex;
        flex-direction: column;
        justify-content: center;
        height: 100vh;
        width: 100%;
    }

    /* Container to hold all cards in one place */
    .card-area {
        align-items: center;
        display: flex;
        flex-wrap: nowrap;
        height: 100%;
        justify-content: space-evenly;
        padding: 1rem;
    }

    /* Card ============================================*/

    /* Area to hold an individual card */
    .card-section {
        /*align-items: center;*/
        display: flex;
        height: 100%;
        justify-content: center;
        width: 100%;
    }

    /* A container to hold the flip card and the inside page */
    .card {
        background-color: rgba(0,0,0, .05);
        box-shadow: -.1rem 1.7rem 6.6rem -3.2rem rgba(0,0,0,0.5);
        height: 15rem;
        position: relative;
        transition: all 1s ease;
        width: 15rem;
    }

    /* Flip card - covering both the front and inside front page */

    /* An outer container to hold the flip card. This excludes the inside page */
    .flip-card {
        height: 15rem;
        perspective: 100rem;
        position: absolute;
        right: 0;
        transition: all 1s ease;
        visibility: hidden;
        width: 15rem;
        z-index: 100;
    }

    /* The outer container's visibility is set to hidden. This is to make everything within the container NOT set to hidden  */
    /* This is done so content in the inside page can be selected */
    .flip-card > * {
        visibility: visible;
    }

    /* An inner container to hold the flip card. This excludes the inside page */
    .flip-card__container {
        height: 100%;
        position: absolute;
        right: 0;
        transform-origin: left;
        transform-style: preserve-3d;
        transition: all 1s ease;
        width: 100%;
    }

    .card-front,
    .card-back {
        backface-visibility: hidden;
        height: 100%;
        left: 0;
        position: absolute;
        top: 0;
        width: 100%;
    }

    /* Styling for the front side of the flip card */

    /* container for the front side */
    .card-front {
        background-color: #fafbfa;
        height: 15rem;
        width: 20rem;
    }

    /* Front side's top section */
    .card-front__tp {
        align-items: center;
        clip-path: polygon(0 0, 100% 0, 100% 90%, 57% 90%, 50% 100%, 43% 90%, 0 90%);
        display: flex;
        flex-direction: column;
        height: 12rem;
        justify-content: center;
        padding: .75rem;
    }

    .card-front__tp--city {
        background: linear-gradient( 135deg, #43CBFF 10%, #9708CC 100%);
    }

    .card-front__tp--ski {
        background: linear-gradient(
                to bottom,
                #47c2d7,
                #279eb2
        );
    }

    .card-front__tp--beach {
        background: linear-gradient(
                to bottom,
                #fb9b88,
                #f86647
        );
    }

    .card-front__tp--camping {
        background: linear-gradient(
                to bottom,
                #00db93,
                #00b97d
        );
    }

    /* Front card's bottom section */
    .card-front__bt {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    /* Styling for the back side of the flip card */

    .card-back {
        background-color: #fafbfa;
        transform: rotateY(180deg);
    }

    /* Specifically targeting the <video> element */
    .video__container {
        clip-path: polygon(0% 0%, 100% 0%, 90% 50%, 100% 100%, 0% 100%);
        height: auto;
        min-height: 100%;
        object-fit: cover;
        width: 100%;
    }

    /* Inside page */

    .inside-page {
        background-color: #fafbfa;
        box-shadow: inset 20rem 0px 5rem -2.5rem rgba(0,0,0,0.25);
        height: 100%;
        padding: 1rem;
        position: absolute;
        right: 0;
        transition: all 1s ease;
        width: 15rem;
        z-index: 1;
    }

    .inside-page__container {
        align-items: center;
        display: flex;
        flex-direction: column;
        height: 100%;
        text-align: center;
        width: 100%;
    }

    /* Functionality ====================================*/

    /* This is to keep the card centered (within its container) when opened */
    .card:hover {
        box-shadow:
                -.1rem 1.7rem 6.6rem -3.2rem rgba(0,0,0,0.75);
        width: 30rem;
    }

    /* When the card is hovered, the flip card container will rotate */
    .card:hover .flip-card__container {
        transform: rotateY(-180deg);
    }

    /* When the card is hovered, the shadow on the inside page will shrink to the left */
    .card:hover .inside-page {
        box-shadow: inset 1rem 0px 5rem -2.5rem rgba(0,0,0,0.1);
    }

    /* Footer ====================================*/

    .footer {
        background-color: #333;
        margin-top: 3rem;
        padding: 1rem 0;
        width: 100%;
    }

    .footer-text {
        color: #fff;
        font-size: 1.2rem;
        text-align: center;
    }
    .inside-page__heading{
        font-size: 19px;
    }
    .profile-dropdown.show .dropdown-menu[x-placement^="bottom"] {
        left: -11px !important;
    }
    .profile_style{
        margin-left: -87px !important;
    }
</style>
<div class="header_show ">
    <center>
        <i class="fa fa-caret-down " style="font-size: 56px;"></i>
    </center>
</div>
<ul class="breadcrumb">
    <li><a href="./dashboard">Home</a></li>
    <li><a>Admin Portal</a></li>
</ul>
@php
$phoneaccess=explode(',',Auth::user()->emp_access_phone);
@endphp
<div class="container-fluid">
    <main class="main">
        <section class="card-area" style="padding-top: 0px;margin-top: 0px;padding-bottom: 0px;margin-bottom: 0px;height: 30% !important; ">
         @if(in_array("25", $phoneaccess))
            <section class="card-section">
                <div class="card">
                    <div class="flip-card">
                        <div class="flip-card__container">
                            <div class="card-front">
                                <div class="card-front__tp card-front__tp--city">


                                    <h2 class="card-front__heading">

                                        <i style="font-size:29px; color:white !important" class="fa">&#xf155;</i> Earning
                                    </h2>
                                    <p class="card-front__text-price">

                                    </p>
                                </div>

                                <div class="card-front__bt">
                                    <p class="card-front__text-view card-front__text-view--city">
                                        View me
                                    </p>
                                </div>
                            </div>
                            <div class="card-back">
                                <video class="video__container" autoplay muted loop>
                                    <source class="video__media" src="https://static.videezy.com/system/resources/previews/000/038/067/original/dollar_money_2.mp4" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>

                    <div class="inside-page">
                        <div class="inside-page__container">
                            <h1 class="inside-page__heading inside-page__heading--city">
                                Earning
                            </h1>
                            <p class="inside-page__text" style="font-size: 10px">
                                20-Month-21 To 19-month-21                            </p>
                            <a href="/earning" target="_blank" class="inside-page__btn inside-page__btn--city p-0">View</a>
                        </div>
                    </div>
                </div>
            </section>
          @endif
          @if(in_array("26", $phoneaccess))
            <section class="card-section">
                <div class="card">
                    <div class="flip-card">
                        <div class="flip-card__container">
                            <div class="card-front">
                                <div class="card-front__tp card-front__tp--city">


                                    <h2 class="card-front__heading">

                                        <i style="font-size:29px;color:white !important" class="fa fa-file"></i> Quotes
                                    </h2>
                                    <p class="card-front__text-price">

                                    </p>
                                </div>

                                <div class="card-front__bt">
                                    <p class="card-front__text-view card-front__text-view--city">
                                        View me
                                    </p>
                                </div>
                            </div>
                            <div class="card-back">
                                <video class="video__container" autoplay muted loop>
                                    <source class="video__media" src="https://static.videezy.com/system/resources/previews/000/043/705/original/et1.mp4" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>

                    <div class="inside-page">
                        <div class="inside-page__container">
                            <h3 class="inside-page__heading inside-page__heading--city">
                                Quotes
                            </h3>
                            <p class="inside-page__text">
                                New/Delivered ratio
                            </p>
                            <a href="/quotes" target="_blank" class="inside-page__btn inside-page__btn--city">View</a>
                        </div>
                    </div>
                </div>
            </section>
           @endif
           @if(in_array("27", $phoneaccess))
            <section class="card-section">
                <div class="card">
                    <div class="flip-card">
                        <div class="flip-card__container">
                            <div class="card-front">
                                <div class="card-front__tp card-front__tp--city">


                                    <h2 class="card-front__heading">

                                        <i style="font-size:29px;color:white !important" class="fa fa-star"></i> Reviews
                                    </h2>
                                    <p class="card-front__text-price">

                                    </p>
                                </div>

                                <div class="card-front__bt">
                                    <p class="card-front__text-view card-front__text-view--city">
                                        View me
                                    </p>
                                </div>
                            </div>
                            <div class="card-back">
                                <video class="video__container" autoplay muted loop>
                                    <source class="video__media" src="https://static.videezy.com/system/resources/previews/000/020/631/original/Infographics_Premiere_Pro_Mogrt_Template_03_Preview.mp4" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>

                    <div class="inside-page">
                        <div class="inside-page__container">
                            <h3 class="inside-page__heading inside-page__heading--city">
                                Reviews
                            </h3>
                            <p class="inside-page__text">
                                Customers Reviews                         </p>
                            <a href="/review" target="_blank" class="inside-page__btn inside-page__btn--city">View</a>
                        </div>
                    </div>
                </div>
            </section>
           @endif
        </section>
        @if(in_array("28", $phoneaccess))
        <section class="card-area" style="padding-top: 0px;margin-top: 0px;padding-bottom: 0px;margin-bottom: 0px;height: 50% !important;margin-left: -8px;">
            <section class="card-section" style="padding-top: 0px;margin-top: 0px;padding-bottom: 0px;margin-bottom: 0px;">
                <div class="card">
                    <div class="flip-card">
                        <div class="flip-card__container">
                            <div class="card-front">
                                <div class="card-front__tp card-front__tp--city">


                                    <h2 class="card-front__heading">

                                        <i style="font-size:29px;color:white !important" class="fa fa-bar-chart"></i> Performance
                                    </h2>
                                    <p class="card-front__text-price">

                                    </p>
                                </div>

                                <div class="card-front__bt">
                                    <p class="card-front__text-view card-front__text-view--city">
                                        View me
                                    </p>
                                </div>
                            </div>
                            <div class="card-back">
                                <video class="video__container" autoplay muted loop>
                                    <source class="video__media" src="https://static.videezy.com/system/resources/previews/000/055/208/original/4K-194.mp4" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>

                    <div class="inside-page">
                        <div class="inside-page__container">
                            <h3 class="inside-page__heading inside-page__heading--city">
                                Performance
                            </h3>
                            <p class="inside-page__text">
                                Customers Performance                         </p>
                            <a href="/performance" target="_blank" class="inside-page__btn inside-page__btn--city">View</a>
                        </div>
                    </div>
                </div>
            </section>
           @endif
          @if(in_array("29", $phoneaccess))
            <section class="card-section" style="padding-top: 0px;margin-top: 0px;padding-bottom: 0px;margin-bottom: 0px;margin-left:-34% ">
                <div class="card">
                    <div class="flip-card">
                        <div class="flip-card__container">
                            <div class="card-front">
                                <div class="card-front__tp card-front__tp--city">
                                    <h2 class="card-front__heading">
                                        <i style="font-size:29px;color:white !important" class="fa fa-line-chart"></i> QA Portal
                                    </h2>
                                    <p class="card-front__text-price">
                                    </p>
                                </div>
                                <div class="card-front__bt">
                                    <p class="card-front__text-view card-front__text-view--city">
                                        View me
                                    </p>
                                </div>
                            </div>
                            <div class="card-back">
                                <video class="video__container" autoplay muted loop>
                                    <source class="video__media" src="https://static.videezy.com/system/resources/previews/000/055/208/original/4K-194.mp4" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>

                    <div class="inside-page">
                        <div class="inside-page__container">
                            <h3 class="inside-page__heading inside-page__heading--city">
                                QA Portal
                            </h3>
                            <p class="inside-page__text">Performance</p>
                            <a href="/qa_portal" target="_blank" class="inside-page__btn inside-page__btn--city">View</a>
                        </div>
                    </div>
                </div>
            </section>
            @endif

        </section>
    </main>
</div>


@endsection

@section('extraScript')

    <script>
        $(document).ready(function(){
                $(".demo_changer").hide();
        });

    </script>
@endsection
