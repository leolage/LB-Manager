<!-- resources/views/add_domain.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Adicionar Domínio</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('add_domain') }}" style="margin-top: 20px;">
            @csrf
            <div class="form-group">
                <label for="domain">Domínio:</label>
                <input type="text" class="form-control" id="domain" name="domain" placeholder="Digite o domínio" value="{{ old('domain') }}" required>
            </div>
            <div class="form-group" id="ip_fields">
                <label for="ips">IPs:</label>
                @php
                    $oldIps = old('ips') ? old('ips') : [];
                @endphp
                @foreach ($oldIps as $ip)
                    <input type="text" class="form-control" name="ips[]" value="{{ $ip }}" placeholder="Digite o IP" required>
                @endforeach
                @for ($i = count($oldIps); $i < 2; $i++)
                    <input type="text" class="form-control" name="ips[]" placeholder="Digite o IP" required>
                @endfor
                <button type="button" class="btn btn-primary" id="add_ip_field">Adicionar IP</button>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar Domínio</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addIpButton = document.getElementById('add_ip_field');
            const ipFieldsContainer = document.getElementById('ip_fields');

            let ipCount = {{ count($oldIps) > 0 ? count($oldIps) : 2 }};

            addIpButton.addEventListener('click', function() {
                if (ipCount < 6) {
                    const newIpField = document.createElement('input');
                    newIpField.setAttribute('type', 'text');
                    newIpField.setAttribute('class', 'form-control');
                    newIpField.setAttribute('name', 'ips[]');
                    newIpField.setAttribute('placeholder', 'Digite o IP');
                    newIpField.value = '';
                    newIpField.required = true;
                    ipFieldsContainer.appendChild(newIpField);
                    ipCount++;
                } else {
                    addIpButton.disabled = true;
                }
            });
        });
    </script>
@endsection
