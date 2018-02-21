<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Engineer extends Model
{
    protected $table = 'engineers';
	public $primaryKey = 'id';
	public $timeStamps = true;
}
