<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamLog extends Model
{
    //
	protected $fillable = ['crnt_date', 'todohuken', 'fname', 'lname', 'viewcnt', 'ip_addr', 'referer', 'usr_agent'];
}
