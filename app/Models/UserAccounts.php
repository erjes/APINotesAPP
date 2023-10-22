<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAccounts extends Model
{
    use HasFactory;
    protected $table = 'user_accounts';
    public $timestamps = true;

    protected $primaryKey = 'UserID';

    protected $fillable = [
        'email',
        'password',
    ];
}
