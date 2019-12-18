@include('common.bootstrap_table_ajax',[
   'table_headers'=>["id","name","email","phone","action"],
   'data_url'=>'admin/users/list/provider',
    'base_tbl'=>'users'
 ])
