<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Core\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){
        $data = [];
        $data['revenue'] = 0;
        $data['visits'] = 0;
        if (auth()->user()->institution_id)
        {
            $institution_id = auth()->user()->institution_id;
            $visit = Visit::where('institution_id',$institution_id);
            $data['visits'] = $visit->count();
            if ($data['visits'] > 0){
                $total_bills = $visit->sum('amount');
                $savings = Visit::join('institutions','institutions.id','=','visits.institution_id')
                    ->where([
                        ['visits.user_id',auth()->id()]
                    ])->select(DB::raw('sum(visits.amount *institutions.discount) as savings'))
                    ->first();
                $data['revenue'] = $total_bills - ($savings->savings / 100);
            }
        }


        return view($this->folder.'index',compact('data'));
    }

    public function registration(){
        return view($this->folder.'registration');
    }

    public function createInstitution(){
        return view($this->folder.'create_institution');
    }
}
