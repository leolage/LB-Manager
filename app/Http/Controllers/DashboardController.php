<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Domain;

class DashboardController extends Controller
{
    public function index()
    {
        // Recuperar os domínios do banco de dados com seus IPs relacionados
        $domains = Domain::with('ips')->get();

        // Retornar a view do dashboard com os dados
        return view('dashboard', compact('domains'));
    }
}
