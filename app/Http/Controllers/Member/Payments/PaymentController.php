<?php

namespace App\Http\Controllers\Member\Payments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Core\MemberPayment;
use App\Repositories\SearchRepo;
use Illuminate\Support\Facades\Schema;

class PaymentController extends Controller
{
            /**
         * return memberpayment's index view
         */
    public function index(){
        return view($this->folder.'index',[

        ]);
    }

//    /**
//     * store memberpayment
//     */
//    public function storeMemberPayment(){
//        request()->validate($this->getValidationFields());
//        $data = \request()->all();
//        if(!isset($data['user_id'])) {
//            if (Schema::hasColumn('memberpayments', 'user_id'))
//                $data['user_id'] = request()->user()->id;
//        }
//        $this->autoSaveModel($data);
//        return redirect()->back();
//    }

    /**
     * return memberpayment values
     */
    public function listMemberPayments(){
        $memberpayments = MemberPayment::join('packages','packages.id','=','member_payments.package_id')
        ->where([
            ['member_payments.member_id','=',auth()->id()],
        ])->select('member_payments.*','packages.name as package');
        if(\request('all'))
            return $memberpayments->get();
        return SearchRepo::of($memberpayments)
            ->addColumn('status',function ($memberpayment){
                if ($memberpayment->status == 2)
                    return '<p class="mb-1 h3 text-success font-weight-500">Paid</p>';
                elseif($memberpayment->status == 3)
                    return '<p class="mb-1 h3 text-sky-blue font-weight-500">Failed</p>';
                else
                    return '<p class="mb-1 h3 text-secondary font-weight-500">Processing</p>';

            })
            ->addColumn('action',function($memberpayment){
                $str = '';
                $json = json_encode($memberpayment);
                $str.='<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'memberpayment_modal\');" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>';
                $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/memberpayments/delete').'\',\''.$memberpayment->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                return $str;
            })->make();
    }

//    /**
//     * delete memberpayment
//     */
//    public function destroyMemberPayment($memberpayment_id)
//    {
//        $memberpayment = MemberPayment::findOrFail($memberpayment_id);
//        $memberpayment->delete();
//        return redirect()->back()->with('notice',['type'=>'success','message'=>'MemberPayment deleted successfully']);
//    }
}
