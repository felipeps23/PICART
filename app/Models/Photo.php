<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Photo extends Model
{
    use HasFactory, Notifiable;
    
    protected $table = 'photos';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'iduser',
        'idpreset',
        'photo',
        'camera',
        'lens',
        'shutter_speed',
        'iso',
        'focal',
        'type'
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
