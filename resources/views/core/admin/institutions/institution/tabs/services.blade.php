
@include('common.bootstrap_table_ajax',[
  'table_headers'=>["id","services.name"=>'service',"cost"],
  'data_url'=>'admin/institutions/services/list/'.$institution->id,
  'base_tbl'=>'institution_services'
  ])



