<?php

class Settings extends Eloquent {

	/**
	 * The database table settings by the model.
	 *
	 * @var string
	 */
	protected $table = 'bi_settings';

    /**
     * Fillable of settings data
     *
     * @var array
     */
    protected $fillable = [
        'name', 'value'
    ];

    public static function getMedia(){
        $media = static::where('name', 'LIKE', 'media%')->get();
        $return = [];
        foreach($media as $resp){
            $return[$resp['name']] = $resp['value'];
        }
        return $return;
    }

    public static function getThumbW(){
        $media = static::where('name', '=', 'mediaThumbWidth')->first();
        if(isset($media->id)) {
            $return = $media['value'];
        }else{
            $return = 1;
        }
        return $return;
    }

    public static function getThumbH(){
        $media = static::where('name', '=', 'mediaThumbHeight')->first();
        if(isset($media->id)) {
            $return = $media['value'];
        }else{
            $return = 1;
        }
        return $return;
    }

    public static function getMediumW(){
        $media = static::where('name', '=', 'mediaMediumWidth')->first();
        if(isset($media->id)) {
            $return = $media['value'];
        }else{
            $return = 1;
        }
        return $return;
    }

    public static function getMediumH(){
        $media = static::where('name', '=', 'mediaMediumHeight')->first();
        if(isset($media->id)) {
            $return = $media['value'];
        }else{
            $return = 1;
        }
        return $return;
    }

    public static function getLargeW(){
        $media = static::where('name', '=', 'mediaLargeWidth')->first();
        if(isset($media->id)) {
            $return = $media['value'];
        }else{
            $return = 1;
        }
        return $return;
    }

    public static function getLargeH(){
        $media = static::where('name', '=', 'mediaLargeHeight')->first();
        if(isset($media->id)) {
            $return = $media['value'];
        }else{
            $return = 1;
        }
        return $return;
    }

    public static function getSite(){
        $media = static::where('name', 'LIKE', 'site%')->get();
        $return = [];
        foreach($media as $resp){
            $return[$resp['name']] = $resp['value'];
        }
        return $return;
    }

    public static function getTitle(){
        $site = static::where('name', '=', 'siteTitle')->first();
        if(isset($site->id)) {
            $return = $site['value'];
        }else{
            $return = 'NRD - CMS';
        }
        return $return;
    }

    public static function getTagline(){
        $site = static::where('name', '=', 'siteTagline')->first();
        if(isset($site->id)) {
            $return = $site['value'];
        }else{
            $return = 'CMS Made By Narrada Communication';
        }
        return $return;
    }

    public static function getWebDateFormat(){
        $date = static::where('name', '=', 'siteDate')->first();
        $time = static::where('name', '=', 'siteTime')->first();
        if(isset($date->id) && isset($time->id)) {
            $return = $date . ' @ ' . $time;
        }else{
            $return = 'F j, Y @ H:i:s';
        }
        return $return;
    }

}
