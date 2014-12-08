function PagarCartao(){
var titular = $("#cc_nome").val();
if(titular==''){
alert("Digite o Nome do titular!");
$("#cc_nome").focus();
return false;
}
var num = $("#cc_num").val();
if(num==''){
alert("Digite o Numero do cartao!");
$("#cc_num").focus();
return false;
}
var mes = $("#cc_val").val();
if(mes==''){
alert("Digite a validade do cartao!");
$("#cc_val").focus();
return false;
}
var cod = $("#cc_cod").val();
if(cod==''){
alert("Digite o Codigo de Seguranca do cartao!");
$("#cc_cod").focus();
return false;
}
var parcela = $("#lista_cartao_pg").val();
if(parcela==''){
alert("Selecione o valor desejado!");
return false;
}

var pedido_id = $("#id_pedido").val();
var bandeira_id = $("#bandeira_id").val();

$('#tela_pg_pagamento').hide();
$('#tela_pg_aguarde').show();

var request = $.ajax({//post
  url: "app/braspag/cartao.php",
  type: "POST",
  data: {"nome": titular, "cartao": num, "validade": mes, "cod": cod, "parcela": parcela, "ped": pedido_id, "cc": bandeira_id},
  dataType: "json"
});
 
request.done(function(data) {//verifica o resultado
  if(data.erro=='true'){
  $('#tela_pg_aguarde').hide();
  $('#tela_pg_pagamento').show();
  alert(data.msg);
  return false;
  }else if(data.erro=='false'){
  location.href = "index.php?route=payment/braspagapi/confirm";  
  return false;
  }
});

}

function PagarBoleto(){
var pedido_id = $("#id_pedido").val();
var parcela = $("#lista_boleto_pg").val();
if(parcela==''){
alert("Selecione o valor desejado!");
return false;
}

$('#tela_pg_pagamento').hide();
$('#tela_pg_aguarde').show();

var request = $.ajax({//post
  url: "app/braspag/boleto.php",
  type: "POST",
  data: {"ped": pedido_id},
  dataType: "json"
});
request.done(function(data) {//verifica o resultado
  if(data.erro=='true'){
  $('#tela_pg_aguarde').hide();
  $('#tela_pg_pagamento').show();
  alert(data.msg);
  return false;
  }else if(data.erro=='false'){
  location.href = "index.php?route=payment/braspagapi/confirm";  
  return false;
  }
});


}

function valida_cpf(cpf){
      var numeros, digitos, soma, i, resultado, digitos_iguais;
      digitos_iguais = 1;
      if (cpf.length < 11)
            return false;
      for (i = 0; i < cpf.length - 1; i++)
            if (cpf.charAt(i) != cpf.charAt(i + 1))
                  {
                  digitos_iguais = 0;
                  break;
                  }
      if (!digitos_iguais)
            {
            numeros = cpf.substring(0,9);
            digitos = cpf.substring(9);
            soma = 0;
            for (i = 10; i > 1; i--)
                  soma += numeros.charAt(10 - i) * i;
            resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
            if (resultado != digitos.charAt(0))
                  return false;
            numeros = cpf.substring(0,10);
            soma = 0;
            for (i = 11; i > 1; i--)
                  soma += numeros.charAt(11 - i) * i;
            resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
            if (resultado != digitos.charAt(1))
                  return false;
            return true;
            }
      else
            return false;
}
function ValidarCPF(valor){
if(valida_cpf(valor)==false){
$(".cpf").val('');
alert("Digite um CPF valido!");
}
}

function up(lstr){ // converte minusculas em maiusculas
var str=lstr.value; //obtem o valor
lstr.value=str.toUpperCase(); //converte as strings e retorna ao campo
}
function down(lstr){ // converte maiusculas em minusculas
var str=lstr.value; //obtem o valor
lstr.value=str.toLowerCase(); //converte as strings e retorna ao campo
}

function isNumberKey(evt){
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
}

//aplica as tabs
$('#tabs a').tabs();
$(".cpf").mask("99999999999",{completed:function(){ValidarCPF(this.val());}});
$(".data_val").mask("99/9999");

$(function(){
$('#tela_pg_aguarde').hide();
});