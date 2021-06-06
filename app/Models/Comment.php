<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    protected $table = 'comments';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'iduser',
        'idphoto',
        'description',
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
