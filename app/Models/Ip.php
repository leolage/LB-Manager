<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ip extends Model
{
    protected $fillable = ['domain_id', 'ip_address', 'status', 'online']; // Defina aqui os campos da tabela 'ips'

    // Se necessário, você pode definir relacionamentos ou outras lógicas aqui
}
