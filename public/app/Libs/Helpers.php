<?php
// init
function digit($n){
	return ($n<10)?"0".$n : $n;
}

function order_by_song_name($a,$b)
{
  return $a['slug'] > $b['slug'];
}

function order_by_song_hits($a,$b)
{
  return $a['hits'] < $b['hits'];
}

function slug($string, $slug='-', $maxlength=50) {
    $string = str_replace("&#39;","'",$string);
    $string = str_replace("'","",$string);
    $string = strip_tags(html_entity_decode($string));
    $string = str_replace(" & "," y ",$string);
    $seo = strtolower(trim(preg_replace('~[^0-9a-z]+~i', $slug, html_entity_decode(preg_replace('~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', htmlentities($string, ENT_QUOTES, 'UTF-8')), ENT_QUOTES, 'UTF-8')), $slug));
    if(strlen($seo) > $maxlength) {
          $seo = substr($seo, 0, $maxlength);
          $pos = (int)strrpos($seo, $slug);
          if($pos)
             $seo = substr($seo, 0, $pos);
    }
    return $seo;
}
