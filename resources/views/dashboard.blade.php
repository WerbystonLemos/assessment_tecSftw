<link rel="stylesheet" href=" {{asset('css/dash.css')}} ">
<script src="{{ asset('js/dash.js') }}"></script>
<x-app-layout>
    {{-- <x-slot name="headers">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="p-4">

        <div id="controlBtns">
            <button id="btnUpload" class="btn btn-sm" onclick="chooseFile()">Carregar</button>
            <button id="nomeFile" class="btn btn-link" disabled></button>
            <button id="btnProcessar" class="btn btn-sm" onclick="submitFile()">Processar</button>

            <form id="formFileUpload" method="POST" action="#">
                @csrf
                <input type="file" name="inputFile" id="inputFile" accept=".xls, .xlsx" onchange="carregaArquivo()" />
                <button id="btnSubmitFile" type="submit">Subir</button>
            </form>
        </div>

        <div id="containerRegistro">
            <div id="containerTableRegister">
                <table id="tableUploaded" class="table table-striped">
                    <thead>
                        <th class="text-center">Nome Fantasia</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">CNPJ</th>
                        <th class="text-center">Cód. Barras</th>
                        <th class="text-center">Valor</th>
                        <th class="text-center">Vencimento</th>
                        <th class="text-center">Juros</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Empresa alimentos</td>
                            <td>teste@teste.com</td>
                            <td>12345789</td>
                            <td>23793.38129 60005.630234 57000.052416 1 758700000300 00</td>
                            <td>R$300,00</td>
                            <td>25/07/2024</td>
                            <td>1%</td>
                        </tr>
                        <tr>
                            <td>Empresa alimentos</td>
                            <td>teste@teste.com</td>
                            <td>12345789</td>
                            <td>23793.38129 60005.630234 57000.052416 1 758700000300 00</td>
                            <td>R$300,00</td>
                            <td>25/07/2024</td>
                            <td>1%</td>
                        </tr>
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
        <div id="contianerBtnSendFile">
            <button class="btn btn-sm">Enviar</button>
        </div>

    </div>
</x-app-layout>
