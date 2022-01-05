<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $guarded =[];
    public function questions(){
        return $this->hasMany(Question::class);
        
    }
    public function results(){
        return $this->hasMany(Result::class);
        
    }
    public function  getExamImgAttribute($value) {
        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
            return $value;
        }
        return asset('storage/' . $value);
        }
}
