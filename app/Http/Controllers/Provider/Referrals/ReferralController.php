<?php

namespace App\Http\Controllers\Provider\Referrals;

use App\Http\Controllers\Controller;
use App\Models\Core\Institution;
use App\Repositories\TechpitMessageRepository;
use App\User;
use Illuminate\Http\Request;

use App\Models\Core\Referral;
use App\Repositories\SearchRepo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class ReferralController extends Controller
{
            /**
         * return referral's index view
         */
    public function index(){
        return view($this->folder.'index',[

        ]);
    }

    /**
     * store referral
     */
    public function storeReferral(){
        $this->validate(\request(), [
            'first_name' => 'required|max:255',
            'last_name' => 'required',
            'phone_number' => 'required|min:10',
        ]);
        $user = new User();
        $user->name = \request('first_name').' '.\request('last_name');
        $user->email = \request('email');
        $user->phone_number = \request('phone_number');
        $user->password = bcrypt(\request('phone_number'));
        $user->save();

        $referral = new Referral();
        $referral->user_id = \auth()->id();
        $referral->referral_id = $user->id;
        $referral->save();


        $address[]  = $user->getFormattedPhone();
        $provider = auth()->user();
        $names = explode(' ',$provider->name);
        $institution_id = $provider->institution_id;
        $institution = Institution::findOrfail($institution_id);

        $message = 'Hi '.\request('first_name').', You have been invited to sign up for Sahl Health Membership by '.$names[0]. ', '.$institution->name. '. Follow the link to complete registration '.url('member-referral/'.$referral->id.'/'.$user->referral_code);
        $techpitch = new TechpitMessageRepository();

        $response = $techpitch->execute($message,$address);
        return ['redirect_url'=>url('provider')];
    }

    /**
     * return referral values
     */
    public function listReferrals(){
        $referrals = Referral::where([
            ['id','>',0]
        ]);
        if(\request('all'))
            return $referrals->get();
        return SearchRepo::of($referrals)
            ->addColumn('action',function($referral){
                $str = '';
                $json = json_encode($referral);
                $str.='<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'referral_modal\');" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>';
                $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/referrals/delete').'\',\''.$referral->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                return $str;
            })->make();
    }

    /**
     * delete referral
     */
    public function destroyReferral($referral_id)
    {
        $referral = Referral::findOrFail($referral_id);
        $referral->delete();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'Referral deleted successfully']);
    }
}
