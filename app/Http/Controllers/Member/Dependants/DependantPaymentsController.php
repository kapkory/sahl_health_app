<?php

namespace App\Http\Controllers\Member\Dependants;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Core\DependantPayment;
use App\Repositories\SearchRepo;
use Illuminate\Support\Facades\Schema;

class DependantPaymentsController extends Controller
{
            /**
         * return dependantpayment's index view
         */
    public function index(){
        return view($this->folder.'index',[

        ]);
    }

    /**
     * store dependantpayment
     */
    public function storeDependantPayment(){
        request()->validate($this->getValidationFields());
        $data = \request()->all();
        if(!isset($data['user_id'])) {
            if (Schema::hasColumn('dependantpayments', 'user_id'))
                $data['user_id'] = request()->user()->id;
        }
        $this->autoSaveModel($data);
        return redirect()->back();
    }

    /**
     * return dependantpayment values
     */
    public function listDependantPayments(){
        $dependantpayments = DependantPayment::where([
            ['id','>',0]
        ]);
        if(\request('all'))
            return $dependantpayments->get();
        return SearchRepo::of($dependantpayments)
            ->addColumn('action',function($dependantpayment){
                $str = '';
                $json = json_encode($dependantpayment);
                $str.='<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'dependantpayment_modal\');" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>';
                $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/dependantpayments/delete').'\',\''.$dependantpayment->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                return $str;
            })->make();
    }

    /**
     * delete dependantpayment
     */
    public function destroyDependantPayment($dependantpayment_id)
    {
        $dependantpayment = DependantPayment::findOrFail($dependantpayment_id);
        $dependantpayment->delete();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'DependantPayment deleted successfully']);
    }
}
