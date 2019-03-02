<?php

function renderGallery($imgDir)
{
    $imgLinks = scandir($imgDir, SCANDIR_SORT_NONE);
    $imgLinks = array_slice($imgLinks, 2);
    $imgHtml = '';
    foreach ($imgLinks as $key => $imgLink) {

        $imgHtml = $imgHtml . "<div class='divImg'><img src=\"img/$imgLink\" alt=\"$key\" class='imgGallery'></div>";
    }
    return $imgHtml;
}

function renderScripts($jsDir)
{
    $jsLinks = scandir($jsDir);
    $jsLinks = array_slice($jsLinks, 2);
    $jsString = '';

    foreach ($jsLinks as $key => $jsLink) {

        $wholeLink = $jsDir . '/' . $jsLink;
        $jsString = $jsString . "<script src='$wholeLink'></script>";

    }

    return $jsString;
}

function renderStyles($cssDir)
{
    $cssLinks = scandir($cssDir);
    $cssLinks = array_slice($cssLinks, 2);
    $cssString = '';

    foreach ($cssLinks as $key => $cssLink) {
        $wholeLink = $cssDir . '/' . $cssLink;
        if (getExtension($wholeLink) === 'scss') {
            continue;
        }
        $cssString = $cssString . "<link rel=\"stylesheet\" type=\"text/css\" href=\"$wholeLink\">";


    }

    return $cssString;
}

function render($file, $variables = [])
    {
        if (!is_file($file)) {
            echo "$file не найден";
            exit();
        }
        if (filesize($file) === 0) {
            echo "Файл по адресу $file пустой";
            exit();
        }
        $fileContent = file_get_contents($file);


        if (empty($variables)) {
            return $fileContent;
        }
        foreach ($variables as $key => $value) {
            if (empty($value)) {
                continue;
            }

            $keyNew = '{{' . strtoupper($key) . '}}';


            $fileContent = str_replace($keyNew, $value, $fileContent);
        }
        echo $fileContent;
    }

    function getExtension ($file) {
    $path = pathinfo($file);
        return $path['extension'];
    }

