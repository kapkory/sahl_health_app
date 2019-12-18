<a href="#instituitionlevel_modal" class="btn btn-info btn-sm clear-form float-right" data-toggle="modal"><i class="fa fa-plus"></i> ADD INSTITUITIONLEVEL</a>
@include('common.bootstrap_table_ajax',[
'table_headers'=>["id",'name','facilities',"action"],
'data_url'=>'admin/settings/institution_levels/list',
'base_tbl'=>'institution_levels'
])

@include('common.auto_modal',[
    'modal_id'=>'instituitionlevel_modal',
    'modal_title'=>'INSTITUTION LEVEL FORM',
    'modal_content'=>Form::autoForm(['name','facilities','form_model'=>\App\Models\Core\InstitutionLevel::class],"admin/settings/institution_levels")
])
