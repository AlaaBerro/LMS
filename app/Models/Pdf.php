<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Pdf extends Model
{
    public function course()
    {
        return $this->belongsTo(Pdf::class);
    }
    public $timestamps = false;

    protected $fillable =[
        'name','cid','path','status'
    ];
    use HasFactory;
}
