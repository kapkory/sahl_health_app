@extends('layouts.admin')

@section('title','Dependants')

@section('content')
    @if(auth()->user()->countDependants() > 0)
    <a href="{{ url('member/dependants/payments') }}" class="btn btn-info btn-sm clear-form float-right mx-2" style="background-color: orangered; border-color: orangered"><i class="fa fa-pay"></i> Pay For All</a>

    @endif
<a href="#dependant_modal" class="btn btn-info btn-sm clear-form float-right" data-toggle="modal"><i class="fa fa-plus"></i> ADD DEPENDANT</a>
    @include('common.bootstrap_table_ajax',[
    'table_headers'=>["id","name","identification_type","relationship_type","email","phone","action"],
    'data_url'=>'member/dependants/list',
    'base_tbl'=>'dependants'
    ])

{{--{{ $memberPackage->package->number_of_members }}--}}

{{--    @include('common.auto_modal',[--}}
{{--        'modal_id'=>'dependant_modal',--}}
{{--        'modal_title'=>'DEPENDANT FORM',--}}
{{--        'modal_content'=>Form::autoForm(["first_name","last_name","other_name","identification_type_id","relationship_type","email","phone","identification_number","form_model"=>\App\Models\Core\Dependant::class],"member/dependants")--}}
{{--    ])--}}


<!-- Modal -->
<div class="modal fade" id="dependant_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">DEPENDANT FORM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" class="ajax-post" action="{{ url('member/dependants') }}">
                   <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label class="fg-label control-label label_first_name">First Name</label>
                              <input type="text" name="first_name" class="form-control" placeholder="First Name">
                          </div>
                      </div>

                       <div class="col-md-6">
                           <div class="form-group">
                               <label class="fg-label control-label label_last_name">Last Name</label>
                               <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                           </div>
                       </div>
                   </div>
                    <input type="hidden" name="form_model" value="{{ \App\Models\Core\Dependant::class }}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="fg-label control-label label_other_name">Other Name</label>
                                <input type="text" name="other_name" class="form-control" placeholder="Other Name">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="fg-label control-label label_email">Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Email Address">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="fg-label control-label label_first_name">Phone Number</label>
                                <input type="text" name="phone" class="form-control" placeholder="Phone Number">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="fg-label control-label label_first_name">Identification Type</label>
                                <select class="custom-select form-control" name="identification_type_id">

                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="pay" value="0">

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="fg-label control-label label_identification_number">Identification Number</label>
                                <input type="text" name="identification_number" class="form-control" placeholder="Identification Number">
                            </div>
                        </div>
                        @csrf
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="fg-label control-label label_first_name">Relationship Type</label>
                                <select class="custom-select form-control" name="relationship_type">
                                   <option value="">Please Select</option>
                                    @php
                                    $relations =  ['spouse','child','parent','grand parent','grand children','other'];
                                    @endphp
                                    @foreach($relations as $relation)
                                        <option value="{{ $relation }}">{{ ucwords($relation) }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        @if(!$memberPackage->package->number_of_members > auth()->user()->countDependants())
                            <button type="submit" class="btn btn-info m-2">Add Dependant</button>

                        @else
                            <button type="submit" class="btn btn-primary m-2" id="submit_pay">Submit & Pay</button>
                            <button type="submit" class="btn btn-info m-2">Save & Pay Later</button>
                        @endif
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
    <script>
        $('#submit_pay').click(function () {
            $('input[name="pay"]').val(1);
        });

        $(function () {
            autoFillSelect('identification_type_id',"{{ url('api/institution/identifications') }}")
        })
    </script>
@endsection
