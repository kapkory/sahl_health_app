<?php

namespace App\Http\Controllers\Provider\Institutions;

use App\Http\Controllers\Controller;
use App\Models\Core\Institution;
use Illuminate\Http\Request;

use App\Models\Core\InstitutionImage;
use App\Repositories\SearchRepo;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class ImagesController extends Controller
{
            /**
         * return institutionimage's index view
         */
    public function index(){
        return view($this->folder.'index',[

        ]);
    }

    /**
     * store institutionimage
     */
    public function storeInstitutionImage(){
        $institution_id = auth()->user()->institution_id;
        $institution = Institution::findOrFail($institution_id);
        $slug = Str::slug($institution->name).'-'.rand(0,152);

        $image = request()->file('file');
        $ext = $image->getClientOriginalExtension();
        $size = $image->getSize();
        $name = $slug. "." . $ext;
        $image->move(storage_path() . '/app/public/institutions/images/', $name);
        $path = 'storage/institutions/images/'.$name;

        $instImage = new InstitutionImage();
        $instImage->institution_id = $institution_id;
        $instImage->path = $path;
        $instImage->user_id = auth()->id();
        $instImage->size = $size;
        $instImage->save();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'Image has been successfully uploaded']);
    }

    /**
     * return institutionimage values
     */
    public function listInstitutionImages(){
        $institutionimages = InstitutionImage::where([
            ['id','>',0]
        ]);
        if(\request('all'))
            return $institutionimages->get();
        return SearchRepo::of($institutionimages)
            ->addColumn('path',function ($institutionimage){
                return '<img src="'.url($institutionimage->path).'" height="60">';
            })
            ->addColumn('action',function($institutionimage){
                $str = '';
                $json = json_encode($institutionimage);
//                $str.='<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'institutionimage_modal\');" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>';
                $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/institutionimages/delete').'\',\''.$institutionimage->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                return $str;
            })->make();
    }

    /**
     * delete institutionimage
     */
    public function destroyInstitutionImage($institutionimage_id)
    {
        $institutionimage = InstitutionImage::findOrFail($institutionimage_id);
        $institutionimage->delete();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'InstitutionImage deleted successfully']);
    }
}
