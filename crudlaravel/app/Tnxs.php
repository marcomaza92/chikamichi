<?php

namespace LoginWithCRUD;

use Illuminate\Database\Eloquent\Model;

class Tnxs extends Model
{

    public $fillable = [
        'type', 'origin', 'description', 'amount',
    ];

}
