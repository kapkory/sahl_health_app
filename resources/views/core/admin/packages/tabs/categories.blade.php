<a href="#packagecategory_modal" class="btn btn-info btn-sm clear-form float-right" data-toggle="modal"><i class="fa fa-plus"></i> ADD PACKAGECATEGORY</a>
@include('common.bootstrap_table_ajax',[
'table_headers'=>["id","name","description","action"],
'data_url'=>'admin/packages/package_category/list',
'base_tbl'=>'package_categories'
])

@include('common.auto_modal',[
    'modal_id'=>'packagecategory_modal',
    'modal_title'=>'PACKAGECATEGORY FORM',
    'modal_content'=>Form::autoForm(["name","description","form_model"=>\App\Models\Core\PackageCategory::class],"admin/packages/package_category")
])
