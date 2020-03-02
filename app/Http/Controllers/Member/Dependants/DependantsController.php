<?php

namespace App\Http\Controllers\Member\Dependants;

use App\Http\Controllers\Controller;
use App\Models\Core\Identification;
use App\Models\Core\MemberPackage;
use App\Repositories\StatusRepository;
use App\Repositories\TechpitMessageRepository;
use Illuminate\Http\Request;

use App\Models\Core\Dependant;
use App\Repositories\SearchRepo;
use Illuminate\Support\Facades\Schema;

class DependantsController extends Controller
{
            /**
         * return dependant's index view
         */
    public function index(){
        $memberPackage = MemberPackage::where('member_id',auth()->id())
            ->orderBy('id','desc')->first();
//        $package =
        return view($this->folder.'index',compact('memberPackage'));
    }

    public function viewPayments($code = null){
        $amount = 0;

        if ($code)
        {
            $dependants = Dependant::where('random_code',$code)->get();
            $count = auth()->user()->countDependants();
//            $total_count = auth()->user()->countPaidDependants();
            $amount = $this->calculateAmount($count);
        }
        else{
            $dependants = Dependant::where('user_id',auth()->id())
                ->where('status','!=',2)
                ->get();

            $counts = count($dependants);
            $amount = $this->calculateTotalAmount($counts);
        }
        $count = auth()->user()->countDependants();
        $amount = $this->calculateAmount($count);
        return view($this->folder.'payment',compact('amount','dependants'));
    }

    //called when paying for a single dependant
    public function calculateAmount($count){
        $total_count = Dependant::where('user_id',auth()->id())
                   ->where('status',StatusRepository::getDependantSubscriptionStatus('active'))
                    ->count();
//        if ()
        $amount = 2499;
        if ($total_count <= 2){
            $amount = 1499;
        }else if($total_count > 3)
            $amount = 999;

        return $total_count;
    }

    //for more than one dependant
    public function calculateTotalAmount($count){
        $amount = 0;
        if ($count == 1)
            $amount = 2499;
        else if ($count == 2){
            $amount = 1499 + 1499;
        }else if($count == 3)
            $amount = 1499 + 999 + 999;
        elseif($count > 3){
            $count = $count - 3;
            $amount = 999 * $count;
            $amount = $amount +1499 + 999 + 999;
        }
        return $amount;
    }

    /**
     * store dependant
     */
    public function storeDependant(){
        request()->validate($this->getValidationFields(['first_name','last_name','relationship_type']));
        $data = \request()->all();
        if(!isset($data['user_id'])) {
            if (Schema::hasColumn('dependants', 'user_id'))
                $data['user_id'] = request()->user()->id;
        }
        $pay = $data['pay'];
        unset($data['pay']);
        $data['random_code'] = rand(999,100000);

        //check if user has an active paid package and can add dependants without paying for
        if (auth()->user()->member_package_id){
            $memberPackage = MemberPackage::findOrFail(auth()->user()->member_package_id);
           //prevents activating dependants that exceed current user package number
            if ($memberPackage->package->number_of_members > auth()->user()->countAllDependants()){
                $data['status'] = StatusRepository::getDependantSubscriptionStatus('active');
                $data['expires_on'] = $memberPackage->ends_at;
            }
        }

        $dependant = $this->autoSaveModel($data);

       //prevent billing active dependants
        if ($dependant->status !=StatusRepository::getDependantSubscriptionStatus('active') ){
            $count = auth()->user()->countDependants();
            $amount = $this->calculateAmount($count);
            $address[]  = preg_replace('/^\\D*/', '', auth()->user()->getFormattedPhone());
            $message = 'You have added '.\request('first_name').', as your dependant, for them to access Sahlhealth Services, kindly follow this link '.url('member/dependants/payments/'.$dependant->random_code).' to pay '.$amount;
            $techpitch = new TechpitMessageRepository();
            $response = $techpitch->execute($message,$address);
        }


        if ($pay == 0)
            return redirect()->back()->with('notice',['type'=>'success','message'=>'Dependant Added Successfully']);
        else{
            return ['redirect'=>url('member/dependants/payments/'.$dependant->random_code)];
        }
    }

    //returns api results
    public function addDependant(){
        request()->validate($this->getValidationFields(['first_name','last_name','relationship_type']));
        $dependant = new Dependant();
        $dependant->user_id = auth()->id();
        $dependant->first_name = \request('first_name');
        $dependant->last_name = \request('last_name');
        if (\request('identification_type'))
        {
            $dependant->identification_type_id = \request('identification_type');
            $dependant->identification_number = \request('identification_number');
        }
        $dependant->relationship_type = \request('relationship_type');
        $dependant->save();


        if (\request('add_dependant') == 0)
            return ['redirect_url'=>url('member/payment')];

        return ['redirect_url'=>url('member/nominate-dependant?added=true')];

    }

    /**
     * return dependant values
     */
    public function listDependants(){
        $dependants = Dependant::where([
            ['user_id','=',auth()->id()]
        ]);
        if(\request('all'))
            return $dependants->get();
        return SearchRepo::of($dependants)
            ->addColumn('name',function($dependant){
              return   $dependant->first_name.' '.$dependant->other_name.' '.$dependant->last_name;
            })
            ->addColumn('identification_type',function($dependant){
                if ($dependant->identification_type_id)
                    return @Identification::findOrFail($dependant->identification_type_id)->name .' '.$dependant->identification_number;
              return  'N/A';
            })
            ->addColumn('action',function($dependant){
                $str = '';
                $json = json_encode($dependant);
                $str.='<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'dependant_modal\');" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>';
                $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/dependants/delete').'\',\''.$dependant->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                return $str;
            })->make();
    }

    /**
     * delete dependant
     */
    public function destroyDependant($dependant_id)
    {
        $dependant = Dependant::findOrFail($dependant_id);
        $dependant->delete();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'Dependant deleted successfully']);
    }
}
