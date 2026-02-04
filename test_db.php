<?php

require __DIR__.'/vendor/autoload.php';

$app = require __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

$kernel->bootstrap();

use App\Models\Choco;

try {
    $choco = new Choco();
    echo "Model Connection Name: " . $choco->getConnectionName() . "\n";
    echo "Model Database Name: " . $choco->getConnection()->getDatabaseName() . "\n";
    echo "Model Collection/Table Name: " . $choco->getTable() . "\n";
    
    $count = $choco->count();
    echo "Model Count: " . $count . "\n";

} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
