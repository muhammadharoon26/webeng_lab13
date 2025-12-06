<?php
echo "Loaded Extensions:\n";
print_r(get_loaded_extensions());
echo "\nExtension Dir: " . ini_get('extension_dir') . "\n";
echo "Mbstring Loaded: " . (extension_loaded('mbstring') ? 'Yes' : 'No') . "\n";
