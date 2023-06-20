<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Course extends Model
{
    public function user()
    {
        return $this->belongtoMany(User::class);
    }
    public function pdf()
    {
        return $this->belongtoMany(Pdf::class);
    }
    protected $fillable =[
        'name','title','description','editor_id'
    ];
    use HasFactory;
}
