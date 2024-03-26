<?php
include 'db_connect.php';

function percent($value, $percent){
	$result = ($percent / 100) * $value;
	return $result;
}

function limit_words($string, $word_limit){
    $words = explode(" ",$string);
    return implode(" ",array_splice($words,0,$word_limit));
}

function real($value){
	@$result = 'R$ '.number_format($value, 2, ',', '.');
	return $result;
}

function moeda($get_valor) {
	$source = array('.', ',');
	$replace = array('', '.');
	$valor = str_replace($source, $replace, $get_valor);
	return $valor;
}

function valorReal($value){
	@$result = number_format($value, 2, ',', '.');
	return $result;
}