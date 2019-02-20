<?php

call_user_func(function(...$files) {
    foreach ($files as $file) {
        if (file_exists($file)) {
            /** @noinspection PhpIncludeInspection */
            require_once $file;
        }
    }
}, __DIR__ . '/../vendor/fact-finder/fact-finder-php-library/src/FACTFinder/Loader.php');
