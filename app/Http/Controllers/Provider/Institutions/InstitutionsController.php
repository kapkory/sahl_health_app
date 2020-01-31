<?php

namespace App\Http\Controllers\Provider\Institutions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Core\Institution;
use App\Repositories\SearchRepo;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;


class InstitutionsController extends Controller
{
            /**
         * return institution's index view
         */
    public function index(){
        return view($this->folder.'index',[

        ]);
    }

    /**
     * store institution
     */
    public function storeInstitution(){
        request()->validate($this->getValidationFields(['name','institution_level','organization_type','address','postal_code','featured_image','county','town']));
        $data = \request()->all();
//       dd($data);
        if(!isset($data['user_id'])) {
            if (Schema::hasColumn('institutions', 'user_id'))
                $data['user_id'] = request()->user()->id;
        }
        $data['slug'] = Str::slug($data['name']).'-'.rand(1,999);
        if (\request('featured_image') != ''){
            $image = request()->file('featured_image');
            $ext = $image->getClientOriginalExtension();
            $name = $data['slug']. "." . $ext;
            $image->move(storage_path() . '/app/public/institutions/images/', $name);
            $data['featured_image'] = 'storage/institutions/images/'.$name;
        }

        if (\request('logo') != ''){
            $logo = request()->file('logo');
            $ext = $logo->getClientOriginalExtension();
            $name = 'logo-'.$data['slug']. "." . $ext;
            $logo->move(storage_path() . '/app/public/institutions/logo/', $name);
            $data['logo_url'] = 'storage/institutions/logo/'.$name;
        }


        $data['organization_type_id'] = $data['organization_type'];
        $data['address_postal_code'] = $data['postal_code'];
        $data['institution_level_id'] = $data['institution_level'];
        $data['county_id'] = $data['county'];

        unset($data['institution_level']);
        unset($data['postal_code']);
        unset($data['organization_type']);
        unset($data['logo']);
        unset($data['submit']);
        unset($data['county']);
        $institution = $this->autoSaveModel($data);

        if (!auth()->user()->institution_id){
            $user= auth()->user();
            $user->institution_id = $institution->id;
            $user->save();
        }

        return ['redirect'=>url('provider/institutions')];
    }

    /**
     * return institution values
     */
    public function listInstitutions(){
        $institutions = Institution::join('institution_levels','institutions.institution_level_id','institution_levels.id')
            ->join('organization_types','institutions.organization_type_id','organization_types.id')
        ->where([
            ['institutions.user_id','=',auth()->id()]
        ])->select('institutions.*','institution_levels.name as category','organization_types.name as organization_type');
        if(\request('all'))
            return $institutions->get();
        return SearchRepo::of($institutions)
            ->addColumn('discount',function($institution){
              return '<b>'.$institution->discount.'% </b>';
            })
            ->addColumn('action',function($institution){
                $str = '';
                $json = json_encode($institution);
                $str.='<a href="'.url("provider/institutions/institution/".$institution->id).'" class="btn badge btn-info btn-sm"><i class="fa fa-eye"></i> View</a>';
//                $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/institutions/delete').'\',\''.$institution->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                return $str;
            })->make();
    }

    /**
     * delete institution
     */
    public function destroyInstitution($institution_id)
    {
        $institution = Institution::findOrFail($institution_id);
        $institution->delete();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'Institution deleted successfully']);
    }
}
