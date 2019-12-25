@extends('layouts.admin')

@section('title','Dependants')

@section('content')
<a href="#dependant_modal" class="btn btn-info btn-sm clear-form float-right" data-toggle="modal"><i class="fa fa-plus"></i> ADD DEPENDANT</a>
    @include('common.bootstrap_table_ajax',[
    'table_headers'=>["id","name","identification_type","relationship_type","email","phone","action"],
    'data_url'=>'member/dependants/list',
    'base_tbl'=>'dependants'
    ])

    @include('common.auto_modal',[
        'modal_id'=>'dependant_modal',
        'modal_title'=>'DEPENDANT FORM',
        'modal_content'=>Form::autoForm(["first_name","last_name","other_name","identification_type_id","relationship_type","email","phone","identification_number","form_model"=>\App\Models\Core\Dependant::class],"member/dependants")
    ])

    <script>
        $(function () {
            autoFillSelect('identification_type_id',"{{ url('api/institution/identifications') }}")
        })
    </script>
@endsection
