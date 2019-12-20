@extends('layouts.admin')
@section('title','Create Institution')
@section('content')

    <div class="col-8">
        <div class="dt-card">
            <div class="dt-card__body">
                <form class="ajax-post">
                    <!-- Form Group -->
                    <div class="form-group form-row">
                        <label for="normal-input-3" class="col-md-2 col-sm-3 col-form-label col-form-label-md text-sm-right">
                            Institution Name
                        </label>
                        <div class="col-md-10 col-sm-9">
                            <input type="email" class="form-control form-control-md" id="normal-input-3" placeholder="placeholder">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
