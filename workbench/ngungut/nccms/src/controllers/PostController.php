<?php namespace Ngungut\Nccms\Controller;

use BaseController;
use Ngungut\Nccms\Model\Categories;
use Ngungut\Nccms\Model\Posts;

/**
 * Class PostController
 * Contain Post & Page Handler
 */
class PostController extends BaseController {
    /**
     * set default layout
     * @var string
     */
    protected $layout = 'nccms::layouts.admin';

    /**
     * New/Edit Post Page
     * @var integer the id of post
     */
	public function action($id = false)
	{
        if($id){
            $title = 'Edit';
            $post = Posts::find($id);
        }else{
            $title = 'New';
            $post = false;
        }
        $this->layout->title = $title . ' Post - NCCMS';
        $this->layout->with('script', 'nccms::admin.posts.scripts.action')
            ->with('style', 'nccms::admin.posts.styles.action');
        $this->layout->content = \View::make('nccms::admin.posts.action')
            ->with('categories', Categories::orderBy('updated_at', 'desc')->get())
            ->with('post', $post)
            ->with('title', $title);
	}

}
