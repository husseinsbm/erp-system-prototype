<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    //
       protected $table = 'activity_log';
    public $primaryKey = 'id';
     public $timestamps = false;
  protected $fillable = array('employee_id', 'activity', 'table_affected','primary_key','column_affected', 'old_value', 'new_value');
}
