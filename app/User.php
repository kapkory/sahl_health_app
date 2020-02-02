<?php

namespace App;

use App\Models\Core\FavoriteInstitution;
use App\Models\Core\Institution;
use App\Models\Core\Profile;
use App\Models\Core\Visit;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','phone_number','facebook_id','google_id','role', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'phone_number_verified_at' => 'datetime',
    ];

    public function hasVerifiedPhone()
    {
        return ! is_null($this->phone_number_verified_at);
    }

    public function markPhoneAsVerified()
    {
        return $this->forceFill([
            'phone_number_verified_at' => $this->freshTimestamp(),
        ])->save();
    }

    public function getFormattedPhone()
    {
        $country_code = '254';
//        $country_code = str_replace('+', '', $country_code);
        $phone = $this->phone_number;
        $phone = str_replace('+', '', $phone);
        if (strlen($phone) == 9) {
            $phone = $country_code . $phone;
        } elseif (strlen($phone) == 10) {
            $phone = "+" . $phone;
            $phone = str_replace('+0', $country_code, $phone);
        }
        return $phone;
    }

    public function institutions(){
        return $this->hasMany(Institution::class);
    }

    public function visits(){
        return $this->hasMany(Visit::class);
    }

    public function getInstitutionName(){
        $institution = Institution::where('user_id',$this->id)->first();
        return @$institution->name;
    }

    public static function hasFavoriteInstitution($institution_id,$user_id){
        $count  = FavoriteInstitution::where('user_id',$user_id)->count();
        if ($count >= 3)
            return false;

        $favorite = FavoriteInstitution::where('institution_id',$institution_id)
            ->where('user_id',$user_id)->get();
        if ($favorite->isEmpty())
            return true;

        return false;
    }

    public function profile(){
        return $this->hasOne(Profile::class);
    }
}
