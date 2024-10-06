<?php
// Nastavení pro API
$url = 'https://henry-morgan.admin.s15.upgates.com/api/v2/products';
$username = '68672353';
$password = 'DTzEIxcrWlVqkMMKL9LW';

// Data, která chceme odeslat
$data = [
    "products" => [
        [
            "code" => "chaos",
            "prices" => [
                [
                    "language" => "cs",
                    "pricelists" => [
                        [
                            "price_purchase" => 69, // Nákupní cena
                            "price_common" => 69     // Běžná cena
                        ]
                    ]
                ]
            ]
        ]
    ]
];

// Inicializace cURL
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Basic ' . base64_encode("$username:$password")
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

// Odeslání požadavku a získání odpovědi
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// Uzavření cURL
curl_close($ch);

// Zpracování odpovědi
if ($httpCode === 200) {
    // Odpověď je úspěšná
    echo "Úspěšně aktualizováno: " . $response;
} else {
    // Odpověď obsahuje chybu
    echo "Chyba při aktualizaci: " . $response;
}
?>
