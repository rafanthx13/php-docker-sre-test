<?php
header("Content-Type: text/plain");

// Exemplo de métricas
$totalRequests = 100;  // Simulação
$currentMemoryUsage = memory_get_usage();

echo "php_requests_total {$totalRequests}\n";
echo "php_memory_usage {$currentMemoryUsage}\n";
?>
