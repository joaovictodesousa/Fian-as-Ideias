<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<x-app-layout>
    <x-slot name="header" id="navlink">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Finanças') }}
        </h2>
    </x-slot>

    <div class="voltar_cadastro">
        <a class="btn btn-primary" href="{{ route('index.tabela') }}" role="button">Ver cadastrados</a>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form class="row g-3 needs-validation" action="{{ route('index.store') }}" method="POST" id="formulario">
                    @csrf
                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">NF</label>
                        <input type="number" class="form-control" id="nf" name="nf" required>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustomUsername" class="form-label">Data da compra</label>
                        <div class="input-group has-validation">
                            <input type="date" class="form-control" id="datacriacao" name="datacriacao" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom02" class="form-label">Data de vencimento</label>
                        <input type="date" class="form-control" id="datavencimento" name="datavencimento" required>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom03" class="form-label">Valor</label>
                        <input type="text" class="form-control" id="valor" name="valor" oninput="formatarValor(this)" required>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom03" class="form-label">Comprador</label>
                        <input type="text" class="form-control" id="comprador" name="comprador" required>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom03" class="form-label">Vendedor</label>
                        <input type="text" class="form-control" id="vendedor" name="vendedor" required>
                    </div>

                    <div class="col-md-3">
                        <label for="validationCustom04" class="form-label">State</label>
                        <select class="form-select" name="auxestado" id="auxestado" required>
                            <option selected disabled value="">Selecione...</option>
                            @foreach ($collection as $item)
                                <option value="{{ $item->id }}">{{ $item->estado }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

<script src="{{ asset('js/formata_valor.js')}}"></script>
