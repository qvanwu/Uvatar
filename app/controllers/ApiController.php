<?php


# NOTHING MODIFIED HERE

class ApiController extends Controller
{

    /**
     * @return show api page
     */
    public function show()
    {
        return View::make('api');
    }

    /**
     * response a image with params
     *
     * @param $md5 hashed email address
     * @param null $size image size
     * @param null $format image format
     * @return mixed
     */

    public function getImage($md5, $size = 250, $format = 'jpg')
    {
        $account = Email::where('md5', $md5)->first();
        $path = public_path() . '/userimage' . '/' . $account->user_id . '/' . $account->main_avatar;

        $image = Image::make($path);
        return $image->resize($size, $size)->response($format);
    }

    /**
     * generate a url to fetch image
     * @return mixed
     */
    public function generate()
    {
        $email = md5(strtolower(trim(Input::get('email'))));
        $format = Input::get('format');
        $size = Input::get('size');
        $path = url('image') . '/';

        if (is_null($format)){
            $format = 'jpg';
        }

        if ($size == '') {
            $size = 250;
        }

        $result = $path . $email . '/' . $size . '/' . $format;

        return Redirect::back()->with(array('result' => $result,
                                            'message' => 'Now you are able to get you image from the url generate.'));
    }

}
