<?php

// Composer is the sole source of PHP-Parser. Never install or rewrite vendor files at runtime.
$autoloadFiles = [
    dirname(__DIR__) . '/vendor/autoload.php',
    dirname(__DIR__, 3) . '/autoload.php',
];

foreach ($autoloadFiles as $autoloadFile) {
    if (is_file($autoloadFile)) {
        require_once $autoloadFile;
        break;
    }
}

if (!class_exists(\PhpParser\ParserFactory::class)) {
    fwrite(STDERR, "PHP-Parser 5 is missing. Install dependencies with Composer.\n");
    exit(21);
}

if (!method_exists(\PhpParser\ParserFactory::class, 'createForHostVersion')) {
    fwrite(STDERR, "PHP-Parser 5 is required. Update Composer dependencies.\n");
    exit(26);
}
