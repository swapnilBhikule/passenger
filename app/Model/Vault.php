<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Vault extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vault';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'account_name', 'email', 'password', 'website', 'description',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}
