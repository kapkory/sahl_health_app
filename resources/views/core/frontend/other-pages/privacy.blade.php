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
                    <h2 class="p-2" style="text-transform: capitalize; color: #335062">Privacy Statement</h2>
                    <h4 class="p-2" style="text-transform: capitalize; color: #335062">Sahl Health Inc. Privacy Statement</h4>
                    <p>
                        In this Privacy Statement, "Sahl Health or "we" refers to Sahl Health, Inc.
                    </p>

                    <h3 class="h_style" style="">
                        What is this document?
                    </h3>
                    <p>
                        This Privacy Statement describes what personally identifiable information you can share with us on this website (the "Site") or any other mobile and related services (e.g., your date of birth or some aspect of your medical condition), how that information is stored, how we use that information, and what information other members, partners and doctors can see when they use Sahl Health system. For a description of our services please read our Terms of Use.
                        <br>For the purpose of this Privacy Statement, "Personally Identifiable Information" means any information that, by itself or in combination with other information, identifies or can reasonably be used to identify an individual, such as their name, email address, telephone number, address, or date of birth. Personally Identifiable Information does not include information that is anonymized, or publicly available information that has not been combined with non-public Personally Identifiable Information.
                        Sahl Health complies with the EU-U.S. Privacy Shield Framework and/or the Swiss-U.S. Privacy Shield Framework(s), as set forth by the U.S. Department of Commerce regarding the collection, use, and retention of personal information transferred from the European Union and/or Switzerland, to the United States. If there is any conflict between the terms in this privacy policy and the Privacy Shield Principles, the Privacy Shield Principles shall govern. To learn more about the Privacy Shield program, visit <a href="https://www.privacyshield.gov/" target="_blank">Privacy Shield</a>
                    </p>

                    <h3 class="h_style" style="">
                        Why should I read this Privacy Statement?
                    </h3>
                    <p>
                        When you sign up for or use Sahl Health system, we ask you to confirm that you've read and agree to our Privacy Statement. This means that by submitting Personally Identifiable Information and other information to the Site,<b> you consent to the collection, use, and disclosure of such information as set out in this Privacy Statement.</b>
                    </p>

                    <h3 class="h_style" style="">
                        What information do we collect?
                    </h3>
                    <p>
                        Generally, you may browse the Site and/or our applications without providing any Personally Identifiable Information. However, we ask that you provide information at various times and locations through the Site. This section sets out what Personally Identifiable Information we may collect from you when you use our services:
                    </p>


                    <h3 class="h_style" style="">
                        Information stored on your profile
                    </h3>
                    <p>
                        We collect information you provide when you sign up as a general Sahl Health member, including your name, email address, mobile number , country, state and month & year of birth.

                    </p>

                    <h3 class="h_style" style="">
                        Information provided on Sahl Health portal
                    </h3>
                    <p>
                        If you decide to sign up for Sahl Health Services, we ask you to provide additional information you can add optional health information to your Sahl Profile ("Profile"), for example personal information, health goals, ratings, conditions, and other information, which helps to personalize your experience. You choose what health information to add to your Profile when using sahl health system and adding information into your Profile, including payment information. For more information on Sahl Health system, please consult our Terms of Use.
                    </p>


                    <h3 class="h_style" style="">
                        Why do we ask you for certain types of information?
                    </h3>
                    <p>
                        Health conditions and appropriate actions often depend on your age group, geography, and gender. This data helps us to provide you with a personalized online health experience. Your Personally Identifiable Information is not visible to other members or partners on Sahl Health system. This data is only visible to us or relevant partners you connect with using Sahl Health system.
                    </p>


                    <h3 class="h_style" style="">
                        How do we use your information?
                    </h3>
                    <p>
                        We will use your Personally Identifiable Information only for the purpose for which it was provided, as well as other purposes for which you have given consent. This includes, but is not limited to, the following purposes:
                    </p>
                    <ul>
                        <li><b>Administration of your Profile:</b> We use your profile information and your health
                            and wellness goals to help you better understand, stay engaged with, and track your
                            health and to present you with personalized relevant information. Your email address
                            is used to create, log into, and manage your account on Sahl Health.</li>
                        <li> <b>Connecting with doctors:</b> We use the information you provide to help you find or
                            connect with doctors.</li>
                        <li><b>Marketing:</b> You may subscribe or unsubscribe to receive marketing communications
                            from us, such as announcements of new features. Please note that we have a strict
                            "No-Spam" policy. We do not share email addresses or other contact information with
                            third parties without your permission.</li>
                        <li><b>Notifications:</b> We will ask you if you want to receive notifications when you are a
                            member of Sahl Health. If you agree, Sahl Health may send you email, SMS, or
                            mobile push notices, providing you with account-related reminders or updates, or
                            letting you know that you have a message on Sahl Health.</li>
                    </ul>
                    <p>
                        We also may use your Personally Identifiable Information to comply with our legal obligations, resolve disputes, and enforce our agreements, as required and/or allowed by applicable privacy laws.
                    </p>


                    <h3 class="h_style" style="">
                        Disclosing Personally Identifiable Information to Third Parties
                    </h3>
                    <p>
                        When providing our Services, our members choose the types of Personal Information we process and the purposes of the processing. Accordingly, our affiliated service partners, e.g.- prescription services, are sometimes responsible for providing notice to members. In the event Personal Information is (i) to be used for a purpose that is materially different from the purposes for which the Personal Information was originally collected or subsequently authorized, or (ii) transferred to a third party acting as a data controller, members will be given, where practical and appropriate, an opportunity to opt out of having their Personal Information so used or transferred where it involves non-sensitive information. Where such use or transfer involves sensitive information, members must opt-in before such use or transfer.
                    </p>

                    <h3 class="h_style" style="">
                        With whom do we share your Personally Identifiable Information?
                    </h3>
                    <p>
                        In some instances we may retain other companies and individuals to perform functions on our behalf, including, but not limited to, website developers, IT services providers, shipping or direct mail organizations, storage facilities, or parties assisting us in a recruitment process.
                        Such third parties may be provided with access to your Personally Identifiable Information to perform the functions for which they have been retained. Our agreements with these third parties will not permit them to use your Personally Identifiable Information for any other purposes and commit them to comply with applicable data privacy standards.
                        We further may disclose any information, including Personally Identifiable Information, we deem necessary, in our sole discretion, to comply with any applicable law, regulation, legal process or governmental request.
                    </p>
                    <h3 class="h_style" style="">
                        Who else can see your Personally Identifiable Information?
                    </h3>
                    <p>
                        All Personally Identifiable Information is stored securely in your Profile, which is not visible to other users or partners on Sahl Health system. Revealing Personally Identifiable Information in content publicly visible on Sahl Health system (such as in public questions) is not permitted under our Terms of Use. Also, the questions you may enter on Sahl Health are anonymous. Only the questions, not your identity, are publicly visible.
                    </p>
                    <h3 class="h_style" style="">
                        Accountability for Onward Transfer of Personal Information
                    </h3>
                    <p>
                        Sahl Health may transfer Personal Information for the purposes described in the Sahl Health Privacy Statement to a third party acting as a data controller or as an agent. If we intend to disclose Personal Data to a third party acting as a data controller or as an agent we will comply with, and protect, Personal Information as provided in the Accountability for Onward Transfer Principle. When providing our Services, we disclose Personal Information as provided in our agreement with members.<br>
                        We remain responsible for the processing of Personal Information received under the Privacy Shield and subsequently transferred to a third party acting as an agent if the agent processes such Personal Information in a manner inconsistent with the Principles, unless we prove that we are not responsible for the event giving rise to the damage. By sending Personally Identifiable Information to us , you acknowledge and consent that your data will be transferred across national borders, including to countries in Asia, EU , America and UK.
                    </p>
                    <h3 class="h_style" >
                        Security
                    </h3>
                    <p>
                        Sahl Health system use industry-standard security safeguards, such as encryption in transit and at rest. Sahl Health meets Kenya and HIPAA security standards for all interactions benchmarked to HIPAA security regulations. We use a variety of technologies and procedures to help protect the security of your Personally Identifiable Information from unauthorized access, use, or disclosure. Sahl Health takes reasonable and appropriate precautions, considering the risks involved in the processing and the nature of the Personal Information, to help protect Personal Information from loss, misuse and unauthorized access, disclosure, alteration and destruction.
                    </p>
                    <h3 class="h_style" style="">
                        Public Content
                    </h3>
                    <p>
                        Some content on Sahl Health is publicly visible by logged in or logged out users ("Public Content"). Any information provided in Public Content might be read, collected, and used by others who access them. Please note that our Terms of Use do not allow you to include Personally Identifiable Information (such as your name, email address, or phone number) in any Public Content posted to Sahl Health. Sahl Health cannot control how Public Content is seen or used. Contact our support team to request removal of such information.
                    </p>
                    <h3 class="h_style" style="">
                        Sharing on social media
                    </h3>
                    <p>
                        You can share certain information from Sahl Health using the sign-in services of certain social media services such as Facebook and Twitter. Please consider any impact on your privacy and anonymity when posting content to public services. Content posted to these services will be governed by the respective privacy policies of those services.
                    </p>
                    <h3 class="h_style" style="">
                        How can I update my data?
                    </h3>
                    <p>
                        You can add, edit, or delete optional information appearing in your Profile as a Sahl Health member at any time in your account settings ("Settings"). You can edit, but not remove, certain information (like an email address) required for login and to use Sahl Health Accordingly, if you want to request access, or to limit use or disclosure of your Personal Information, please contact the company to which you submitted your Personal Information and that uses our Services. If you contact us with the name of our customer to which you provided your Personal Information, we will refer your request to that customer and support them in responding to your request.
                    </p>
                    <h3 class="h_style" style="">
                        Deactivation
                    </h3>
                    <p>
                        When your membership period ends the account itself automatically deactivates. You will receive an email confirming that your account has been deactivated. Please note: your public questions that have received answers will continue to appear anonymously on Sahl Health after account deactivation.
                    </p>
                    <h3 class="h_style" style="">
                        Children
                    </h3>
                    <p>
                        Our Site and/or Apps are not intended for children under 18 years of age. No one under age 13 may provide any information to us through the Site. We do not knowingly collect Personally Identifiable Information from children under 18. Do not access, use, or provide any information on the Site or on or through any of its features if you are under 18. If we learn we have collected or received Personally Identifiable Information from a child under 13 without verification of parental consent, we will delete that information. If you believe we might have any information from or about a child less than 18 years, please contact us.
                    </p>
                    <h3 class="h_style" style="">
                        Cookies
                    </h3>
                    <p>
                        A "cookie" is a data element that a website can send to your browser, which may then be stored on your system. We use different kinds of cookies on the Site. For detailed information, please see our Cookie Policy.
                    </p>
                    <h3 class="h_style" style="">
                        Google Services
                    </h3>
                    <p>
                        On the Site, we use several services provided by Google:
                    </p>
                    <h3 class="h_style" style="">
                        Google Analytics
                    </h3>
                    <p>
                        This Site uses Google Analytics, a web analytics service provided by Google, Inc. ("Google"). Google Analytics uses "cookies", which are text files placed on your computer. We use this information for the purpose of evaluating your use of the Site, compiling reports on website activity for website operators and providing other services relating to website activity and internet usage to the website provider. Google will not associate your IP address with any other data held by Google. You may refuse the use of cookies by selecting the appropriate settings on your browser. However, please note that if you do this, you may not be able to use the full functionality of our Site. Furthermore, you can prevent Google's collection and use of data (e.g., cookies and IP address) by downloading and installing the browser plug-in available under:
                        <a href="https://tools.google.com/dlpage/gaoptout?hl=en-GB" target="_blank">Google</a>
                        Further information about how Google uses advertising cookies can be found at: <a href="http://www.google.com/analytics/terms/gb.html" target="_blank">Google Analytics Terms</a>
                    </p>
                    <h3 class="h_style" style="">
                        Google Maps
                    </h3>
                    <p>
                        Additionally, because we use visual mapping services on the Site and/or our applications, please be aware that the Google Maps/Earth Terms of Service, including the Google Privacy Policy, at <a href="https://www.google.com/intl/en-US_US/help/terms_maps.html" target="_blank">Google Map Terms</a> also applies.
                    </p>
                    <h3 class="h_style" style="">
                        Google reCAPTCHA
                    </h3>
                    <p>
                        We use Google reCAPTCHA on the Site and/or our applications and it is also subject to  Google's Privacy Policy and Terms of Use, which are available for your review.
                    </p>
                    <h3 class="h_style" style="">
                        Third- Party Sites
                    </h3>
                    <p>
                        Our Site may contain links to other third-party sites. When you click on one of these links you are visiting a website operated by someone other than Sahl Health, and the operator of that website may have different privacy policies. Sahl Health is not responsible for the individual privacy practices of those sites. We encourage you to investigate the privacy policies of these third-party operators.
                    </p>
                    <h3 class="h_style" style="">
                        How Long We Store Your Personally Identifiable Information
                    </h3>
                    <p>
                        Personally Identifiable Information will be stored as long as the information is required to fulfill our legitimate business needs or the purposes for which the information was collected, or for as long as is required by law.
                    </p>

                    <h3 class="h_style" style="">
                        Contacting us
                    </h3>
                    <p>
                        You may reach us via email at <b>support@sahlhealth.com</b>, or you may write to us at our most current address. Our Contact Us page may also be used for requests to manage your information we process.
                    </p>

                    <h3 class="h_style" style="">
                        Revisions to this Privacy Statement
                    </h3>
                    <p>
                        We reserve the right to change this Privacy Statement at any time whereby relevant changes take effect for the future. The applicable version of this Privacy Statement is available on the Site. Date last modified: July 2019
                    </p>
                </div>
            </div>
        </div>
    </div>



@endsection
