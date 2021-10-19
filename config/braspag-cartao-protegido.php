<?php
return [

    /**
     * Utilizar a documentação da Braspag para auxiliar na configuração
     * @link https://braspag.github.io//manual/cartao-protegido-api-rest
     */

    // ID do merchant
    'merchantId' => env('BRASPAG_MERCHANT_ID'),

    // ID do cliente
    'clientId' => env('BRASPAG_CLIENT_ID'),

    // Segredo do cliente
    'clientSecret' => env('BRASPAG_CLIENT_SECRET'),

    // URL padrão
    'baseUrl' => env('BRASPAG_BASEURL', 'https://cartaoprotegidoapi.braspag.com.br/'),
    // URL de autenticação
    'authUrl' => env('BRASPAG_AUTHURL', 'https://auth.braspag.com.br/oauth2/token'),

    // Timeout de requisições
    'timeout' => env('BRASPAG_TIMEOUT', 0),

    // Opção de proxy na comunicação
    'proxy' => env('BRASPAG_PROXY'),

    // Tempo de duração to token em cache (evita fazer autenticação para cada requisição solicitada indiferente do cliente)
    'tokenCachedTime' => env('BRASPAG_TOKEN_CACHE', 5),
];
