<?php
if(isset($_POST) && count($_POST)>5){

//chama os dados
include("dados.php");
include("loja5.php");

//verificador 01
if(md5($_POST['ped'])!=$_POST['hash']){
$dados['erro'] = 'true';
$dados['msg'] = "Ops, dados invalidos 01!";
echo json_encode($dados);
exit;
}

//cliente
$nome_completo = (string)$_POST['nome'];
$telefone = (string)$_POST['telefone'];
$cpf = (string)$_POST['cpf'];

//cartao
$numero_cartao = (string)$_POST['cartao'];
$mes_cartao = (string)$_POST['mes'];
$ano_cartao = (string)$_POST['ano'];
$cod_cartao = (string)$_POST['cod'];

//pedido
$pedido_id = (int)$_POST['ped'];

//destrocar parcela
$exe = explode('|',base64_decode($_POST['parcela']));
$parcela_cc = $exe[0];//parcela
$produto_cc = $exe[1];//tipo de produto
$valor_p_cc = (float)$exe[2];//valor a pagar
$bandeir_cc = base64_decode($exe[3]);//bandeira
$total_orig = (float)base64_decode($exe[4]);//total original

//verificador 02
if(md5($valor_p_cc)!=$exe[5]){
$dados['erro'] = 'true';
$dados['msg'] = "Ops, dados invalidos 02!";
echo json_encode($dados);
exit;
}

//pega as variaveis do modulo cielo
$afiliacao = $config->get('buypageloja5_afiliacao');
$chav____e = $config->get('buypageloja5_chave');
$ambient_e = $config->get('buypageloja5_ambiente');
$c___a___p = $config->get('buypageloja5_tipo_captura');

//define se o ambiente esta em teste ou producao
if($ambient_e=='1'){
define("ENDERECO", TESTE_CIELO);
}else{
define("ENDERECO", PRODUCAO_CIELO);
}

//dados cc
$dados_cartao = CartaoLoja5($bandeir_cc,$produto_cc);

//inicializa a classe cielo
$Pedido = new Pedido();
//define os dados
$Pedido->formaPagamentoBandeira = $dados_cartao['cc'];
$Pedido->formaPagamentoProduto = $dados_cartao['tp'];
$Pedido->formaPagamentoParcelas = $parcela_cc;
$Pedido->dadosEcNumero = $afiliacao;
$Pedido->dadosEcChave = $chav____e;
if($c___a___p=='true'){
$Pedido->capturar = 'false';	
}else{
$Pedido->capturar = 'false';
}
$Pedido->autorizar = $dados_cartao['au'];
$Pedido->dadosPortadorNumero = $numero_cartao;
$Pedido->dadosPortadorVal = $ano_cartao.$mes_cartao;
$Pedido->dadosPortadorNome = $nome_completo;
$Pedido->dadosPortadorInd = "1";
$Pedido->dadosPortadorCodSeg = $cod_cartao;
$Pedido->dadosPedidoNumero = $pedido_id;
$Pedido->dadosPedidoValor = number_format($valor_p_cc, 2, '', '');
$Pedido->dadosPedidoDescricao = "IP: ".get_ip_cielo()." | Nome: ".$nome_completo." | Tel: ".$telefone." | CPF: ".$cpf."";

//url de retorno ao cupom
$url_atual = ReturnURLCieloLoja5();
$Pedido->urlRetorno = $url_atual.'?token='.base64_encode($pedido_id);
$ret = $Pedido->RequisicaoTid();

//se tudo ok
if(isset($ret->tid)){

//salva no banco
$query = $db->query("SELECT * FROM `".DB_PREFIX."order_cielo` WHERE idOrder ='".$pedido_id."'");
$total_pedidos = (int)$query->num_rows;
if($total_pedidos==0){//cria
$sql = "INSERT INTO `".DB_PREFIX."order_cielo` (`idCielo`, `idOrder`, `totalOrder`, `totalPaid`, `ccMethod`, `numParcelas`, `tidCielo`, `lrCielo`, `statusCielo`, `cpfCustomer`, `telCustomer`, `dateOrder`) VALUES (NULL, '".$pedido_id."', '".$total_orig."', '".$valor_p_cc."', '".$dados_cartao['cc']."', '".$parcela_cc."', '".$ret->tid."', '', '0', '".$cpf."', '".$telefone."', UNIX_TIMESTAMP());";
}elseif($total_pedidos>=1){//atualiza
$sql = "UPDATE `".DB_PREFIX."order_cielo` SET  `totalOrder` =  '".$total_orig."', `totalPaid` =  '".$valor_p_cc."', `ccMethod` =  '".$dados_cartao['cc']."', `numParcelas` =  '".$parcela_cc."', `tidCielo` =  '".$ret->tid."', `cpfCustomer` =  '".$cpf."', `telCustomer` =  '".$telefone."', `dateOrder` = UNIX_TIMESTAMP( ) WHERE `idOrder` ='".$pedido_id."';";
}
$db->query($sql);//query

$tid_usado = $ret->tid;
$Pedido->tid = $tid_usado;
$ret = $Pedido->RequisicaoAutorizacaoPortador();
$dados['erro'] = 'false';
$dados['tid'] = base64_encode((string)$tid_usado);
echo json_encode($dados);
exit;

}else{

$dados['erro'] = 'true';
$dados['msg'] = "Ops, problema ao gerar TID, rever configuracoes!";
echo json_encode($dados);
exit;

}

}else{

$dados['erro'] = 'true';
$dados['msg'] = "Ops, post invalido!";
echo json_encode($dados);
exit;

}
?>