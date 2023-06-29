//ajusta os inputs de tela de consulta para quando o usuario quiser editar
//assim quando for editar ele vai mudar de um lapis para uma check de confirmação
$('.acoes-editar').on('click',function(){

    var btnConfirma = $('#confirma-'+ $(this).attr('name'));
    btnConfirma.attr('hidden',false);
    $('#edit-'+$(this).attr('name')).prop('hidden', true);
    
    var linhaTabela = document.getElementById($(this).attr('name'));
    var inputs = linhaTabela.getElementsByTagName('input');

    for (let I = 0; I < inputs.length; I++) {
        if (inputs[I].name != "_token" && inputs[I] != "_method"){
            inputs[I].removeAttribute('readonly');
            inputs[I].style.borderBottom = "solid";
            inputs[I].style.borderBottomColor = "white";
            inputs[I].style.borderBottomWidth = "2px";
            // inputs[I].style.borderRadius = "0.5em";
        }
    }
    $('#edicaoRegistro').attr('hidden',false);
})

$(document).on('click','.acoes-excluir', function() {
    var id = $(this).data('id');
    var descricao = $(this).data('descricao');

    $('#id-delete').val(id); //input com o id a ser deletardo
    $('#conteudo-campo').text("Deseja excluir: " + descricao) //descricao abreve do item a ser deletado exemplo nome do item
})