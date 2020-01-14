<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Core\Service;
use App\Models\Core\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class IndexController extends Controller
{
    public function index(){
        $data = [];
        $data['revenue'] = 0;
        $data['visits'] = 0;
        $data['customer_savings'] = 0;

        $visit = Visit::where('id','>',0);
        $data['visits'] = $visit->count();
        if ($data['visits'] > 0){
            $total_bills = $visit->sum('amount');
            $savings = Visit::join('institutions','institutions.id','=','visits.institution_id')
               ->select(DB::raw('sum(visits.amount *institutions.discount) as savings'))
                ->first();
            $data['customer_savings'] = $savings->savings / 100;
            $data['revenue'] = $total_bills - $data['customer_savings'];

        }

        return view($this->folder.'index',compact('data'));
    }
}
