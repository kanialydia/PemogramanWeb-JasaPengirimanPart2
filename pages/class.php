<?php
function get_city($query,$type)
{
//library yang harus anda download
require_once 'REST_Ongkir.php';
 
 $rest = new REST_Ongkir(array(
 'server' =&amp;gt; 'http://api.ongkir.info/'
 ));
 
//ganti API-Key dibawah ini sesuai dengan API Key yang anda peroleh setalah mendaftar di ongkir.info
 $result = $rest-&amp;gt;post('city/list', array(
 'query' =&amp;gt; $query,
 'type' =&amp;gt; $type,
 'courier' =&amp;gt; 'jne',
 'API-Key' =&amp;gt; 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456' ), 'JSON');
 
 try
 {
 $status = $result['status'];
 
 // Handling the data
 if ($status-&amp;gt;code == 0)
 {
 return $cities = $result['cities'];
 //print_r($cities);
 //foreach ($cities-&amp;gt;item as $item)
 //{
 //echo 'Kota: ' . $item . '&amp;lt;br /&amp;gt;';
 // }
 }
 else
 {
 echo 'Tidak ditemukan kota yang diawali &amp;quot;band&amp;quot;';
 }
 
 }
 catch (Exception $e)
 {
 echo 'Processing error.';
 }
}
 
function get_cost($from, $to,$weight)
{
//library yang harus anda download
 require_once 'REST_Ongkir.php';
 
 $rest = new REST_Ongkir(array(
 'server' =&amp;gt; 'http://api.ongkir.info/'
 ));
 
//ganti API-Key dibawah ini sesuai dengan API Key yang anda peroleh setalah mendaftar di ongkir.info
 $result = $rest-&amp;gt;post('cost/find', array(
 'from' =&amp;gt; $from,
 'to' =&amp;gt; $to,
 'weight' =&amp;gt; $weight.'000',
 'courier' =&amp;gt; 'jne',
'API-Key' =&amp;gt;'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456'
 ));
 
 try
 {
 $status = $result['status'];
 
 // Handling the data
 if ($status-&amp;gt;code == 0)
 {
 $prices = $result['price'];
 $city = $result['city'];
 
 echo 'Ongkos kirim dari ' . $city-&amp;gt;origin . ' ke ' . $city-&amp;gt;destination . '&amp;lt;br /&amp;gt;&amp;lt;br /&amp;gt;';
 
 foreach ($prices-&amp;gt;item as $item)
 {
 echo 'Layanan: ' . $item-&amp;gt;service . ', dengan harga : Rp. ' . $item-&amp;gt;value . ',- &amp;lt;br /&amp;gt;';
 }
 }
 else
 {
 echo 'Tidak ditemukan jalur pengiriman dari surabaya ke jakarta';
 }
 
 }
 catch (Exception $e)
 {
 echo 'Processing error.';
 }
}
 
//$kota = get_city('ban','origin');
//echo json_encode($kota);
 
?>