<a href="#institution_service_modal" class="btn btn-info btn-sm clear-form float-right" data-toggle="modal"><i class="fa fa-plus"></i> ADD SERVICES</a>
@include('common.auto_modal',[
       'modal_id'=>'institution_service_modal',
       'modal_title'=>'INSTITUTION SERVICE FORM',
       'modal_content'=>Form::autoForm(['services','cost','hidden_institution_id'=>$institution->id,'form_model'=>\App\Models\Core\InstitutionService::class],"provider/institutions/services")
   ])

@include('common.bootstrap_table_ajax',[
  'table_headers'=>["id","services.name"=>'service',"cost"],
  'data_url'=>'provider/institutions/services/list',
  'base_tbl'=>'institution_services'
  ])



