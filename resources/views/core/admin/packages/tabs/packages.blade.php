<a href="#package_modal" class="btn btn-info btn-sm clear-form float-right" data-toggle="modal"><i class="fa fa-plus"></i> ADD PACKAGE</a>
@include('common.bootstrap_table_ajax',[
'table_headers'=>["id","name","package_categories.name"=>"category","cost","duration","number_of_members","action"],
'data_url'=>'admin/packages/list',
'base_tbl'=>'packages'
])

@include('common.auto_modal',[
    'modal_id'=>'package_modal',
    'modal_title'=>'PACKAGE FORM',
    'modal_content'=>Form::autoForm(["name","package_category_id","cost","duration","icon","number_of_members","description","form_model"=>\App\Models\Core\Package::class],"admin/packages")
])


<script>
    $(function () {
        $('.duration').append('<small class="text-black-50">In Months ie 3</small>');
        autoFillSelect('package_category_id',"{{ url('api/institution/package_categories') }}");
    });
</script>
