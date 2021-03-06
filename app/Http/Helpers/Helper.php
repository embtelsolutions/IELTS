<?php
use App\BasicSetting as BS;
use App\Language;


if (! function_exists('send_email')) {

    function send_email( $to, $subject, $message)
    {
        $settings = BS::first();
        $from = $settings->contact_mail;

  			$headers = "From: $settings->website_title <$from> \r\n";
  			$headers .= "Reply-To: $settings->website_title <$from> \r\n";
  			$headers .= "MIME-Version: 1.0\r\n";
  			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

  			@mail($to, $subject, $message, $headers);

    }
}


if (! function_exists('setEnvironmentValue')) {
  function setEnvironmentValue(array $values)
  {

      $envFile = app()->environmentFilePath();
      $str = file_get_contents($envFile);

      if (count($values) > 0) {
          foreach ($values as $envKey => $envValue) {

              $str .= "\n"; // In case the searched variable is in the last line without \n
              $keyPosition = strpos($str, "{$envKey}=");
              $endOfLinePosition = strpos($str, "\n", $keyPosition);
              $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);

              // If key does not exist, add it
              if (!$keyPosition || !$endOfLinePosition || !$oldLine) {
                  $str .= "{$envKey}={$envValue}\n";
              } else {
                  $str = str_replace($oldLine, "{$envKey}={$envValue}", $str);
              }

          }
      }

      $str = substr($str, 0, -1);
      if (!file_put_contents($envFile, $str)) return false;
      return true;

  }
}


if (! function_exists('convertUtf8')) {
    function convertUtf8( $value ) {
        return mb_detect_encoding($value, mb_detect_order(), true) === 'UTF-8' ? $value : mb_convert_encoding($value, 'UTF-8');
    }
}


function make_slug($string) {
    return preg_replace('/\s+/u', '-', trim($string));
}


function make_input_name($string) {
    return preg_replace('/\s+/u', '_', trim($string));
}


?>
