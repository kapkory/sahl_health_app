@include('common.bootstrap_table_ajax',[
        'table_headers'=>["users.name"=>"name","packages.name"=>"package","amount","created_at"=>"day_referred"],
        'data_url'=>'admin/payments/referrals/list/active',
        'base_tbl'=>'referrals'
        ])
