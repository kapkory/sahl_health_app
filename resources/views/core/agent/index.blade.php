@extends('layouts.admin')
@section('title','')
@section('content')
    @push('scripts')
        {{--    <script src="https://cdn.jsdelivr.net/npm/vue"></script>--}}
        <script src="{{ url('drift/assets/js/vue-2.6.min.js') }}"></script>
        {{--    <script type="text/javascript" src="js/app.js"></script>--}}

    @endpush
    <!-- Grid Item -->
    <div class="col-xl-12">
        <div class="row">
            <div class="col-md-3 col-6"><!-- Card -->
                <div class="dt-card" style="background-color: #7BB37D;border-radius: 10px;"><!-- Card Body -->
                    <div  class="dt-card__body p-xl-8 py-sm-8 py-6 px-4" >

                        <div class="media">
                            <i class="icon icon-revenue-new text-white icon-5x mr-xl-5 mr-3 align-self-center"></i><!-- Media Body -->
                            <div class="media-body">
                                <p class="mb-1 h1 text-white">Ksh <br>{{ auth()->user()->wallet }}</p>
                                <span class="d-block text-black-50">My Wallet</span>
                            </div><!-- /media body -->
                        </div><!-- /media -->
                    </div><!-- /card body -->
                </div><!-- /card -->
            </div>

            <div class="col-md-3 col-6"><!-- Card -->
                <div class="dt-card" style="background-color: #335062;border-radius: 10px;"><!-- Card Body -->
                    <div  class="dt-card__body p-xl-8 py-sm-8 py-6 px-4" >

                        <div class="media">
                            <i class="icon icon-revenue-new text-white icon-5x mr-xl-5 mr-3 align-self-center"></i><!-- Media Body -->
                            <div class="media-body">
                                <p class="mb-1 h1 text-white">Ksh <br>{{ auth()->user()->wallet }}</p>
                                <span class="d-block text-black-50">Total Earnings</span>
                            </div><!-- /media body -->
                        </div><!-- /media -->
                    </div><!-- /card body -->
                </div><!-- /card -->
            </div>


            <div class="col-md-3 col-6"><!-- Card -->
                <div class="dt-card" style="background-color: #F07A3B;border-radius: 10px;"><!-- Card Body -->
                    <div  class="dt-card__body p-xl-8 py-sm-8 py-6 px-4" >

                        <div class="media">
                            <i class="icon icon-crm text-white icon-5x mr-xl-5 mr-3 align-self-center"></i><!-- Media Body -->
                            <div class="media-body">
                                <br>
                                <button href="#refer_member"  data-toggle="modal"  class="btn btn-outline-info text-white">Refer Member</button>

                                {{--                                <p class="mb-1 h1 text-white">Ksh <br>{{ @number_format($data['savings'],2) }}</p>--}}
{{--                                <span class="d-block text-black-50">Savings</span>--}}
                            </div><!-- /media body -->
                        </div><!-- /media -->
                    </div><!-- /card body -->
                </div><!-- /card -->
            </div>

        </div>
    </div>

    @include('common.auto_modal',[
    'modal_id'=>'refer_member',
    'modal_title'=>'Refer Member',
    'modal_content'=>Form::autoForm(["first_name","last_name",'phone_number','email',"form_model"=>\App\User::class],"agent/referrals")
])

@endsection
