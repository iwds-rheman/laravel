<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Projects extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $timestamps = false;
    protected $table = 'project_info';
    protected $primaryKey = 'UID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['ProjectName','ProjectDesc','Amount'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
}
