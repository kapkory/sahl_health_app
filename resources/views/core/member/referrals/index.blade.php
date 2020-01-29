@extends('layouts.admin')

@section('title')
    Get up to Ksh 1,000<sup>*</sup> off your next hospital visit for each friend you refer
    @endsection


@section('content')
<div class="row">
    <div class="col-md-3 col-6"><!-- Card -->
        <div class="dt-card" style="background-color: #7BB37D;border-radius: 10px;"><!-- Card Body -->
            <div class="dt-card__body p-xl-8 py-sm-8 py-6 px-4">
                <div class="media">
                    <i class="icon icon-revenue-new icon-5x mr-xl-5 mr-3 align-self-center text-white"></i><!-- Media Body -->
                    <div class="media-body">
                        <p class="mb-1 h1">{{ auth()->user()->wallet }}</p>
                        <span class="d-block text-white">Ksh <br>
                        Earned from Referrals</span>
                    </div><!-- /media body -->
                </div><!-- /media -->
            </div><!-- /card body -->
        </div><!-- /card -->
    </div>

    <div class="col-md-4 col-6"><!-- Card -->
        <div class="dt-card"  style="background: #F07A3B; border-color:#F07A3B; border-radius: 10px;box-sizing: border-box;"><!-- Card Body -->
            <div class="dt-card__body" style="padding: 2.2rem !important;">
                <div class="form-group">
                    <label class="sr-only" for="subscription">Subject</label>
                    <input type="text" class="form-control" id="subscription" value="{{ auth()->user()->referral_code }}">
                    <button onclick="copyToClipboard()" style="background-color: #2ac174; border-color: #2ac174" class="btn btn-primary mt-3">Copy Referral Link</button>
                </div>


            </div><!-- /card body -->
        </div><!-- /card -->
    </div>

    <div class="col-md-3 col-6"><!-- Card -->
        <div class="dt-card" style="background-color: #335062;border-radius: 10px;"><!-- Card Body -->
            <div  class="dt-card__body p-xl-8 py-sm-8 py-6 px-4" >

                <div class="media">
                    <img src="{{ url('sahl/assets/image/referrals.png') }}" alt="hospital">                    <div class="media-body">
                        <p class="mb-1 h1 text-white text-center">Share Link</p>
                        <br>
                        <div id="buttons">
                            <div class="d-flex flex-wrap align-items-center">

                                <!-- List -->
                                <ul class="dt-list dt-list-sm dt-list-cm-0 ml-auto ">
                                    <li class="dt-list__item" style="color: white">
                                        <!-- Fab Button -->
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ url('member-register/'.auth()->user()->referral_code) }}" class="btn btn-outline-primary dt-fab-btn size-30 ">
                                            <i class="icon icon-facebook icon-xl text-white"></i>
                                        </a>
                                        <!-- /fab button -->
                                    </li>

                                    <li class="dt-list__item">
                                        <!-- Fab Button -->
                                        <a href="mailto:?&subject=Invite Link&body=Register with Sahl Health and get affordable discounts from selected hospitals, Register with this link {{ url('member-register/'.auth()->user()->referral_code) }}" class="btn dt-fab-btn size-30">
                                            <i class="icon icon-google-plus icon-xl text-white"></i>
{{--                                            <img  src="{{ url('sahl/assets/image/icons8-google.svg') }}" alt="google">--}}
                                        </a>
                                        <!-- /fab button -->
                                    </li>

                                    <li class="dt-list__item">
                                        <!-- Fab Button -->
                                        <a target="_blank" href="https://twitter.com/intent/tweet?text=Register with Sahl Health and get affordable discounts from selected hospitals&url={{ url('member-register/'.auth()->user()->referral_code) }}" class="btn btn-outline-primary dt-fab-btn size-30">
                                            <i class="icon icon-twitter icon-xl text-white"></i>
                                        </a>
                                        <!-- /fab button -->
                                    </li>
                                </ul>
                                <!-- /list -->
                            </div>
                        </div>

                    </div><!-- /media body -->
                </div><!-- /media -->
            </div><!-- /card body -->
        </div><!-- /card -->
    </div>

</div>

      <h4>Members you have Referred</h4>
        @include('common.bootstrap_table_ajax',[
        'table_headers'=>["users.name"=>"name","id"=>"package","amount","created_at"=>"day_referred"],
        'data_url'=>'member/referrals/list',
        'base_tbl'=>'referrals',
        'search_table'=>'dont'
        ])

<b><sup>*</sup></b> Payments depend on the package, the person you referred paid for
<script>
    function copyToClipboard() {
        var $temp = $("<input>");
        $("body").append($temp);
        let referral_link = "{{ url('member-register/'.auth()->user()->referral_code) }}";
        $temp.val(referral_link).select();
        document.execCommand("copy");
        $temp.remove();
        toastr.success('Referral url has been successfully copied')

    }
</script>
@endsection
