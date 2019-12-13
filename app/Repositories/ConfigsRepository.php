<?php
/**
 * Created by PhpStorm.
 * User: kemboi
 * Date: 22/03/19
 * Time: 3:05 PM
 */

namespace App\Repositories;


use App\Models\Core\PriceConfig;
use App\Models\Core\Tax;
use App\User;

class ConfigsRepository
{

    /**
     * convert digits to string code
     */
    public static function getCostCodeIndexed($amount){
        $str = null;
        if(!is_numeric($amount))
            return null;
        $price_config = PriceConfig::where('company_id',request()->user()->id)->select('num_0 as num_0','num_1 as num_1','num_2 as num_2','num_3 as num_3','num_4 as num_4','num_5 as num_5','num_6 as num_6','num_7 as num_7','num_8 as num_8','num_9 as num_9')->first();
        if($price_config){
            $amount = (string)$amount;
            for ($i = 0; $i < strlen($amount); $i++){
                if($amount[$i] == ".")
                    $str .=".";
                else{
                    $index = 'num_'.$amount[$i];
                    $str .=strtoupper($price_config->$index);
                }
            }
        }
        return $str;
    }

    /**
     * convert to digits string
     */
    public static function getCostCodeValue($amount_string){
        $num_str = null;
        if(!ctype_alpha($amount_string))
            return null;
        $price_config = PriceConfig::where('company_id',request()->user()->id)->select('num_0 as num_0','num_1 as num_1','num_2 as num_2','num_3 as num_3','num_4 as num_4','num_5 as num_5','num_6 as num_6','num_7 as num_7','num_8 as num_8','num_9 as num_9')->first();
        if($price_config){
            $price_config = array_flip($price_config->toArray());
            for ($i = 0; $i < strlen($amount_string); $i++){
                $str_char = strtolower($amount_string[$i]);
                $key_str = $price_config[$str_char];
                if($key_str == "decimal")
                    $key ='.';
                else
                    $key = ltrim($key_str,'num_');
                $num_str .= $key;
            }
        }
        return $num_str;
    }

}