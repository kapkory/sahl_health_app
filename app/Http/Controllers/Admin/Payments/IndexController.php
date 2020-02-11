<?php

namespace App\Http\Controllers\Admin\Payments;

use App\Http\Controllers\Controller;
use App\Models\Core\MemberPayment;
use App\Repositories\SearchRepo;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view($this->folder.'index');
    }

    /**
     * return memberpayment values
     */
    public function listMemberPayments(){
        $memberpayments = MemberPayment::join('packages','packages.id','=','member_payments.package_id')
            ->join('users','users.id','=','member_payments.member_id')
            ->where([
                ['member_payments.id','>',0]
            ])->select('member_payments.*','packages.name as package','users.name as user');

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
}
