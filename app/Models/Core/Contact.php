<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

	protected $fillable = ["name","phone_number"];
   public function institution(){
       return $this->belongsTo(Institution::class);
   }

    public function contacts(){
        return $this->belongsToMany(Contact::class);
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
}
