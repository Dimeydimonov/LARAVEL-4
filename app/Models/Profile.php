<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
use HasFactory;

protected $table = 'profiles';
protected $fillable = [
'worker_id',
'city',
'skill',
'experience',
'finished_study_at',
];

public function worker()
{
return $this->belongsTo(Worker::class);
}
}
