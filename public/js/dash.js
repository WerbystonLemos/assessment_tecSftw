function chooseFile()
{
    $("#inputFile").click()
}

function carregaArquivo()
{
    let nomeArquivo = $("#inputFile")
    $("#nomeFile").text(nomeArquivo[0].files[0].name)
    $("#btnProcessar").show()
}

function submitFile()
{
    $("#formFileUpload").submit()
}
