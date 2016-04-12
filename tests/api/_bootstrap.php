<?php
// Here you can initialize variables that will be available to your tests
$dotenv = new Dotenv\Dotenv(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..');
$dotenv->load();
$dotenv->required(['DB_HOST', 'DB_NAME_TEST', 'DB_USER', 'DB_PASSWORD'])->notEmpty();
