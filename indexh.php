<?php
// take data from providers
$provider1Response = file_get_contents('http://localhost/ksiegarnia1');
$provider2Response = file_get_contents('http://localhost/ksiegarnia2');
var_dump($provider1Response);
// parse data from JSON to arrays
$books =  json_decode($provider1Response, true);
echo json_last_error_msg();
$diebucher = json_decode($provider2Response, true);

// transform arrays with data and merge it
$items = array_merge(convertBooks($books), convertDiebucher($diebucher));

// make some random order in response
shuffle($items);
usort($items, 'compare');

// show response in JSON
header('Content-Type: application/json');
echo json_encode($items);

function compare($a, $b){
return strcasecmp($a['JAHRE'], $b['JAHRE']);
}

function convertBooks($books){
 
  $result = [];
    foreach ($books as $book){
        $item = [
            'provider_item_id' => $book['ID'],
            'NAME' => $book['TYTUL'],
            'DERAUTOR' => $book['AUTOR'],
            'JAHRE' => $book['ROK_WYDANIA'],
            'ART' => $book['RODZAJ'],
            'typ' => 'books'
        ];
        array_push($result, $item);
    }
    return $result;
}
function convertDiebucher($diebucher){
    $result = [];
    foreach ($diebucher as $diebucher){
        $item = [
            'provider_item_id' => $diebucher['ID'],
            'NAME' => $diebucher['NAME'],
            'DERAUTOR' => $diebucher['DERAUTOR'],
            'JAHRE' => $diebucher['JAHRE'],
            'ART' => $diebucher['ART'],
            'typ' => 'diebucher'
        ];
        array_push($result, $item);
    }
    return $result;
}