@extends('layouts.admin')
@section('title','Create Institution')
@section('content')
    <div class="col-10 ">
        <div class="dt-card">
            <div class="dt-card__body jumbotron p-3">
                <form class="file-form" enctype="multipart/form-data" method="post" action="{{ url('provider/institutions') }}">
                    <!-- Form Group -->
                    <div class="form-group form-row">

                        <div class="col-md-6 col-sm-6">
                            <label for="normal-input-3" class="col-form-label col-form-label-md text-sm-right">
                                Institution Name
                            </label>
                            <input type="text" name="name" class="form-control form-control-md" id="normal-input-3" placeholder="Institution Name">
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <label class=" col-form-label text-sm-right" for="institutionLevel">Institution Level</label>

                            <select class="form-control custom-select" name="institution_level" id="institutionLevel">

                            </select>
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="col-md-6 col-sm-6">
                            <label class="col-form-label text-sm-right" for="organization_type">Organization Type</label>

                            <select class="form-control custom-select" name="organization_type" id="organization_type">

                            </select>
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <label for="address" class="col-form-label col-form-label-md text-sm-right">
                                Institution Address
                            </label>
                            <input type="text" name="address" class="form-control form-control-md" id="address" placeholder="Address">
                        </div>
                    </div>

                    <div class="form-group form-row">
                        <div class="col-md-6 col-sm-6">
                            <label for="postal_code" class=" col-form-label col-form-label-md text-sm-right">
                                Postal Code
                            </label>
                            <input type="text" name="postal_code" class="form-control form-control-md" id="postal_code" placeholder="Postal Code">
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <label for="featured_image" class="col-form-label col-form-label-md text-sm-right">
                                Featured Image
                            </label>
                            <input type="file" name="featured_image" class="form-control form-control-md" id="featured_image">
                        </div>
                    </div>

                    @csrf

                    <input type="hidden" name="form_model" value="{{ \App\Models\Core\Institution::class }}">

                    <div class="form-group form-row">

                        <div class="col-md-6 col-sm-6">
                            <label for="discount" class="col-form-label col-form-label-md text-sm-right">
                                Discount <b>in %</b>
                            </label>
                            <input type="text" name="discount" class="form-control form-control-md" id="discount" placeholder="10">
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <label class="col-form-label text-sm-right" for="county">Select County</label>

                            <select class="form-control custom-select" name="county" id="county">

                            </select>
                        </div>
                    </div>

                    <div class="form-group form-row">
                        <div class="col-md-6 col-sm-6">
                            <label for="logo" class="col-form-label col-form-label-md text-sm-right">
                                Institution Logo
                            </label>
                            <input type="file" name="logo" class="form-control form-control-md" id="logo">
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <label for="nearby_town" class=" col-form-label col-form-label-md text-sm-right">
                                Nearby Town
                            </label>
                            <input type="text" name="town" class="form-control form-control-md" id="nearby_town" placeholder="Nearby Town">
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
                autoFillSelect('county',"{{ url('api/institution/county') }}")
                autoFillSelect('organization_type',"{{ url('api/institution/organization_types') }}")
            })
        </script>
    @endpush

@endsection


