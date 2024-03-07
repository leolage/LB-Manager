<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
	 
    public function boot()
    {
        Validator::extend('valid_domain', function ($attribute, $value, $parameters, $validator) {
    // Aqui, você implementa a lógica de validação do domínio

    // Verifique se o valor do domínio está vazio
    if (empty($value)) {
        return false; // O domínio está vazio, então é inválido
    }

    // Verifique se o valor do domínio é um domínio válido
    // Você pode usar expressões regulares, bibliotecas de validação de domínio, etc.
    // Por exemplo, você pode usar uma expressão regular para verificar o formato do domínio
    // Se o formato não corresponder a um formato válido, retorne false
    if (!preg_match('/^[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $value)) {
        return false; // O domínio não está em um formato válido
    }

    // Se chegou até aqui, significa que o domínio é válido
    return true;
	});

	Validator::extend('valid_ip', function ($attribute, $value, $parameters, $validator) {
			return filter_var($value, FILTER_VALIDATE_IP) !== false;
		});
	
	
    }


 
}
