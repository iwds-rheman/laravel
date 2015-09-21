<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountType extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'account_type';
    protected $primaryKey = 'UID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['AccountType'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

}
