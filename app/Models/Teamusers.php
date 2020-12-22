<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teamusers extends Model
{
    use HasFactory;

    protected $table = 'team_users';

    protected $fillable = ['team_id', 'user_id'];
    public $timestamps = false;



}