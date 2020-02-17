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
                                <p class="mb-1 h1 text-white">Ksh <br>{{ @number_format($data['revenue'],2) }}</p>
                                <span class="d-block text-black-50">Revenue</span>
                            </div><!-- /media body -->
                        </div><!-- /media -->
                    </div><!-- /card body -->
                </div><!-- /card -->
            </div>

            <div class="col-md-3 col-6"><!-- Card -->
                <div class="dt-card" style="background: rgba(196, 196, 196, 0.42);border-radius: 10px;"><!-- Card Body -->
                    <div  class="dt-card__body p-xl-8 py-sm-8 py-6 px-4" >

                        <div class="media">
                            <i class="icon icon-orders-new icon-5x mr-xl-5 mr-3 align-self-center"></i><!-- Media Body -->
                            <div class="media-body">
                                <p class="mb-1 h1">Ksh <br>{{ @number_format($data['customer_savings'],2) }}</p>
                                <span class="d-block text-black-50">Savings</span>
                            </div><!-- /media body -->
                        </div><!-- /media -->
                    </div><!-- /card body -->
                </div><!-- /card -->
            </div>

            <a href="{{ url('provider/visits') }}" class="col-md-3 col-6"><!-- Card icon-contacts-app-->
                <div class="dt-card" style="background: #335062; border-color:#F07A3B; border-radius: 10px;box-sizing: border-box;"><!-- Card Body -->
                    <div  class="dt-card__body p-xl-8 py-sm-8 py-6 px-4 py-1" >

                        <div class="media">
                            <i class="icon text-white icon-contacts icon-5x mr-xl-5 mr-3 align-self-center"></i><!-- Media Body -->
                            <div class="media-body">
                                <p class="mb-1 h1 text-center text-white" style="color: #335062">{{ @$data['visits'] }}</p>
                                <span class="d-block text-center text-white" style="color: #335062">&nbsp;&nbsp;Hospital <br>&nbsp;Visits</span>
                            </div><!-- /media body -->
                        </div><!-- /media -->
                    </div><!-- /card body -->
                </div><!-- /card -->
            </a>

            @if(auth()->user()->referral_code)
                <div class="col-md-3 col-6"><!-- Card -->
                    <div class="dt-card" style="background-color: #F07A3B;border-radius: 10px;"><!-- Card Body -->
                        <div  class="dt-card__body p-xl-8 py-sm-8 py-6 px-4" >

                            <div class="media">
                                <i class="icon icon-crm text-white icon-5x mr-xl-5 mr-3 align-self-center"></i><!-- Media Body -->
                                <div class="media-body">
                                    <br>
                                    <button href="#refer_member"  data-toggle="modal"  class="btn text-white" style="border-color: white">Refer Member</button>
                                </div><!-- /media body -->

                            </div><!-- /media -->
                        </div><!-- /card body -->
                    </div><!-- /card -->
                </div>
                @endif
        </div>
    </div>

    @include('common.auto_modal',[
    'modal_id'=>'refer_member',
    'modal_title'=>'Refer Member',
    'modal_content'=>Form::autoForm(["first_name","last_name",'phone_number','email',"form_model"=>\App\User::class],"provider/referrals")
])
    <!-- Card -->
    <div class="dt-card" id="search">

        <!-- Card Body -->
        <div class="dt-card__body">
            <!-- Search Box -->
            <form class="search-box right-side-icon mw-100" method="post" action="{{ url('provider/search') }}">
                <input class="form-control form-control-lg" type="search" id="address" name="search" placeholder="Search for Sahl Members...">
                <button @click="sendSearchRequest" type="button" class="search-icon"><i class="icon icon-search icon-lg"></i>
                </button>
            </form>
            <!-- /search box -->
            <div v-if="with_dependants.length > 0">


                <div v-for="result in with_dependants">
                    <!-- Separator -->
                    <hr class="border-dashed my-6">
                    <!-- /separator -->

                    <!-- Search Result-->
                    <div class="search-result">
                        <div class="row">
                            <div class="col-md-2">
                                <span class="dt-avatar bg-dark-blue text-white"> @{{ result.name.match(/\b\w/g).join('') }}</span>
                            </div>

                            <div class="col-md-8">
                                <h3 class="search-heading"><a href="javascript:void(0)">@{{ result.name }}</a>
                                    &nbsp;&nbsp;&nbsp;
                                </h3>

                            </div>

                            <div class="col-md-2">
                                <button @click="confirmVisit(result.id,'mb',result.id)" type="button" name="btn" class="btn btn-outline-primary">Confirm Visit</button>
                            </div>
                        </div>

                        <div class="row" id="dependant" v-if="userDependants(result.id).length >0">
                            <table class="table condensed boots-table">
                                <thead>
                                <tr>
                                    <th scope="col" >
                                        <i class="th_id order_cols"></i>
                                        <span>Full Name</span>
                                    </th>
                                    <th scope="col" >
                                        <i class="th_name order_cols"></i>
                                        <span>Identification Number</span>
                                    </th>
                                    <th scope="col">
                                        <i class="th_description order_cols"></i>
                                        <span>Relationship</span>
                                    </th>
                                    <th scope="col">
                                        <i class="th_action order_cols"></i>
                                        <span>Action</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="main_table_bdy">
                                <tr v-for="dependant in userDependants(result.id)">
                                    <td>@{{ dependant.first_name }} @{{ dependant.other_name }} @{{ dependant.last_name }}</td>
                                    <td>@{{ dependant.identification_number }}</td>
                                    <td>@{{ dependant.relationship_type }}</td>
                                    <td>
                                        <button @click="confirmVisit(dependant.id,'dp',result.id)" class="btn badge btn-outline-success">Confirm Visit</button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- /search result-->

                    <!-- Separator -->
                    <hr class="border-dashed my-6">
                    <!-- /separator -->
                </div>


                <div v-for="result in without_dependants">
                    <!-- Separator -->
                    <hr class="border-dashed my-6">
                    <!-- /separator -->

                    <!-- Search Result-->
                    <div class="search-result">
                        <div class="row">
                            <div class="col-md-2">
                                <span class="dt-avatar bg-dark-blue text-white"> @{{ result.name.match(/\b\w/g).join('') }}</span>
                            </div>

                            <div class="col-md-8">
                                <h3 class="search-heading"><a href="javascript:void(0)">@{{ result.name }}</a>
                                    &nbsp;&nbsp;&nbsp;
                                </h3>

                            </div>

                            <div class="col-md-2">
                                <button @click="confirmVisit(result.id,'mb',result.id)" type="button" name="btn" class="btn btn-outline-primary">Confirm Visit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else>
                <div class="alert alert-info mt-3" v-if="result_flag == 1">
                    We can not find that user in our Plans, You can also Search by their Identification Number or Phone Number
                </div>
            </div>



        </div>
        <!-- /card body -->

    </div>
    <!-- /card -->
    <script type="text/javascript">
        var app = new Vue({
            el: '#search',
            data: {
                with_dependants:[],
                without_dependants:[],
                result_flag:0,
                dependants:[]
            },
            mounted(){
                let api_url = "{{ url('api/vars') }}";
                fetch(api_url)
                    .then(response => response.json())
                    .then(json => {
                        this.dependants = json.dependants;
                    });
            },
            methods: {
                sendSearchRequest:function () {
                    let search = $('input[name="search"]').val();
                    let token = "{{ csrf_token() }}";
                    const url = "{{ url('provider/search') }}";

                    var self = this;
                    $.post(url,{'search':search,'_token':token},function (response) {
                        // console.log(response);
                        self.result_flag = 1;
                        self.with_dependants = response.with_dependants;
                        self.without_dependants = response.without_dependants;
                    })
                },
                userDependants:function (user_id) {
                    // console.log('User id is '+user_id);
                    return this.dependants.filter(function (dependant) {
                        return dependant.user_id == user_id;
                    })
                },
                confirmVisit:function (user_id,type,member_id) {

                    let url = "{{ url('provider/search/confirm-visit?_token='.csrf_token()) }}";
                    let data = {'user_id':user_id,'type':type,'member_id':member_id};
                    let message = 'Are you Sure you want to Confirm Visit';
                    window.runJavascriptPlainRequest(url,data,message);
                    // $.post(url,,function (response) {
                    //     window.location.href= response.redirect_url;
                    // })
                }
            },
            computed: {

            }
        })
    </script>
@endsection
