<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    
    protected $table = 'purchases';
    
    protected $fillable = [
        'iduser', 
        'idpreset', 
    ];
     public function user() {
        return $this->belongsTo('App\Models\User', 'iduser');
        // return $this->belongsTo('App\Models\Enterprise', 'identerprise', 'id');
    }
     public function preset() {
        return $this->belongsTo('App\Models\Preset', 'idpreset');
        // return $this->belongsTo('App\Models\Enterprise', 'identerprise', 'id');
    }
}
