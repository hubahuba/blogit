<?php

class Common{
    public static function debug($x, $exit=0){
        echo $res = "<pre>";
        if(is_array($x) || is_object($x)){
            echo print_r($x);
        }else{
            echo var_dump($x);
        }
        echo "</pre><hr />";
        if($exit==1){ die(); }
    }
    
    public static function Encrypt($data=false, $iv=false) {
        if(!$data) return FALSE;
        $key = '1725795437178523';
        $padding = 16 - (strlen($data) % 16);
        $data .= str_repeat(chr($padding), $padding);
        return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_ECB));
    }
    
    public static function Decrypt($data, $iv=false) {
        $key = '1725795437178523';
        $data = base64_decode($data);
        $data = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_ECB);
        $padding = ord($data[strlen($data) - 1]);
        return substr($data, 0, -$padding);
    }
    
    public static function genUsrID($ip){
        $browser = Useragent::browser();
        $os = Useragent::platform();
        $device = (Useragent::is_mobile()) ? Useragent::mobile():null;
        return md5(uniqid($ip.$browser.$os.$device.date('Y-m-dHis'), true));
    }
    
    public static function notUpload($user, $challenge){
        $photo = Photos::where('participant_id', '=', $user)
            ->where('challenge_id', '=', $challenge)
            ->first();
        if(isset($photo->id)){
            return FALSE;
        }else{
            return TRUE;
        }     
    }
    
    public static function isQuiz(){
        if(Session::has('logedin')){
            $max = Board::max(DB::raw('DATE(created_at)'));
            $limit = Board::where('participant_id', '=', Session::get('logedin'))
                ->select(DB::raw('count(id) as total, DATE(created_at)'))
                ->where(DB::raw('DATE(created_at)'), '=', $max)
                ->groupBy(DB::raw('DATE(created_at)'))
                ->whereNotNull('quiz_id')
                ->first();
            if(isset($limit['total'])){
                if($limit['total'] < 3 || $limit['total'] == null){
                    return TRUE;
                }
            }else{
                return TRUE;
            }
        }
        
        return FALSE;
    }

    public static function checkYoutube($id){
        if($id) {
            $url = 'http://gdata.youtube.com/feeds/api/videos/' . $id;

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($curl);
            curl_close($curl);

            $p = xml_parser_create();
            xml_parse_into_struct($p, $response, $vals);
            if(empty($vals)){
                return false;
            }else{
                return true;
            }
        }
        return false;
    }
    
}
