<a href="#identification_modal" class="btn btn-info btn-sm clear-form float-right" data-toggle="modal"><i class="fa fa-plus"></i> ADD IDENTIFICATION</a>
@include('common.bootstrap_table_ajax',[
'table_headers'=>["id","name","is_provider","action"],
'data_url'=>'admin/settings/identification/list',
'base_tbl'=>'identifications'
])

@include('common.auto_modal',[
    'modal_id'=>'identification_modal',
    'modal_title'=>'IDENTIFICATION FORM',
    'modal_content'=>Form::autoForm(['name','is_provider','form_model'=>\App\Models\Core\Identification::class],"admin/settings/identification")
])

<script>
    $("input[name='is_provider'][value='no']").prop('checked', true);
</script>
