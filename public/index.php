<?php

require_once __DIR__ . '/../config/config.php';



render(TEMPLATES_DIR . "mainpageTemplate.tpl", [
    'title' => 'Gallery',
    'content' => renderGallery('img'),
    'styles' => renderStyles('css'),
    'script' => renderScripts('js')
    ]);







