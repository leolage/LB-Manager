@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><strong>Domínios para Load Balance</strong></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>Domínios</h3>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th>Domínio</th>
                            <th>IPs</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($domains as $domain)
                            <tr>
                                <td>{{ $domain->domain }}</td>
                                <td>
                                    <ul>
                                        @foreach ($domain->ips as $ip)
                                            <li>{{ $ip->ip_address }} <strong style="color: {{ $ip->online === 'yes' ? 'green' : 'red' }}">{{ $ip->online === 'yes' ? 'Online' : 'Offline' }}</strong></li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Ações">
                                        <form action="{{ route('edit_domain_form', ['id' => $domain->id]) }}" method="GET">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Editar</button>
                                        </form>
                                        <form action="{{ route('delete_domain', ['id' => $domain->id]) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar este domínio?')">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Deletar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
