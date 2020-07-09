<!-- Hier gaan we database linken -->
<?php
$host = 'localhost:3306';
$db   = 'bit-feed';
$user = 'bit-feed';
$pass = 'o6ai9r9G7K8GzX7pNNnquYCz34H7dv';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
