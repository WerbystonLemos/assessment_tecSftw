<link rel="stylesheet" href=" {{asset('css/dash.css')}} ">
<script src="{{ asset('js/dash.js') }}"></script>
<x-app-layout>
    <div class="p-4">

        <div id="controlBtns">
            <button id="btnUpload" class="btn btn-sm" onclick="chooseFile()">Carregar</button>
            <button id="nomeFile" class="btn btn-link" disabled></button>
            <button id="btnProcessar" class="btn btn-sm" onclick="submitFile()">Processar</button>

            <form id="formFileUpload" method="POST" action="{{ route('upload') }}" enctype="multipart/form-data">
                @csrf
                <input type="file" name="inputFile" id="inputFile" accept=".xls, .xlsx" onchange="carregaArquivo()" />
                <button id="btnSubmitFile" type="submit">Subir</button>
            </form>
        </div>

        {{-- {{ dd($_REQUEST); }} --}}

        @if(session('rows'))
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
                            @foreach ( session('rows') as $idx=>$row )
                                <tr>
                                    <td>{{ $row['name'] }}</td>
                                    <td>{{ $row['email'] }}</td>
                                    <td>{{ $row['cnpj'] }}</td>
                                    <td>{{ $row['codBarras'] }}</td>
                                    <td>{{ $row['valor'] }}</td>
                                    <td>{{ $row['vencimento'] }}</td>
                                    <td>{{ $row['juros'] }}</td>
                                </tr>
                                @endforeach
                        </tbody>
                        </thead>
                    </table>
                </div>
            </div>
        @endisset

    </div>
</x-app-layout>
