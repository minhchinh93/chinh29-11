<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\category;

class product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];
    public function category(){
        return $this->belongsTo(category::class);
    }


}
