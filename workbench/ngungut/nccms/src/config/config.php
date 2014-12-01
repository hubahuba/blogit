<?php

return [
    //uploads config
    'upload_dir' => public_path() . '/uploads/',
    'upload_url' => Config::get('app.url').'/uploads/',
    'param_name' => 'media',
    'mkdir_mode' => 0755,
];