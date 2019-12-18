<a href="#organizationtype_modal" class="btn btn-info btn-sm clear-form float-right" data-toggle="modal"><i class="fa fa-plus"></i> ADD ORGANIZATIONTYPE</a>
@include('common.bootstrap_table_ajax',[
'table_headers'=>["id","name","slug","action"],
'data_url'=>'admin/settings/organization_type/list',
'base_tbl'=>'organizationtypes'
])

@include('common.auto_modal',[
    'modal_id'=>'organizationtype_modal',
    'modal_title'=>'ORGANIZATIONTYPE FORM',
    'modal_content'=>Form::autoForm(["name","form_model"=>\App\Models\Core\OrganizationType::class],"admin/settings/organization_type")
])
