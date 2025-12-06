<?php
$path = __DIR__ . '/bootstrap/cache';
echo "Checking path: $path\n";
echo "Exists: " . (is_dir($path) ? 'Yes' : 'No') . "\n";
echo "Writable: " . (is_writable($path) ? 'Yes' : 'No') . "\n";
if (!is_dir($path)) {
    echo "Attempting to create...\n";
    mkdir($path, 0755, true);
    echo "Exists after create: " . (is_dir($path) ? 'Yes' : 'No') . "\n";
}
file_put_contents($path . '/test.txt', 'test');
echo "File write test: " . (file_exists($path . '/test.txt') ? 'Success' : 'Failed') . "\n";
