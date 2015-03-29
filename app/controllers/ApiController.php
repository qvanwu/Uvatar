<?php


# NOTHING MODIFIED HERE

class ApiController extends Controller {

    public function show()
    {
        return View::make('api');
    }

    /**
     * @param $md5 hashed email address
     * @param null $size image size
     * @param null $format image format
     * @return mixed
     */

    public function getImage($md5, $size = '250px', $format = null)
    {
        $account = Email::where('md5', $md5)->first();
        $path = url('userimage') .'/'. $account->user_id . '/' . $account->main_avatar;
        $image = HTML::image($path,                     // image path
                            $account->email,            // image alt
                            array('width' => $size,     // image size
                                  'height' => $size));

        return $image;
    }

    public function generate()
    {
//        $email = Input::get('email');
        $email = md5( strtolower( trim(Input::get('email'))));
        $path = url('image').'/';
        $result = '<img src="' . $path . $email.'"/>';
        return Redirect::back()->with('result', $result);
    }

}
