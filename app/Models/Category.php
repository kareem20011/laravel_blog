<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model implements TranslatableContract
{
    use Translatable;
    use HasFactory;
    use SoftDeletes;


    public $translatedAttributes = ['title', 'content'];
    protected $fillable = ['image', 'parent'];

    public function parent(){
        return $this->belongsTo(Category::class, 'parent');;
    }

    public function children(){
        return $this->hasMany(Category::class,'parent');
    }

    public function post(){
        return $this->hasMany(Post::class);
    }
}
