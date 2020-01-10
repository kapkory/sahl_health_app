{{--<a href="#service_modal" class="btn btn-info btn-sm clear-form float-right" data-toggle="modal"><i class="fa fa-plus"></i> ADD SERVICE</a>--}}
@include('common.bootstrap_table_ajax',[
'table_headers'=>["id","name","action"],
'data_url'=>'admin/settings/services/list',
'base_tbl'=>'services'
])

@include('common.auto_modal',[
    'modal_id'=>'service_modal',
    'modal_title'=>'SERVICE FORM',
    'modal_content'=>Form::autoForm(['name','organization_type','form_model'=>\App\Models\Core\Service::class],"admin/settings")
])
