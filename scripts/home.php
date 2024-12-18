<?php
defined ('CONTROL') or die('Acesso Inválido');



$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://restcountries.com/v2/all",  // Alterado para v2, que é a versão 1.0 da API
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => [
    "Accept: */*",
    "User-Agent: Thunder Client (https://www.thunderclient.com)"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}




// get all countries data
//$api = new ApiConsumer();
//$countires = $api->get_all_countries();
?>


<div class="container mt-5">
    <div class="row">
        <div class="col text-center">
            <h3>Vamos consumir uma API com PHP puro 2024</h3>

        </div>
    </div>
</div> 

