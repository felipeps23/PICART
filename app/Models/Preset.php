<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Preset extends Model
{
    use HasFactory, Notifiable;
    
    protected $table = 'presets';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'iduser',
        'name',
        'description',
        'photo',
        'file',
        'price'
    ];
    
     public function user() {
        return $this->belongsTo('App\Models\User', 'iduser');
        // return $this->belongsTo('App\Models\Enterprise', 'identerprise', 'id');
    }
     public function photo() {
        return $this->belongsTo('App\Models\Photo', 'idphoto');
        // return $this->belongsTo('App\Models\Enterprise', 'identerprise', 'id');
    }
}
