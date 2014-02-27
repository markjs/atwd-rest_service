<?php

function transform_slug_to_title($slug) {
  return ucwords(preg_replace('/_/', ' ', $slug));
}
