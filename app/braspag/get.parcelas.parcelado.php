<?php
include "dados.php";
include "loja5.php";
if(isset($_GET['id']) && isset($_GET['total']) && md5($_GET['total'])==$_GET['hash']){
//pega os dados e vars
$minimo = (float)$config->get('buypageloja5_minimo');
$desconto = (float)$config->get('buypageloja5_desconto_credito');
$divmax = GetParcelas($_GET['id'],$config);
$divsem = GetSemJuros($_GET['id'],$config);
$juros  = QualJuros($_GET['id'],$config);
$total  = (float)$_GET['total'];

//calcula os minimos
$split = (int)$total/$minimo;
if($split>=$divmax){
$div = (int)$divmax;
}elseif($split<$divmax){
$div = (int)$split;
}elseif($total<=$minimo){
$div = 1;
}

//seleta o tipo de parcelamento
if($config->get('buypageloja5_tipo_parcelamento')==0){
$pcom = 3;
$psem = 2;
}elseif($config->get('buypageloja5_tipo_parcelamento')==2){
$pcom = 2;
$psem = 2;
}elseif($config->get('buypageloja5_tipo_parcelamento')==3){
$pcom = 3;
$psem = 3;
}

//inicio
$linhas[''] = "-- Selecione o Valor --";

//avista
if($desconto>0){
$desconto_valor = ($total/100)*$desconto;
$linhas[base64_encode('1|1|'.number_format(($total-$desconto_valor), 2, '.', '').'|'.base64_encode($_GET['id']).'|'.base64_encode($total).'|'.md5(($total-$desconto_valor)))] = "&Agrave; vista por ".number_format(($total-$desconto_valor), 2, '.', '')." (j&aacute; com ".$desconto."% off)";
}else{
$linhas[base64_encode('1|1|'.number_format(($total), 2, '.', '').'|'.base64_encode($_GET['id']).'|'.base64_encode($total).'|'.md5($total))] = "&Agrave; vista por ".number_format(($total), 2, '.', '')."";
}

//se tiver parcelado
if($div>=2){
for($i=1;$i<=$div;$i++){
if($i>1){
if($i<=$divsem){
$linhas[base64_encode(''.$i.'|'.$psem.'|'.number_format(($total), 2, '.', '').'|'.base64_encode($_GET['id']).'|'.base64_encode($total).'|'.md5($total))] = $i."x de ".number_format(($total/$i), 2, '.', '')." sem juros";
}else{
$parcela_com_juros = CalcularJurosCielo($total, $juros, $i);
$linhas[base64_encode(''.$i.'|'.$pcom.'|'.number_format(($total), 2, '.', '').'|'.base64_encode($_GET['id']).'|'.base64_encode($total).'|'.md5($total))] = $i."x de ".number_format(($parcela_com_juros), 2, '.', '')." com juros";
}
}
}
}
//converte json
echo json_encode($linhas);
}
?>