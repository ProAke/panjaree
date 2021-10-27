<?php

require_once "vendor/autoload.php";

use thiagoalessio\TesseractOCR\TesseractOCR;

echo (new TesseractOCR('img/thpost.jpg'))
    ->lang('th')
    ->executable('post.txt')
    ->run();
