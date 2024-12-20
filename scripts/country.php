<?php
defined ('CONTROL') or die('Acesso Inválido');

$api = new ApiConsumer();
$country = $_GET['country_name'] ?? null;

if(!$country){
    header('Location: ?route=home');
    die();
}

//get country data
$country_data = $api->get_country($country);

?>

<div class="container mt-5">
    <div class="d-flex">
        <div class="card p-2 shadows">
            <img src="<? $country_data[0]['flags']['png'] ?>">
        </div>
        <div class="ms-5 align-self-center">
            <p><?= $country_data[0]['name']['common'] ?></p>
            <p>Capital:</p>
            <p><?= $country_data[0]['capital']['0'] ?></p>
        </div>
    </div>
</div>

