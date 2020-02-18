<?php

namespace App\Repositories;
use App\Models\Core\Settings\DynamicAttribute;
use URL;
use Auth;
class FormRepository
{
    public static function replaceLinks($text){
        $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
        if(preg_match($reg_exUrl, $text, $url)) {
            return preg_replace($reg_exUrl, '<a target="_blank" href="'.$url[0].'">'.$url[0].'</a> ', $text);
        } else {
            return $text;
        }
    }

    public function autoGenerate($elements,$action=null,$classes = [],$model=null){
        $spoofed_method = '';
        $info = '';

        $elements_count = $this->countElements($elements);
        if(isset($model['id']) && @$model['id'] != 0)
            $info = '<div class="alert alert-info">Update Details</div>';

        if($model){
            if(!is_array($model)){
                $model = $model->toArray();
            }

            $action = $action.'/'.$model['id'];
            $spoofed_method = method_field('put');
        }
        $classes[] = 'ajax-post';
        $classes[] = 'model_form_id';

        $textareas = ['description','answer','more_information','reason','email_message','sms_message','html',
            'comment',"testimonial",'about','address','postal_address','message','invoice_footer',
            'security_credential','facilities','reason_rejected','note','instructions'];
        $selects = [];
        $selects['from_branch'] = [];
        $selects['to_branch'] = [];
        $selects['inc_type'] = ["amount", "percentage"];
        $selects['payment_mode'] = ["mpesa", "cash",'bank'];
        $selects['applied_to'] = ["staff", "products"];
        $selects['target'] = ["providers", "clients"];
        $selects['services'] = [];

        $selects_val = [];

        $selects_val['downloadable'] = [
            '0'=>'No',
            '1'=>'Yes',
        ];

        $selects_val['role'] = [
            'admin'=>'admin',
            'provider'=>'provider',
            'agent'=>'agent',
            'member'=>'member'
        ];
        $selects_val['taxable'] = [
            '0'=>'No',
            '1'=>'Yes',
        ];

        $selects_val['file_type'] = ['Please select'];
        $selects_val['attribute_type'] = [
            'text'=>'Text',
            'textarea'=>'TextArea',
            'select'=>'Select',
            'multiselect'=>'MultiSelect',
        ];

        if(in_array('field_type',$elements)){
            $selects_val['field_type'] = [
                'text'=>'Text',
                'long_text'=>'Long Text',
                'select'=>'Select',
                'multi_select'=>'Multi Select'
            ];
        }
        if(in_array('is_required',$elements)){
            $selects_val['is_required'] = [
                '0'=>'No',
                '1'=>'Yes',
            ];
        }
        if(in_array('tax_status',$elements)){
            $selects_val['tax_status'] = [
                'no_tax'=>'No Tax',
                'tax_included'=>'Tax Included',
                'plus_tax'=>'Plus Tax',
            ];
        }

        $passwords = ['password','password_confirmation'];
        $selects['short_code_type'] = ['till_number','paybill'];
        $selects['environment'] = ['production','sandbox'];
        $selects['identification_type'] = ['ID Number','Passport Number','Driving License','Huduma Number'];
        $selects['gender'] = ['Male','Female'];
        $selects['recurring'] = ['yes','no'];
        $selects['profit_by'] = ['commission','fixed_amount'];
        $selects['recurring_period'] = ['weekly','monthly','quarterly','semi-annually','annually'];
        $selects['currency'] = ['USD','KES'];
        $selects['relationship_type'] = ['spouse','child','parent','grand parent','grand children','other'];
        $selects['region'] = ['central','coast','eastern','nairobi','north eastern','nyanza','rift valley','western'];
        $class = 'ajax-post';
        $enctype = '';
        $files = ['registration_file','image','images','file','icon','profile_pic','avatar','default_image','video_file'];
        foreach($files as $file){
            if(in_array($file,$elements)){
                $enctype = 'multipart/form-data';
                $classes = [];
                $classes[] = 'model_form_id';
                $classes[] = "file-form";
                break;
            }
        }
        if($elements_count > 5){
            $classes[]='row';
        }
        $classes = implode(' ',$classes);
        $checkboxes = [];
        $radioboxes = [];

        $checkboxes['downloadable'] = ['yes','no'];
        $radioboxes['is_provider'] = ['yes','no'];
        $form_string = '';
        $id='model_form_id';

        $form_string.=$info.'<form id="" enctype="'.$enctype.'" class="'.$classes.'" method="post" action="'.url($action).'">
           <input type="hidden" name="id" value="'.@$model['id'].'">
           <input type="hidden" name="entity_name">';
        if(isset($elements['form_model'])){
            $form_string.='<input type="hidden" name="form_model" value="'.$elements['form_model'].'">';
            unset($elements['form_model']);
        }
        $form_string.=$spoofed_method;
        $halve = round($elements_count/2,0);
        if($elements_count > 5){
            $form_string.='<div class="col-md-6">';
        }
        $form_string.=csrf_field();
        $input_masks = [];
        $input_masks['start_time'] = '00:00:00';
        $no = 0;

        foreach($elements as $element_data=>$element){
            if(strpos($element_data,'hidden_') === false && strpos($element,'hidden_') === false){

            }else{
                if(strpos($element,'hidden_') === false){
                    $form_string.='<input type="hidden" name="'.str_replace('hidden_','',$element_data).'" value="'.$element.'">';
                    unset($elements[$element_data]);
                }else{
                    $form_string.='<input type="hidden" name="'.str_replace('hidden_','',$element).'" value="">';
                }
                continue;

            }
            $no++;
            $array = explode('_',$element);
            $form_string.='<div class="form-group '.$element.'">';
            $form_string.='<div class="fg-line">';
            $label_strings = str_replace('ipoooid','',$element);
            if($element == 'terms' || $element == 'default' ){
                // $form_string.='<label class="fg-label control-label">'.ucwords(str_replace('_',' ','Accept temrs and conditions?')).'</label>';
            }else{
                $form_string.='<label class="fg-label control-label label_'.$element.'">'.ucwords(str_replace('_',' ',$label_strings)).'</label>';
            }


            if(in_array($element,$textareas)){
                $form_string.='<textarea name="'.$element.'" class="form-control">'.@$model[$element].'</textarea>';
            }elseif($element == 'terms'){
                $form_string.='<input name="'.$element.'" value="yes" type="checkbox" checked="true">';
                $form_string.='<label class="fg-label control-label">'.ucwords(str_replace('_',' ','I Accept terms and conditions')).'</label>';
            }
            elseif($element == 'default'){
                $form_string.='<input name="'.$element.'"  type="radio" >';
                $form_string.='<label class="fg-label control-label">'.ucwords($element).'</label>';
            }
            elseif($array[count($array)-1]=='id' && isset($selects[$element]) == false && isset($selects_val[$element]) == false && $element !== "national_id"){
                $form_string.='<div class="select">';
                $data_model = '';
                $add_class = '';
                if(!is_integer($element_data)){
                    $data_model = ' data-model="'.$element_data.'" ';
                    $add_class = "auto-fetch-select";
                }

                $form_string.='<select '.$data_model.' name="'.$element.'" class="form-control '.$add_class.'">'.@$model[$element].'<option value="">Select...</a></select>';
                $form_string.='</div>';
            }elseif($array[count($array)-1]=='file'){
                $form_string.='<input type="file" name="'.$element.'" class="form-control">';
            }elseif(in_array($element,$files)){
                $form_string.='<input type="file" name="'.$element.'" class="form-control">';
            }elseif(in_array($element,$passwords)){
                $form_string.='<input type="password" name="'.$element.'" class="form-control">';
            }elseif(isset($selects[$element])){
                $form_string.='<div class="select">';
                $form_string.='<select name="'.$element.'" class="form-control">';
                foreach($selects[$element] as $option){
                    if(@$model[$element] == $option){
                        $form_string.='<option selected value="'.$option.'">'.ucwords(str_replace('_',' ',$option)).'</option>';
                    }else{
                        $form_string.='<option value="'.$option.'">'.ucwords(str_replace('_',' ',$option)).'</option>';
                    }
                }
                $form_string.='</select>';
                $form_string.='</div>';
            }elseif(isset($selects_val[$element])){
                $form_string.='<div class="select">';
                $form_string.='<select name="'.$element.'" class="form-control">';
                foreach($selects_val[$element] as $key=>$value){
                    if(@$model[$element] == $key){
                        $form_string.='<option selected value="'.$key.'">'.ucwords($value).'</option>';
                    }else{
                        $form_string.='<option value="'.$key.'">'.ucwords($value).'</option>';
                    }
                }
                $form_string.='</select>';
                $form_string.='</div>';
            }
            elseif(isset($checkboxes[$element])){
                $form_string.='<div class="checkboxes">';
                foreach($checkboxes[$element] as $checkbox){
                    if(@$model[$element] == $checkbox){
                        $form_string.='<input checked class="" type="checkbox" name="'.$element.'[]" value="'.strtolower(str_replace(' ','_',$checkbox)).'">'.ucwords($checkbox).'<br/>';
                    }else{
                        $form_string.='<input class="" type="checkbox" name="'.$element.'[]" value="'.strtolower(str_replace(' ','_',$checkbox)).'">'.ucwords($checkbox).'<br/>';
                    }
                }
                $form_string.='</div>';
            }
            elseif(isset($radioboxes[$element])){
                $form_string.='<div class="checkboxes">';
                foreach($radioboxes[$element] as $radiobox){
                    if(@$model[$element] == $radiobox){
                        $form_string.='<div class="form-check mb-2"><input class="form-check-input" type="radio" name="'.$element.'" value="'.strtolower(str_replace(' ','_',$radiobox)).'"> '.ucwords($radiobox).'<br/></div>';
                    }else{
                        $form_string.='<div class="form-check mb-2"><input class="form-check-input" type="radio" name="'.$element.'" value="'.strtolower(str_replace(' ','_',$radiobox)).'"> '.ucwords($radiobox).'<br/></div>';
                    }
                }
                $form_string.='</div>';
            }
            else{
                if(isset($input_masks[$element])){
                    $form_string.='<input value="'.@$model[$element].'" type="text" data-mask="'.$input_masks[$element].'" name="'.$element.'" class="form-control input-mask">';

                }else{
                    $form_string.='<input value="'.@$model[$element].'" type="text" name="'.$element.'" class="form-control">';

                }
            }
            $form_string.='</div>';
            $form_string.='</div>';
            if($elements_count > 5)
                if($no == $halve || $no == $halve*2){
                    $form_string.='</div>';
                    $form_string.='<div class="col-md-6">';
                }


        }
        if($elements_count > 5)
            $form_string.='</div>';

        $form_string.='<div class="form-group row">
<label class="control-label col-md-3">&nbsp;&nbsp;</label>
<div class="col-md-6">
<button type="submit" class="btn btn-primary btn-raised submit-btn"><i class="zmdi zmdi-save"></i> Submit</button>
</div>
</div>';
        $form_string.='</form>';
        return $form_string;
    }

    public function countElements($all_elements)
    {
        $count = 0;
        $hidden_fields = [];
        $fields = [];
        if(array_key_exists('form_model',$all_elements))
            unset($all_elements['form_model']);
        foreach($all_elements as $element_data=>$element){
            if(strpos($element_data,'hidden_') === false && strpos($element,'hidden_') === false){
                $count +=1;
            }else {
                if (strpos($element, 'hidden_') === false)
                    $count -=1;
            }
        }
        return $count;
    }

}
