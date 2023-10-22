<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    use HasFactory;
    protected $table = 'notes';
    public $timestamps = true;

    protected $primaryKey = 'UserID';

    protected $fillable = [
        'UserID',
        'notes',
        'imagename',
        'videoname',
        'filename',
    ];
}
