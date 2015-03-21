<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Avatar extends Eloquent implements UserInterface, RemindableInterface
{

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'avatars';
    protected $fillable = ['filename'];

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function getFileName()
    {
        return $this->filename;
    }
}
