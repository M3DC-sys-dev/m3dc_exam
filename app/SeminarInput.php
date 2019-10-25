<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeminarInput extends Model
{
    protected $table = 'exam_log';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
