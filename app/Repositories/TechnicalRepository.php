<?php
/**
 * Created by PhpStorm.
 * User: iankibet
 * Date: 2/5/19
 * Time: 5:15 AM
 */


if (!function_exists('userCan')) {
    function userCan($permission)
    {
        $user = request()->user();
        return $user->isAllowedTo($permission);
    }
}
if (!function_exists('user_can')) {
    function user_can($permission)
    {
        $user = request()->user();
        return $user->isAllowedTo($permission);
    }
}

/**
 * converts currency from the given currency type to the other and
 * returns the resulting amount
 */
if (!function_exists('convertCurrency')) {
    function convertCurrency($from, $to, $amount)
    {
        $currency = \App\Models\Core\Currency::where([
            ['from', $from],
            ['to', $to],
        ])->first();
        if ($currency) {
            return $currency->rate * $amount;
        } else {
            abort(500, 'Conversion Rate Data doesn\'t exist.');
        }
    }
}

if (!function_exists('get_ip_info')) {
    function get_ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE)
    {
        $output = NULL;
        if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
            $ip = $_SERVER["REMOTE_ADDR"];
            if ($deep_detect) {
                if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
            }
        }
        $purpose = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
        $support = array("country", "countrycode", "state", "region", "city", "location", "address");
        $continents = array(
            "AF" => "Africa",
            "AN" => "Antarctica",
            "AS" => "Asia",
            "EU" => "Europe",
            "OC" => "Australia (Oceania)",
            "NA" => "North America",
            "SA" => "South America"
        );
        if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
            $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
            if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
                switch ($purpose) {
                    case "location":
                        $output = array(
                            "city" => @$ipdat->geoplugin_city,
                            "state" => @$ipdat->geoplugin_regionName,
                            "country" => @$ipdat->geoplugin_countryName,
                            "country_code" => @$ipdat->geoplugin_countryCode,
                            "continent" => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                            "continent_code" => @$ipdat->geoplugin_continentCode
                        );
                        break;
                    case "address":
                        $address = array($ipdat->geoplugin_countryName);
                        if (@strlen($ipdat->geoplugin_regionName) >= 1)
                            $address[] = $ipdat->geoplugin_regionName;
                        if (@strlen($ipdat->geoplugin_city) >= 1)
                            $address[] = $ipdat->geoplugin_city;
                        $output = implode(", ", array_reverse($address));
                        break;
                    case "city":
                        $output = @$ipdat->geoplugin_city;
                        break;
                    case "state":
                        $output = @$ipdat->geoplugin_regionName;
                        break;
                    case "region":
                        $output = @$ipdat->geoplugin_regionName;
                        break;
                    case "country":
                        $output = @$ipdat->geoplugin_countryName;
                        break;
                    case "countrycode":
                        $output = @$ipdat->geoplugin_countryCode;
                        break;
                }
            }
        }
        if ($_SERVER['HTTP_HOST'] == 'localhost') {
            $output = ['country_code' => 'KE'];
        }
        return $output;
    }

}
/**
 * Truncate a string after a given number of words -- limit number of words
 */
if (!function_exists('limit_string_words')) {
    function limit_string_words($text, $words_limit)
    {
        if (str_word_count($text, 0) > $words_limit) {
            $words = str_word_count($text, 2);
            $pos = array_keys($words);
            $text = substr($text, 0, $pos[$words_limit]) . ' ...';
        }
        return $text;
    }
/**
 * Truncate a string after a given number of words -- limit number of words
 */
if (!function_exists('get_ip_details')) {
    function get_ip_details()
    {
        $ip = get_client_ip_env();
        if ($_SERVER['HTTP_HOST'] == 'localhost') {
            $data = [];
            $data['geoplugin_timezone'] = 'Africa/Nairobi';
            return $data;
        }
        $contents = file_get_contents('http://www.geoplugin.net/json.gp?ip=' . $ip);
        return json_decode($contents, true);
    }
}
/**
 * get ip environment details of a user in session
 */
if (!function_exists('get_client_ip_env')) {
    function get_client_ip_env()
    {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if (getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if (getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if (getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if (getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if (getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return explode(',', $ipaddress)[0];
    }
}
/**
 * get star rating icons
 */
if (!function_exists('get_starr_ratings_icons')) {
    function get_starr_ratings_icons($num, $max_rating_limit = 5)
    {
        if($num > $max_rating_limit)
            $num = $max_rating_limit;
        $rating_str = "";
        for ($i = 0; $i < $num; $i++) {
            $rating_str .= '<i class="icon-star-full2 font-size-base text-warning-300"></i>';
        }
        return $rating_str;
    }
}
}