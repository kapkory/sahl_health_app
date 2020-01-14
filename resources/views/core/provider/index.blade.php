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
                <div class="dt-card"><!-- Card Body -->
                    <div class="dt-card__body p-xl-8 py-sm-8 py-6 px-4">
                        <span class="badge badge-secondary badge-top-right">Revenue</span><!-- Media -->
                        <div class="media">
                            <i class="icon icon-revenue-new icon-5x mr-xl-5 mr-3 align-self-center"></i><!-- Media Body -->
                            <div class="media-body">
                                <p class="mb-1 h1">{{ @number_format($data['revenue'],2) }}</p>
                                <span class="d-block text-light-gray">Ksh</span>
                            </div><!-- /media body -->
                        </div><!-- /media -->
                    </div><!-- /card body -->
                </div><!-- /card -->
            </div>

            <div class="col-md-3 col-6"><!-- Card -->
                <div class="dt-card"><!-- Card Body -->
                    <div class="dt-card__body p-xl-8 py-sm-8 py-6 px-4">
                        <span class="badge badge-info badge-top-right">Customer Savings</span><!-- Media -->
                        <div class="media">
                            <i class="icon icon-orders-new icon-5x mr-xl-5 mr-3 align-self-center"></i><!-- Media Body -->
                            <div class="media-body">
                                <p class="mb-1 h1">{{ @number_format($data['customer_savings'],2) }}</p>
                                <span class="d-block text-light-gray">Ksh</span>
                            </div><!-- /media body -->
                        </div><!-- /media -->
                    </div><!-- /card body -->
                </div><!-- /card -->
            </div>

            <a href="{{ url('provider/visits') }}" class="col-md-3">
                <div class="dt-card">

                    <!-- Card Body -->
                    <div class="dt-card__body px-5 py-4">
                        <span class="badge badge-info badge-top-right">Hospital Visits</span>                        <div class="d-flex align-items-baseline mb-4">
                            <span class="display-4 text-center font-weight-500 text-dark ">{{ $data['visits'] }} visit(s)</span>
                        </div>

                        <div class="dt-indicator-item__info mb-2" data-fill="100" data-max="100">
                            <div class="dt-indicator-item__bar">
                                <div class="dt-indicator-item__fill fill-pointer bg-primary" style="width: 100%;"></div>
                            </div>
                            <span class="d-block text-light-gray">Ksh</span>
                        </div>
                    </div>
                    <!-- /bard body -->

                </div>
            </a>
        </div>
    </div>
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
            <div v-if="results.length > 0">


                <div v-for="result in results">
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
            </div>
            <div v-else>
                <div class="alert alert-info" v-if="result_flag == 1">
                    We Currently do not have that user in our database
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
                message: 'Hello Vue!',
                results:[],
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
                        self.results = response;
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
