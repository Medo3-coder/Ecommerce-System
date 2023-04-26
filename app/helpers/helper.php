<?php

// check if path and if no path make one
function generatePath($path) {
    if (!file_exists($path)) {
        mkdir($path, 0777, true);
    }
    return $path;
}

function convert2english($string) {
    $newNumbers = range(0, 9);
    $arabic     = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
    $string     = str_replace($arabic, $newNumbers, $string);
    return $string;
}

function fixPhone($string = null) {
    if (!$string) {
        return null;
    }

    $result = convert2english($string);
    $result = ltrim($result, '00');
    $result = ltrim($result, '0');
    $result = ltrim($result, '+');
    return $result;
}

if (!function_exists('languages')) {
    function languages() {
        return ['ar', 'en'];
    }
}


if (!function_exists('defaultLang')) {
    function defaultLang() {
      return 'ar';
    }
  }
