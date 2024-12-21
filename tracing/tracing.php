<?php
header("Content-Type: text/plain");

// Exemplo de tracing
$traceId = uniqid('trace_');
$spanId = uniqid('span_');

// Simulação de trace
echo "trace_id: {$traceId}\n";
echo "span_id: {$spanId}\n";
?>
