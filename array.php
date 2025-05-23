<?php
$data = [
    ["nama" => "Aidilia", "umur" => 19],
    ["nama" => "Fitria", "umur" => 20],
    ["nama" => "Sari", "umur" => 21],
    ["nama" => "Dina", "umur" => 17],
    ["nama" => "Rama", "umur" => 19],
    ["nama" => "Dani", "umur" => 22],
    ["nama" => "Dona", "umur" => 19],
    ["nama" => "Tobita", "umur" => 23],
    ["nama" => "Ihsan", "umur" => 21],
    ["nama" => "Hakim", "umur" => 18],
    ["nama" => "Maul", "umur" => 19],
    ["nama" => "Lana", "umur" => 22],
    ["nama" => "Kina", "umur" => 20],
    ["nama" => "Kasna", "umur" => 19],
    ["nama" => "Kusna", "umur" => 19],
];

$json = json_encode($data, JSON_PRETTY_PRINT);
echo "<pre>$json</pre>";

?>