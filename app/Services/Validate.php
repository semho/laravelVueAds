<?php

namespace App\Services;

class Validate
{

  public static function clean($value)
  {
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);

    return $value;
  }

  public static function check_length($value, $min, $max)
  {
    $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);

    return !$result;
  }
}
