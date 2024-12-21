<?php
defined('CONTROL') or die('Acesso Inválido');

$api = new ApiConsumer();
$country = $_GET['country_name'] ?? null;

if (!$country) {
    header('Location: ?route=home');
    die();
}

// Obter dados do país
$country_data = $api->get_country($country);

// Validar retorno da API
if (!$country_data || !is_array($country_data) || empty($country_data)) {
    die('Erro: dados do país não encontrados.');
}

$country_info = $country_data[0]; // Primeiro elemento do array
?>

<div class="container mt-5">
    <div class="d-flex">
        <!-- Imagem da bandeira -->
        <div class="card p-2 shadows">
            <?php if (isset($country_info['flags']['png'])): ?>
                <img src="<?= htmlspecialchars($country_info['flags']['png'], ENT_QUOTES, 'UTF-8') ?>" alt="Bandeira de <?= htmlspecialchars($country_info['name'], ENT_QUOTES, 'UTF-8') ?>">
            <?php else: ?>
                <p>Bandeira não disponível.</p>
            <?php endif; ?>
        </div>

        <!-- Dados do país -->
        <div class="ms-5 align-self-center">
            <p>
                <strong>Nome:</strong>
                <?= htmlspecialchars($country_info['name'], ENT_QUOTES, 'UTF-8') ?>
            </p>
            <p>
                <strong>Capital:</strong>
                <?= htmlspecialchars($country_info['capital'], ENT_QUOTES, 'UTF-8') ?>
            </p>
        </div>
    </div>
</div>
