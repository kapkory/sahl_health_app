@extends('layouts.admin')
@section('title','Create Institution')
@section('content')
    <div class="col-8">
        <div class="dt-card">
            <div class="dt-card__body">
                <form class="file-form" method="post" action="{{ url('provider/institutions') }}">
                    <!-- Form Group -->
                    <div class="form-group form-row">
                        <label for="normal-input-3" class="col-md-2 col-sm-3 col-form-label col-form-label-md text-sm-right">
                            Institution Name
                        </label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="name" class="form-control form-control-md" id="normal-input-3" placeholder="Institution Name">
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-md-2 col-sm-3 col-form-label text-sm-right" for="institutionLevel">Institution Level</label>

                        <div class="col-md-10 col-sm-9">
                            <select class="form-control custom-select" name="institution_level" id="institutionLevel">

                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <label class="col-md-2 col-sm-3 col-form-label text-sm-right" for="organization_type">Organization Type</label>

                        <div class="col-md-10 col-sm-9">
                            <select class="form-control custom-select" name="organization_type" id="organization_type">

                            </select>
                        </div>
                    </div>

                    <div class="form-group form-row">
                        <label for="address" class="col-md-2 col-sm-3 col-form-label col-form-label-md text-sm-right">
                            Institution Address
                        </label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="address" class="form-control form-control-md" id="address" placeholder="Address">
                        </div>
                    </div>

                    <div class="form-group form-row">
                        <label for="postal_code" class="col-md-2 col-sm-3 col-form-label col-form-label-md text-sm-right">
                            Postal Code
                        </label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="postal_code" class="form-control form-control-md" id="postal_code" placeholder="Postal Code">
                        </div>
                    </div>

                    <div class="form-group form-row">
                        <label for="featured_image" class="col-md-2 col-sm-3 col-form-label col-form-label-md text-sm-right">
                            Featured Image
                        </label>
                        <div class="col-md-10 col-sm-9">
                            <input type="file" name="featured_image" class="form-control form-control-md" id="featured_image">
                        </div>
                    </div>
                    @csrf

                    <div class="form-row">
                        <label for="normal-input-3" class="col-md-2 col-sm-3 col-form-label col-form-label-md text-sm-right">
                            Is Main Branch
                        </label>

                        <div class="col-md-10 col-sm-9">
                            <!-- Radio Button -->
                            <div class="custom-control custom-radio mb-3">
                                <input type="radio" id="main_branch" name="is_main" class="custom-control-input" value="yes" checked="checked">
                                <label class="custom-control-label" for="main_branch">
                                    Yes</label>
                            </div>
                            <!-- /radio button -->

                            <!-- Radio Button -->
                            <div class="custom-control custom-radio mb-3">
                                <input type="radio" id="not_main_branch" name="is_main" value="no" class="custom-control-input">
                                <label class="custom-control-label" for="not_main_branch">
                                    No</label>
                            </div>
                            <!-- /radio button -->

                        </div>
                    </div>

                    <input type="hidden" name="form_model" value="{{ \App\Models\Core\Institution::class }}">

                    <div class="form-group form-row">
                        <label for="discount" class="col-md-2 col-sm-3 col-form-label col-form-label-md text-sm-right">
                            Discount <b>in %</b>
                        </label>
                        <div class="col-md-10 col-sm-9">
                            <input type="text" name="discount" class="form-control form-control-md" id="discount" placeholder="10">
                        </div>
                    </div>

                    <div class="form-row">
                      <input type="submit" class="btn btn-primary text-center" name="submit" value="Create Institution">
                    </div>

                </form>
            </div>
        </div>
    </div>
    @push('footer-scripts')
        <script>
            $(function () {
                autoFillSelect('institution_level',"{{ url('api/institution/levels') }}")
                autoFillSelect('organization_type',"{{ url('api/institution/organization_types') }}")
            })
        </script>
    @endpush

@endsection


