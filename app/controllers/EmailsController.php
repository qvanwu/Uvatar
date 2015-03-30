<?php

class EmailsController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $input = Input::only('email');

        $validator = Validator::make(
            $input,
            [
                'email'						=> 'required|unique:emails|email|min:5',
            ]
        );

        if($validator->fails()) {
            return Redirect::to('register')->withErrors($validator)->withInput();
        }
        else {
            $email = new Email();
            $email->user_id = Auth::user()->id;
            $email->email = Input::get('email');
            $email->md5 = md5( strtolower(trim(Input::get('email'))));

            $email->save();
            return Redirect::to('/');
        }

    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        Email::destroy($id);
        return Redirect::to('/');
	}

    public function add()
    {
        return View::make('addEmail');
    }

    /**
     * remove the avatar from email
     * @param $id
     * @return mixed
     */
    public function remove($id)
    {
        $email = Email::find($id);
        $email->main_avatar = null;
        $email->save();
        return Redirect::to('/');
    }


}
