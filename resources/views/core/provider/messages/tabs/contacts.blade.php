<a href="#contact_modal" class="btn btn-info btn-sm clear-form float-right" data-toggle="modal"><i class="fa fa-plus"></i> ADD CONTACT</a>
    @include('common.bootstrap_table_ajax',[
    'table_headers'=>["id","name","phone_number","action"],
    'data_url'=>'provider/messages/contacts/list',
    'base_tbl'=>'contacts'
    ])

    @include('common.auto_modal',[
        'modal_id'=>'contact_modal',
        'modal_title'=>'CONTACT FORM',
        'modal_content'=>Form::autoForm(\App\Models\Core\Contact::class,"provider/messages/contacts")
    ])

