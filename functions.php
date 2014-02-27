<?php

function transform_slug_to_title($slug) {
  return ucwords(preg_replace('/_/', ' ', $slug));
}

function print_404($message) {
  $dom = new DOMDocument;

  $response = $dom->createElement('response');
  $response->setAttribute('timestamp', time());

  $error = $dom->createElement('error');
  $error->setAttribute('code', '404');
  $error->setAttribute('desc', $message);

  $response->appendChild($error);

  $dom->appendChild($response);
  $dom->formatOutput = true;

  header('Content-Type: text/xml');
  http_response_code(404);
  echo $dom->saveXML();
}
