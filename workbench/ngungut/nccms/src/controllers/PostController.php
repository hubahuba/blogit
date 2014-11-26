<?php namespace Ngungut\Nccms\Controller;

use BaseController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Ngungut\Nccms\Model\Categories;

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
        }else{
            $title = 'New';
        }
        $this->layout->title = $title . ' Post - NCCMS';
        $this->layout->with('script', 'nccms::admin.posts.scripts.new')
            ->with('style', 'nccms::admin.posts.styles.new');
        $this->layout->content = View::make('nccms::admin.posts.new')
            ->with('categories', Categories::orderBy('updated_at', 'desc')->get())
            ->with('title', $title);
	}

}
