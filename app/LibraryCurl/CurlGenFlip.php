<?php
namespace App\LibraryCurl;
use App\Model\Token;
use SimpleXMLElement;
use Response;
use Config;


class CurlGenFlip {
  public function getIndex($type_url, $urls){ //GET
    $url = config('flip.api_url_v2').$urls;
    if ($type_url === 'v3') {
        $url = config('flip.api_url_v3').$urls;
    }
    date_default_timezone_set("Asia/Jakarta");
    $content_type = "*/*";
    $authorization = config('flip.auth');

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'Accept: '.$content_type,
      'Authorization: basic '.$authorization
      )
    );
      $output = curl_exec($ch);
      $info = curl_getinfo($ch);
      $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

      curl_close($ch);

      $result = json_decode($output, true);
      $status = true;

      if ($httpCode != 200) {
        $status = false;
      }
      return array(
          'success' => $status,
          'data' => $result,
          'status' => $httpCode
      );
  }

  public function store($type_url, $urls,$data){ //POST

    $url = config('flip.api_url_v2').$urls;
    if ($type_url === 'v3') {
        $url = config('flip.api_url_v3').$urls;
    }
    date_default_timezone_set("Asia/Jakarta");
    $authorization = config('flip.auth');

    $datas = json_encode($data);
    $content_type = "application/json";

    $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          'Content-Type: '.$content_type,
          'Accept: '.$content_type,
          'Authorization: basic '.$authorization
        )
      );
      $output = curl_exec($ch);
      $info = curl_getinfo($ch);
      $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
      curl_close($ch);

      $result = json_decode($output, true);
      $status = true;

      if ($httpCode != 200 && $httpCode != 201) {
        $status = false;
      }
      return array(
          'success' => $status,
          'data' => $result,
          'status' => $httpCode
      );

  }
}
