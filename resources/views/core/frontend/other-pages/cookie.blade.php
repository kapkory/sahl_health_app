@extends('layouts.sahl')
@section('styles')

    <style>
        .bg-dark-myimg{
            background-image: url("{{ url('sahl/assets/image/about.jpg') }}") !important;
        }

        @media screen and (max-width: 767px) {
            .mb_about {
                margin-top: 10px !important;
            }
        }
        @media screen and (min-width: 768px) {
            .mb_about {
                margin-top: -110px !important;
            }
        }
        .h_style{
            color: #335062;
            border-bottom: 1px solid #335062;
            margin-bottom: 15px;
            font-weight: 400;
        }
    </style>

@endsection
@section('content')
    <div class="container-fluid bg-dark-myimg pb-md-5 mb-md-5 ">
        <div class="col-md-10 mx-auto">
            <div class="container py-md-5">
                <div class="rounded">
                    <div class="row py-4">
                        <div class="col-md-8 pt-md-3 mt-md-3">

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="background-color: white">
        <div class="container-fluid">
            <div class="col-10 offset-1">
                <div class="pd-content">
                    <h2 class="p-2" style="text-transform: capitalize; color: #335062">Cookie Policy</h2>
                    <p>
                        Your privacy is important to Sahl Health. This cookie policy (the "Policy") explains what cookies are and how we use them on Sahl Health website (www.sahlhealth.com) and dependent pages like the portal (the "Site"). It supplements our Privacy Statement which you can find here. By using our Site, you are agreeing that we can use cookies in accordance with this policy.<br>
                        In this Cookie Policy, we refer to Sahl Health, Inc.

                    </p>

                    <h3 class="h_style" style="">
                        What are cookies?
                    </h3>
                    <p>
                        A cookie is a data element that a website can send to your browser, which may then be stored on your computer's operating system.
                    </p>

                    <h3 class="h_style" style="">
                        Categories of Cookies
                    </h3>
                    <p>
                        On websites, cookies are typically used for different purposes, for example:
                    </p>
                    <ul style="list-style-type: disc">
                        <li>Performance – Performance cookies allow webmasters to count visits and web traffic sources to measure and improve the performance of their sites. They help webmasters to know which pages are the most and least popular and see how visitors move around the site. All information these cookies collect is aggregated and therefore anonymous.</li>
                        <li>Essential/Strictly Necessary – These cookies are necessary for the website to function and cannot be switched off. They are usually only set in response to actions made by individual site visitors which amount to a request for services, such as setting their privacy preferences, logging in or filling in forms.</li>
                        <li>Advertising/Targeting – These cookies are typically set by the webmaster's advertising partners. They may be used by those companies to build a profile of a site visitor's interests and show them relevant advertisements on other sites. They do not store directly personal information, but are based on uniquely identifying their browsers and internet devices. If you as a website visitor do not allow these cookies, you will experience less targeted advertising.</li>
                        <li>Functional – Functional cookies enable the website to provide enhanced functionality and personalization. They may be set by the owner of the website or by third-party providers whose services the website owner has added to its pages. If a site visitor does not allow these cookies, then some or all of these services may not function properly.</li>
                        <li>Customization – These cookies collect information that is used either in aggregate form to help webmasters understand how their websites are being used or how effective their marketing campaigns are, or to help them customize their websites and applications for site visitors in order to enhance their experience.</li>
                    </ul>



                    <h3 class="h_style" style="">
                        Source of Cookies
                    </h3>

                    <ul>
                        <li>First Parties – First party cookies are set by the site itself and can only be read by a particular local site. They are commonly used for the functionality of a site (e.g., an e-commerce shopping cart).</li>
                        <li>Customization – Cookies set by third parties can be tracking or marketing companies (e.g. advertising networks). These cookies get re-read during visits to other sites if the visited sites do business with these tracking/marketing companies.</li>
                    </ul>


                    <h3 class="h_style" style="">
                        How do you use cookies?
                    </h3>
                    <p>
                        Like most online services, Sahl Health uses cookies, including:
                    </p>
                    <ul>
                        <li>Performance cookies: We use several types of third-party cookies to improve the performance of the Site and hence the user experience when you are visiting our Site and/or applications. We use these cookies, for example, to count visits and traffic sources on the Site or to understand the site visitor's interaction with the Site.</li>
                        <li>Essential and functional cookies: We use several types of first- and third-party cookies to provide essential features as well as functional enhancements on our Site and/or applications, for instance to facilitate contact form processing or the log-in to your account.</li>
                        <li>Targeting cookies: We use several types of third-party cookies to provide relevant and personalized marketing information about our products, and to determine whether certain product updates or upgrade offers are warranted.</li>
                    </ul>
                    All browser cookies we use are encrypted.

                    <h3 class="h_style" style="">
                        How to control cookies?
                    </h3>
                    <p>
                        Generally, you may browse the Site and/or our applications without providing any Personally Identifiable Information. However, we ask that you provide information at various times and locations through the Site. This section sets out what Personally Identifiable Information we may collect from you when you use our services:
                    </p>

                    <h3 class="h_style" style="">
                        Source of Cookies
                    </h3>
                    You can control and/or delete several types of cookies as you wish – for details, please see <a href="www.aboutcookies.org">www.aboutcookies.org</a>.
                    <br>For example, you can set your browser to notify you when you receive a cookie, giving you the chance to decide whether to accept it. You can further delete all cookies that are already on your computer and you can set most browsers to prevent them from being placed.
                    <br>If you do this, however, you may have to manually adjust some preferences every time you visit a site and some services and functionalities may not work.
                    For further information on third-party cookies placed by Google services, please review our <a href="{{ url('privacy-policy')}}">Privacy Statement</a>.<br>
                    <strong class="text-center">Date last modified: July 2019</strong>

                </div>
            </div>
        </div>
    </div>



@endsection
