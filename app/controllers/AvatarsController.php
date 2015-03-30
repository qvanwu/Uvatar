<?php

class AvatarsController extends \BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $avatars = Auth::user()->avatars;
        foreach ($avatars as $avatar) {

        }
    }

    /**
     * Show the form for creating a new resource.
     * Upload an avatar.
     *
     * @return Response
     */
    public function store()
    {
        $file = Input::file('inputFile');

        $toValidate = array('inputFile' => $file);
        $rule = array(
            'inputFile' => 'required',
            'inputFile' => 'mimes:jpeg,bmp,png',
        );

        $validator = Validator::make($toValidate, $rule);

        if ($validator->fails()) {
            $validator->messages();
            return Redirect::to('user/home')->withErrors($validator)->withInput();
        }

        if ($file->isValid()) {
            # save to server
            $fileExt = $file->getClientOriginalExtension();
            $mime = $file->getMimeType();
            $filename = strtolower(str_random(20) . '.' . $fileExt);
            $path = public_path() . '/userimage/' . strval(Auth::user()->id); #/public/userimage/[user->id]/
            $file->move($path, $filename);

            # push record to database
            $avatar = new Avatar();
            $avatar->user_id = Auth::user()->id;
            $avatar->filename = $filename;
            $avatar->push();

            return Redirect::to('user/home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return View::make('avatar')->with('avatar', Avatar::find($id));
    }

    /**
     * Assign an avatar to Email choosen
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $avatar = Avatar::find($id);
        $input = Input::get('email');
        $email = Email::where('email', '=', $input)->first();
        $email->main_avatar = $avatar->filename;
        $email->save();
        return Redirect::to('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $avatar = Avatar::find($id);
        $email = Email::where('main_avatar', $avatar->filename)->first();
        $email->main_avatar = null;
        $email->save();
        Avatar::destroy($id);
        return Redirect::to('/');
    }

}
