<?php
namespace App\helpers;

class helper
{
      // check if path and if no path make one
      public static function generatePath($path)
      {
          if (!file_exists($path)) {
              mkdir($path, 0777, true);
          }
          return $path;
      }
}
