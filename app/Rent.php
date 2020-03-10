<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Rent extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rents';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Material_id'
    ];

    public $timestamps = false;
}
