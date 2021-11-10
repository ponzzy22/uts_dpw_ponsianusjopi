<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table = 'komentar';
    
    protected $fillable = ['id','konten','users_id','posts_id','parent'];

    public function post(){
        return $this->belongsTo(Posts::class);
    }

    
    public function users(){
        return $this->belongsTo(User::class);
    }

    
    public function childs()
    {
        return $this->hasMany(Komentar::class,'parent');
    }
}
