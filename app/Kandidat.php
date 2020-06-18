<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    protected $table = 'kandidat';
    protected $fillable = ['name','visi','misi','avatar'];
}