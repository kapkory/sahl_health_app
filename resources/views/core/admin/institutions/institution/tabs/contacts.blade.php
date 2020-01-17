@include('common.bootstrap_table_ajax',[
'table_headers'=>["id","name","email","phone_number","role","action"],
'data_url'=>'admin/institutions/contacts/list/'.$institution->id,
'base_tbl'=>'institution_contacts'
])



