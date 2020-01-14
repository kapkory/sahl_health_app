@extends('layouts.admin')
@section('content')

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

            <a href="{{ url('admin/visits') }}" class="col-md-3">
                <div class="dt-card">

                    <!-- Card Body -->
                    <div class="dt-card__body px-5 py-4">
                        <span class="badge badge-success badge-top-right">Hospital Visits</span>
                        <div class="d-flex align-items-baseline mb-4">
                            <span class="display-4 text-center font-weight-500 text-dark ">{{ $data['visits'] }} visit(s)</span>
                        </div>

                        <div class="dt-indicator-item__info mb-2" data-fill="100" data-max="100">
                            <div class="dt-indicator-item__bar">
                                <div class="dt-indicator-item__fill fill-pointer bg-primary" style="width: 100%;"></div>
                            </div>

                        </div>
                    </div>
                    <!-- /bard body -->

                </div>
            </a>
        </div>
    </div>

@endsection
