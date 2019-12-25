<a href="#institutioncontact_modal" class="btn btn-info btn-sm clear-form float-right" data-toggle="modal"><i class="fa fa-plus"></i> ADD INSTITUTIONCONTACT</a>
@include('common.bootstrap_table_ajax',[
'table_headers'=>["id","name","email","phone_number","role","action"],
'data_url'=>'provider/institutions/contacts/list',
'base_tbl'=>'institution_contacts'
])

@include('common.auto_modal',[
    'modal_id'=>'institutioncontact_modal',
    'modal_title'=>'INSTITUTION CONTACT FORM',
    'modal_content'=>Form::autoForm(["name","email","phone_number","hidden_institution_id","role_of_contact",'form_model'=>\App\Models\Core\InstitutionContact::class],"provider/institutions/contacts")
])

<script>
    $('input[name="institution_id"]').val("{{ $institution->id }}");
</script>
