<?php

/**
 * Class PostController
 * Contain Post & Page Handler
 */
class PostController extends BaseController {
    /**
     * set default layout
     * @var string
     */
    protected $layout = 'layouts.admin';

    /**
     * New/Edit Post Page
     * @var integer the id of post
     */
	public function action($id = false)
	{
        if($id){
            $title = 'Edit';
        }else{
            $title = 'New';
        }
        $this->layout->title = $title . ' Post - NCCMS';
        $this->layout->with('script', 'admin.posts.scripts.new')
            ->with('style', 'admin.posts.styles.new');
        $this->layout->content = View::make('admin.posts.new')
            ->with('title', $title);
	}

}
