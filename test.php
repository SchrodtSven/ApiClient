<?php 

$baseUri = 'https://gateway.marvel.com/v1/public/comics?apikey=%s&hash=%s&ts=%s';
$priv = '4ea332555596e42b08b693f09cfee311d0164c32';
$pub ='b66b7896c2cb68dab0f65627c2bf6394';
$ts = time();
$hash = md5($ts  . $priv . $pub);
$query = http_build_query([
   'apikey' => $pub,
   'hash' => $hash,
   'ts' => $ts
]);
echo $query;
echo PHP_EOL;
echo sprintf($baseUri, $pub, $hash, $ts);
