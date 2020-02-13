@include('common.bootstrap_table_ajax',[
    'table_headers'=>["id","path","size","action"],
    'data_url'=>'provider/institutions/images/list',
    'base_tbl'=>'institution_images',
    'search_table'=>'blank'
    ])
