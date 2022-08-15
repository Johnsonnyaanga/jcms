<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SLA extends Model
{
    use HasFactory;
    public $table = "slas";

    protected $fillable = [
          'name',
          'grace_period',
          'valid_id',
          'admin_note'
    ];
}
