<?php

namespace App\Models;
use App\Models\Ip;


use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected $fillable = ['domain', 'status'];

    // Define o relacionamento um-para-muitos com o modelo Ip
    public function ips()
    {
        return $this->hasMany(Ip::class);
    }
}
