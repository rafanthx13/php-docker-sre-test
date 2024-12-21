<?php
// Ativar exibição de erros
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Registrar logs
function log_message($level, $message) {
    $logFile = '/var/log/php5-app/app.log';
    $timestamp = date("Y-m-d H:i:s");
    file_put_contents($logFile, "[$timestamp] [$level] $message\n", FILE_APPEND);
}

// Rota GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    log_message('INFO', 'GET request received');
    echo json_encode(['message' => 'Hello, this is a GET endpoint!']);
    exit;
}

// Rota POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    log_message('INFO', 'POST request received with data: ' . json_encode($data));
    echo json_encode(['message' => 'POST request received', 'data' => $data]);
    exit;
}

// Rota não encontrada
header("HTTP/1.1 404 Not Found");
log_message('ERROR', '404 - Route not found');
echo json_encode(['error' => 'Route not found']);
exit;
