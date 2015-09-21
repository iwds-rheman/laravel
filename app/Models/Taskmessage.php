<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Taskmessage extends Model {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $timestamps = false;
    protected $table = 'task_message';
    protected $primaryKey = 'UID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['Message','isViewed'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
}
