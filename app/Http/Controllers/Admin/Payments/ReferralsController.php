<?php

namespace App\Http\Controllers\Admin\Payments;

use App\Http\Controllers\Controller;
use App\Models\Core\MemberPackage;
use App\Models\Core\Referral;
use App\Repositories\SearchRepo;
use App\Repositories\StatusRepository;
use Illuminate\Http\Request;

class ReferralsController extends Controller
{

    public function index(){

        return view($this->folder.'referrals.index');
    }
    /**
     * return referral values
     */
    public function listReferrals($status){

        $referrals = Referral::join('users','referrals.referral_id','=','users.id')
            ->join('member_packages','member_packages.member_id','=','referrals.referral_id')
            ->join('packages','packages.id','=','member_packages.package_id')
            ->where('referrals.status',StatusRepository::getReferralStatus($status))
            ->select('users.name as name','referrals.*',"packages.name as package");

        if(\request('all'))
            return $referrals->get();
        return SearchRepo::of($referrals)
            ->addColumn('day_referred',function($referral) {
                return $referral->created_at->diffForHumans();
            })
            ->addColumn('action',function($referral){
                $str = '';
                $json = json_encode($referral);
                $str.='<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'referral_modal\');" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>';
                $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/referrals/delete').'\',\''.$referral->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                return $str;
            })->make();
    }
}
