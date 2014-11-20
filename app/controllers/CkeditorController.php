<?php

/**
 * Class CkeditorController
 * Contain Media Libraries, Upload, Handler For CKEditor Browse Server Dialog
 */
class CkeditorController extends BaseController {
    /**
     * set default layout
     * @var string
     */
    protected $layout = 'layouts.ckeditor';

    /**
     * Media Upload
     */
	public function upload()
	{
        $title = 'Media Upload';
        $this->layout->title = $title . ' - NCCMS';
        $this->layout->with('script', 'admin.ckeditor.scripts.upload')
            ->with('style', 'admin.ckeditor.styles.upload');
        $this->layout->content = View::make('admin.ckeditor.upload')
            ->with('title', $title);
	}

    /**
     * Upload action handler
     * upload/resize image
     * @return json
     */
    public function doUpload(){
        $upload_handler = new UploadHandler();
        exit;
    }

    public function libraries(){
        $title = 'Multimedia Libraries';
        $this->layout->title = $title . ' - NCCMS';
        $this->layout->with('script', 'admin.ckeditor.scripts.libraries')
            ->with('style', 'admin.ckeditor.styles.libraries');
        $this->layout->content = View::make('admin.ckeditor.libraries')
            ->with('libraries', Media::getMultimedia())
            ->with('title', $title);
    }

    public function image(){
        $title = 'Image Media Libraries';
        $this->layout->title = $title . ' - NCCMS';
        $this->layout->with('script', 'admin.ckeditor.scripts.libraries')
            ->with('style', 'admin.ckeditor.styles.libraries');
        $this->layout->content = View::make('admin.ckeditor.libraries')
            ->with('libraries', Media::getImage())
            ->with('title', $title);
    }

}
