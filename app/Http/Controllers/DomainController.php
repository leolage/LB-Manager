<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Domain;
use App\Models\Ip;

class DomainController extends Controller
{
    public function showAddDomainForm()
    {
        return view('add_domain');
    }

    public function addDomain(Request $request)
    {
        // Validação dos dados do formulário
        $rules = [
            'domain' => 'required|valid_domain',
            'ips' => 'required|array|min:2|max:6',
            'ips.*' => 'ip', // Validação de endereço IP para cada item do array
        ];

        $messages = [
            'domain.required' => 'O campo de domínio é obrigatório.',
            'domain.valid_domain' => 'O domínio informado não é válido.',
            'ips.required' => 'Pelo menos dois endereços IP são necessários.',
            'ips.array' => 'O campo de IPs deve ser um array.',
            'ips.min' => 'Pelo menos dois endereços IP são necessários.',
            'ips.max' => 'Não são permitidos mais de seis endereços IP.',
            'ips.*.ip' => 'Um ou mais endereços IP são inválidos.',
        ];

        $request->validate($rules, $messages);

        // Criação do domínio
        $domain = new Domain();
        $domain->domain = $request->domain;
        $domain->status = 'active'; // Status padrão é 'active'
        $domain->created_at = now(); // Data de criação
        $domain->save();

        // Criação dos IPs vinculados ao domínio
        foreach ($request->ips as $ipAddress) {
            $ip = new Ip();
            $ip->domain_id = $domain->id;
            $ip->ip_address = $ipAddress;
            $ip->status = 'active'; // Status padrão é 'active'
            $ip->online = 'yes'; // 'yes' para indicar que está online
            $ip->created_at = now(); // Data de criação
            $ip->save();
        }

        return redirect()->route('dashboard')->with('success', 'Domínio e IPs adicionados com sucesso!');
    }
	
	public function deleteDomain($id)
{
    $domain = Domain::findOrFail($id);

    // Excluir os IPs vinculados ao domínio
    $domain->ips()->delete();

    // Excluir o domínio
    $domain->delete();

    return redirect()->route('dashboard')->with('success', 'Domínio deletado com sucesso!');
}


	public function showEditDomainForm($id)
	{
		$domain = Domain::findOrFail($id);
		$ips = $domain->ips;

		return view('edit_domain', compact('domain', 'ips'));
	}


	public function updateDomain(Request $request, $id)
	{
		// Validação dos dados do formulário
		$rules = [
			'domain' => 'required|valid_domain',
			'ips' => 'required|array|min:2|max:6',
			'ips.*' => 'ip', // Validação de endereço IP para cada item do array
		];

		$messages = [
			'domain.required' => 'O campo de domínio é obrigatório.',
			'domain.valid_domain' => 'O domínio informado não é válido.',
			'ips.required' => 'Pelo menos dois endereços IP são necessários.',
			'ips.array' => 'O campo de IPs deve ser um array.',
			'ips.min' => 'Pelo menos dois endereços IP são necessários.',
			'ips.max' => 'Não são permitidos mais de seis endereços IP.',
			'ips.*.ip' => 'Um ou mais endereços IP são inválidos.',
		];

		$request->validate($rules, $messages);

		// Encontrar o domínio existente
		$domain = Domain::findOrFail($id);
		$domain->domain = $request->domain;
		$domain->save();

		// Remover os IPs existentes do domínio
		$domain->ips()->delete();

		// Adicionar os novos IPs ao domínio
		foreach ($request->ips as $ipAddress) {
			$ip = new Ip();
			$ip->domain_id = $domain->id;
			$ip->ip_address = $ipAddress;
			$ip->status = 'active'; // Status padrão é 'active'
			$ip->online = 'yes'; // 'yes' para indicar que está online
			$ip->save();
		}

		return redirect()->route('dashboard')->with('success', 'Domínio atualizado com sucesso!');
	}
	
	
	
	
}
