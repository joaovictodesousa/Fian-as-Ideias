<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Finanças') }}
        </h2>
    </x-slot>
{{-- ---------------------------------- --}}

    @if (session('success'))
        <div class="alert alert-success" id="alert_container">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(function() {
                document.querySelector('.alert-success').style.display = 'none';
            }, {{ session('display_time', 3000) }});
        </script>
    @endif

    @if (session('danger'))
    <div class="alert alert-danger" id="alert_container">
        {{ session('danger') }}
    </div>
    <script>
        setTimeout(function() {
            document.querySelector('.alert-danger').style.display = 'none';
        }, {{ session('display_time', 3000) }});
    </script>
@endif
{{-- ---------------------------------- --}}


    <div class="voltar_cadastro">
        <a class="btn btn-primary" href="{{ route('index.dashboard') }}" role="button">+ Cadastrar novo</a>
    </div>

    <div class="py-12" id="container_tabela_master">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="table" id="tabela">
                    <thead>
                        <tr>
                            <th>NF</th>
                            <th>Data da compra</th>
                            <th>Data do vencimento</th>
                            <th>Valor</th>
                            <th>Estado</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Allcadastros as $cadastros)
                            <tr>
                                <td>{{ $cadastros->nf }}</td>
                                <td>{{ \Carbon\Carbon::parse($cadastros->datavencimento)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($cadastros->datacriacao)->format('d/m/Y') }}</td>
                                <td>R${{ $cadastros->valor }}</td>
                                <td>{{ $cadastros->Estado->estado }}</td>
                                <td>@include('components.modal')</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-center mt-3">
                    {{-- div pra ficar alinhado o paginate --}}
                    {{ $Allcadastros->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
