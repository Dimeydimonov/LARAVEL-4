<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviem extends Model
{

    use HasFactory;
    protected $guarded = false;

    public function reviemable()
    {
        return $this->morphTo();
    }


}
