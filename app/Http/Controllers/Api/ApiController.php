<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Core\InstitutionLevel;
use App\Models\Core\OrganizationType;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function variables($variable){
        $response = '';
        switch ($variable){
            case 'levels':
                $response = InstitutionLevel::select('id','name')->get();
                break;
            case 'organization_types':
                $response = OrganizationType::select('id','name')->get();
        }
        return $response;
    }
}
