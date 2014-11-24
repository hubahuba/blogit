<?php

class Format{
    public static function formats_date($date, $style=false, $hour=false)
    {
        if(!$style){
            if($hour){
                $style = 'd/m/Y H:i:s';
            }else{
                $general = Setting::where('name', 'LIKE', 'general%')->get();
                $GeneralValue = new stdClass();
                if(isset($general[0])){
                    foreach($general as $setting){
                        $key = explode('-', $setting->name);
                        $GeneralValue->$key[1] = $setting->value;
                    }
                    $style = $GeneralValue->date . ' @ ' . $GeneralValue->time;
                }
                if(!$style) $style = 'd/m/Y';
            }
        }

        if (isset($date))
            return date($style, strtotime( $date ) );
        return '';
    }
    
    public static function prepare_date($date)
    {
        if (isset($date) && $date != '')
            return implode( "-", array_reverse( explode("/", $date ) ) );
        return null;
    }
    
    public static function count_time($date, $fullhour=false){
        if($date){
            $the = strtotime($date);
            $now = strtotime('now');
            $time = $now - $the;
            $sec = $time % 60;
            $min = $time / 60 % 60;
            $hour = $time / 3600 % 60;
            $day = $time / (24*3600) % 60;
            $week = $time / (7*24*3600) % 60;
            $month = $time / (30*24*3600) % 60;
            $year = $time / (12*30*24*3600) % 60;
            if($fullhour){
                if($year > 0){
                    return $year.' year ago';
                }else if($month > 0){
                    return $month.' month ago';
                }else if($day > 0){
                    return $day.' day ago';
                }else{
                    return (($hour > 0) ? $hour.' hour ':'') . (($min > 0) ? $min.' minutes':$sec.' second') . ' ago';
                }
            }else{
                if($year > 0){
                    return $year.' year ago';
                }else if($month > 0){
                    return $month.' month ago';
                }else if($day > 0){
                    return $day.' day ago';
                }else if($hour > 0){
                    return $hour.' hour ago';
                }else if($min > 0){
                    return $min.' minutes ago';
                }else{
                    return $sec.' second ago';
                }
            }
        }
        return null;
    }

    public static function toBytes($val) {
        $val = trim($val);
        $last = strtolower($val[strlen($val)-1]);
        switch($last) {
            // The 'G' modifier is available since PHP 5.1.0
            case 'g':
                $val *= 1024;
            case 'm':
                $val *= 1024;
            case 'k':
                $val *= 1024;
        }
    
        return $val;
    }

    public static function to_decimal($value, $decimal=0, $symbol=false)
    {
        if($value < 0)
        {
            return '( '.(($symbol) ? $symbol.' ':'').number_format(abs($value), 0, ',', '.').' )';
        }
        else
        {
            return number_format($value, $decimal, '.', '');
        }
    }
    
    public static function textToSlug($text){
        $slug = preg_replace('/[^a-zA-Z0-9_\']/', '-', $text);
        $output2 = $slug;
        do {
            $slug = $output2;
            $output2 = str_replace("--", "-", $slug);
        } while ($output2 != $slug);
        $output2 = trim($output2);
        $output2 = ltrim($output2, "-");
        $output2 = rtrim($output2, "-");
        $output2 = strtolower($output2);
        return $output2;
    }
    
    public static function postURL($id){
        $post = Posts::find($id);
        $y = date('Y', strtotime($post->updated_at));
        $m = date('m', strtotime($post->updated_at));
        $d = date('d', strtotime($post->updated_at));
        $time = date('His', strtotime($post->updated_at));
        
        return Config::get('app.url') . $y . '/' . $m . '/' . $d . '/' . $time . '/' . $post->title_slug;
    }
    
    public static function toRupiah($value, $symbol=FALSE, $decimal=0)
    {
        if($value < 0)
        {
            return '( '.(($symbol) ? $symbol.' ':'').number_format(abs($value), $decimal, ',', '.').' )';
        }
        else
        {
            if($value == 0) return '0';
            return (($symbol) ? $symbol.' ':'').number_format($value, $decimal, ',', '.');
        }
    }
}