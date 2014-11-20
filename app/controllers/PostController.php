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

    /**
     * Login Page
     * @return \Illuminate\View\View
     */
    public function login(){
        return View::make('admin.login');
    }

    /**
     * Login action handler
     * put login session
     * @return \Illuminate\Http\RedirectResponse
     */
    public function doLogin(){
        $rules = array(
            'userid' => 'required|max:30',
            'password' => 'required',
        );
        $display = array(
            'userid' => 'User ID',
            'password' => 'Password'
        );

        $validator = Validator::make(Input::all(), $rules, array(), $display);
        if($validator->fails()) {
            return Redirect::to('login')
                ->withErrors($validator)
                ->withInput(Input::all());
        }else{
            $user = User::where('username', '=', Input::get('userid'))
                ->first();
            if(isset($user->id)){
                if($user->level < 3) {
                    if (Hash::check($user->password, Input::get('password'))) {
                        Session::put('logedin', $user->id);
                        Session::put('loginLevel', $user->level);
                        Session::put('nickname', $user->nickname);
                    }
                    return Redirect::to('/');
                }else{
                    Session::flash('error', 'Permission Error.');
                    return Redirect::to('login');
                }
            }else{
                Session::flash('error', 'Email/Password Error.');
                return Redirect::to('login');
            }
        }
    }

    /**
     * Logout action handler
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(){
        Session::forget('logedin');
        Session::forget('loginLevel');
        Session::forget('nickname');
        return Redirect::to('login');
    }

}
