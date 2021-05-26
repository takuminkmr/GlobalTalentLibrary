<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GlobalTalent extends Model
{
    protected $table = 'global_talents';
    protected $fillable = ['gt_name','school','faculty','introduction','photo','video','gt_email'];
}
