<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valuation extends Model
{
    use HasFactory;
    
    protected $table = 'valuations';
    
    protected $fillable = ['iduser', 'idpreset', 'valuation', 'text_valuation'];
     public function user() {
        return $this->belongsTo('App\Models\User', 'iduser');
        return $this->belongsTo('App\Models\Preset', 'idpreset');

    }
     public function preset() {
        return $this->belongsTo('App\Models\Preset', 'idpreset');
        // return $this->belongsTo('App\Models\Enterprise', 'identerprise', 'id');
    }
}
