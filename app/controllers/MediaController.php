<?php

/**
 * Class MediaController
 * Contain Media Libraries, Upload, and Image Slider Handler
 */
class MediaController extends BaseController {
    /**
     * set default layout
     * @var string
     */
    protected $layout = 'layouts.admin';

    /**
     * Media Upload
     */
	public function upload()
	{
        $title = 'Media Upload';
        $this->layout->title = $title . ' - NCCMS';
        $this->layout->with('script', 'admin.media.scripts.upload')
            ->with('style', 'admin.media.styles.upload');
        $this->layout->content = View::make('admin.media.upload')
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
        $title = 'Media Libraries';
        $this->layout->title = $title . ' - NCCMS';
        $this->layout->with('script', 'admin.media.scripts.libraries')
            ->with('style', 'admin.media.styles.libraries');
        $this->layout->content = View::make('admin.media.libraries')
            ->with('libraries', Media::getAll())
            ->with('title', $title);
    }

}
