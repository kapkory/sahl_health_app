<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Core\Dependant;
use Illuminate\Http\Request;

class VariablesController extends Controller
{
    public function listVariables(){
        return [
            'dependants'=>Dependant::select('id','user_id','first_name','last_name','other_name','identification_number','relationship_type')->get()
        ];
    }
}
