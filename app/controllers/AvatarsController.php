<?php

class AvatarsController extends \BaseController {

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
            $path = public_path().'/userimage/'.strval(Auth::user()->id); #/public/userimage/[user->id]/
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
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Avatar::destroy($id);
        return Redirect::to('/');
	}


}
