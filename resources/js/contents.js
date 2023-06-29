// import { format, isValid } from 'date-fns'; //importado direto na view

$(document).ready(function() {
  //formata as datas na da table com o name=["data"] pq do banco vem "2000-00-00" e o usuario tem q ver "00/00/0000"
  $('input[name*="data"]').each(function() {
    var dataBanco = $(this).val();
    var dataFormatada = moment(dataBanco, 'YYYY-MM-DD').format('DD/MM/YYYY');
    $(this).val(dataFormatada);
  });

  // formata os campos que tiverem estes nomes
  $('input[name="cpf"]').mask('000.000.000-00');
  $('input[name="rg"]').mask('0.000.000');
  $('input[name*="data"]').mask('00/00/0000'); //pega todos os campos data que tiverem o imporatante é ter "nome" no atributo name poder ser "nome_qualquercoisa"
  
  $('td[name="cpf"]').mask('000.000.000-00');
  $('td[name="rg"]').mask('0.000.000');


});


//função para habilitar e desabilitar a visibilidade da mensagem de erro
function VisibilidadeErro(Input_id, div_msg_id, bool){
  if(bool){
    $('#'+ div_msg_id).css('visibility','visible'); //Erro visível
    $('#'+ Input_id).css('border-color','red')
  }else{
    $('#'+ div_msg_id).css('visibility','hidden'); //Erro invisivel
    $('#'+ Input_id).css('border-color','#dee2e6') //cor padrao do bootstrap
  }
}

// valida se o nome contém algum valor
$('input[name="nome"]').on('blur', function() {

  var nome = $(this).val().trim();

  if (nome == ""){
    VisibilidadeErro('Input-nome', 'obrigatorio-nome', true)
  }else{
    VisibilidadeErro('Input-nome', 'obrigatorio-nome', false)
  }
})

// valida se o nome contém algum valor
$('input[name="sobrenome"]').on('blur', function() {

  var sobrenome = $(this).val().trim();

  if (sobrenome == ""){
    VisibilidadeErro('Input-sobrenome', 'obrigatorio-sobrenome', true)
  }else{
    VisibilidadeErro('Input-sobrenome', 'obrigatorio-sobrenome', false)
  }
})

// valida saida do input com o nome de cpf
$('input[name="cpf"]').on('blur', function() {
  
  var cpf = $(this).val().replace(/[.-]/g, '');

  if (cpf.length < 11) {
    VisibilidadeErro('Input-cpf', 'obrigatorio-cpf', true)
  }else{
    VisibilidadeErro('Input-cpf', 'obrigatorio-cpf', false)
  }
});

// valida saida do input com o nome de rg
$('input[name="rg"]').on('blur', function() {
  
  var rg = $(this).val().replace('.','');
  
  if (rg.length < 8) {
    VisibilidadeErro('Input-rg', 'obrigatorio-rg', true)
  }else{
    VisibilidadeErro('Input-rg', 'obrigatorio-rg', false)
  }
});

// valida saida do input com o nome de data-nascimento
$('input[name="data_datanascimento"]').on('blur', function() {

  var data = $(this).val();
  
  //valida se foi digitada toda a data
  if (data.length < 10) {
    VisibilidadeErro('Input-datanascimento', 'data-invalida', true);
    return;
  }else{
    VisibilidadeErro('Input-datanascimento', 'data-invalida', false);
  }

  const isoDate = moment(data, 'DD/MM/YYYY').toISOString(); //ajusta a data para o formato ISOString
  const isDataValid = moment(isoDate).isValid(); //Valida a data

  if (isDataValid) {
    VisibilidadeErro('Input-datanascimento', 'data-invalida', false);
  }else{   
    VisibilidadeErro('Input-datanascimento', 'data-invalida', true);
  }
  
  return;

});

// valida saida da do campo sexo do usuario
$('#Input-sexo').on('blur', function() {
  
  var estado_civil = $(this).val().trim();

  if (estado_civil == "") {
    VisibilidadeErro('Input-sexo', 'obrigatorio-sexo', true)
  }else{
    VisibilidadeErro('Input-sexo', 'obrigatorio-sexo', false)
  }
});

//tamanho total da minha tela - a navbar para centralizar os itens 
// comentado pos em cards muito grande acaba sobrepondo o menu
// $(document).ready(function() {
//   var navbarHeight = $('#navbar-padrao-sistema').outerHeight(); //pega a altura total do objeto com borda pedding tudo
//   var windowHeight = $(window).height();
//   var contentHeight = (windowHeight - navbarHeight) ;
//   var divcenter = $('.centraliza-vertical')
//   divcenter.css('height', contentHeight);
//   console.log(contentHeight);
// });

//muda o type do input no cadastro de usuario
$('#select-tipo-contato').change(function() {
  var Select = $(this).val();
  var Input_valor = $('#valor-tipo-contato');

  switch (Select) {
    case '4':
        Input_valor.attr('type', 'tel');
        $('#valor-tipo-contato').mask('(00) 0000-0000');
        $('#valor-tipo-contato').attr('placeholder','(00) 0000-0000');
      break;
    case '3':
        Input_valor.attr('type', 'tel');
        $('#valor-tipo-contato').mask('(00) 00000-0000');
        $('#valor-tipo-contato').attr('placeholder','(00) 00000-0000');
      break;
    case '2':
        Input_valor.attr('type', 'url');
        $('#valor-tipo-contato').unmask();
        $('#valor-tipo-contato').attr('placeholder','https://websiteExemplo.com.br');
      break;
    case '1':
        Input_valor.attr('type', 'email');
        $('#valor-tipo-contato').unmask();
        $('#valor-tipo-contato').attr('placeholder','email@exemplo.com');
      break;
    default://todos os outros são text
        Input_valor.attr('type', 'text');
        $('#valor-tipo-contato').unmask();
        $('#valor-tipo-contato').attr('placeholder','');
      break;
  }

})

//ao clicar na msg esconde ela
$('div[name="msg-aviso"]').on('click', function() {
  $(this).attr('hidden', true);
})