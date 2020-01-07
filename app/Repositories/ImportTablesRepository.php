<?php


namespace App\Repositories;


use App\Models\Core\Dependant;
use App\Models\Core\Identification;
use App\Models\Core\Institution;
use App\Models\Core\InstitutionLevel;
use App\Models\Core\MemberPackage;
use App\Models\Core\MemberPayment;
use App\Models\Core\OrganizationType;
use App\Models\Core\Package;
use App\Models\Core\Profile;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ImportTablesRepository
{
    public function createUser($user){
        $name = $user->firstname.' '.$user->othername.' '.$user->lastname;
      $new_user = new User();
        $new_user->id = $user->id;
        $new_user->name = ($name == '') ? 'N/A' : $name;
        $new_user->email = $user->email;
        $new_user->phone_number = $user->username;
        $new_user->password = $user->password_hash;
        $new_user->institution_id = $user->institution_id;
        $new_user->role = ($user->user_type == 'PROVIDER') ? 'provider' : 'member';
        $new_user->verification_code = $user->verification_code;
        $new_user->verified_at = ($user->confirmed_at) ? Carbon::createFromTimestamp($user->confirmed_at)->toDateTimeString():Null;
        $new_user->created_at = Carbon::createFromTimestamp($user->created_at)->toDateTimeString();
        $new_user->updated_at = Carbon::createFromTimestamp($user->updated_at)->toDateTimeString();
        $new_user->save();
    }

    public function createOrganization($organization){
        $org = new OrganizationType();
        $org->name = $organization->name;
        $org->slug = Str::slug($organization->name);
        $org->user_id = $organization->created_by;
        $org->save();
    }

    public function createInstitutionLevel($level){
        $org = new InstitutionLevel();
        $org->name = $level->name;
        $org->slug = Str::slug($level->name);
        $org->facilities = $level->facilities;
        $org->created_by = $level->created_by;
        $org->save();
    }

    public function createInstitution($institution){
        $inst = new Institution();
        $inst->name = $institution->name;
        $inst->slug = Str::slug($institution->name);
        $inst->address = $institution->address;
        $inst->address_postal_code = $institution->address_postal_code;
        $inst->institution_level_id = $institution->institution_level_id;
        $inst->organization_type_id = $institution->institution_org_type_id;
        $inst->is_branch = $institution->is_branch;
        $inst->parent_institution_id = $institution->parent_institution_id;
        $inst->discount = $institution->discount * 100;
        $inst->status = 1;
        $inst->featured_image = $institution->featured_image;
        $inst->intro  = $institution->intro;
        $inst->user_id = $institution->created_by;
        $inst->save();
    }

    public function createDependant($dependant){
        $dep = new Dependant();
        $dep->first_name = $dependant->firstname;
        $dep->last_name = $dependant->lastname;
        $dep->other_name = $dependant->othername;
        $dep->email = $dependant->email;
        $dep->phone = $dependant->username;
        $dep->relationship_type = ($dependant->dependant_relationship == 1) ? 'spouse' :'child';
        $dep->user_id = $dependant->principle_member_id;
        $dep->save();
    }

    public function createIdentification($identification){
        $ident = new Identification();
        $ident->name = $identification->name;
        $ident->is_provider = $identification->is_provider;
        $ident->user_id = $identification->created_by;
        $ident->save();
    }

    public function createProfile($profile){
        $pr = new Profile();
        $pr->user_id = $profile->user_id;
        $pr->date_of_birth  = $profile->date_of_birth;
        $pr->identification_type_id = $profile->identification_type_id;
        $pr->identification_number = $profile->identification_number;
        $pr->timezone = $profile->timezone;
        $pr->save();
    }

    public function createDependantProfile($profile){
//        $dependant = Dependant::where()
    }

    public function createPackage($package){
        $pack = new Package();
        $pack->name = $package->name;
        $pack->slug= Str::slug($package->name);
        $pack->package_category_id = 1;
        $pack->cost = $package->cost;
        $pack->description = $package->description;
        $pack->user_id = $package->created_by;
        $pack->duration =12;
        $pack->number_of_members =1;
        $pack->save();
    }

    public function createPayment($payment){
        $memberPackage = new MemberPackage();
        $memberPackage->member_id = $payment->member_id;
        $memberPackage->package_id= $payment->package_id;
        $memberPackage->amount= $payment->amount;
        if ($payment->status == 'COMPLETE'){
            $day  = Carbon::createFromTimestamp($payment->transaction_date);
            $memberPackage->started_on =$day->toDateTimeString();
            $memberPackage->ends_at = $day->addMonths(12)->toDateTimeString();
            $memberPackage->status = 1;

        }
        $memberPackage->save();

        if ($payment->status == 'COMPLETE'){
            $user = User::findOrFail($payment->member_id);
            $user->member_package_id = $memberPackage->id;
            $user->save();
        }


        $pay = new MemberPayment();
        $pay->member_id = $payment->member_id;
        $pay->package_id= $payment->package_id;
        $pay->amount = $payment->amount;
        $pay->reference = $payment->reference;
        $pay->payment_mode = $payment->payment_mode;
        $pay->payer_id = $payment->payer_id;
        $pay->status = ($payment->status == 'COMPLETE') ? 2 :3;
        $pay->comment =$payment->comment;
        $pay->created_at =Carbon::createFromTimestamp($payment->transaction_date)->toDateTimeString();;
        $pay->save();

    }

}
