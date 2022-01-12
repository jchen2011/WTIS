<?php

function minutenNaarDuur($duur)
{
  $minuten = $duur % 60;
  $uren = floor($duur / 60);
  return sprintf('%02s:%02s', $uren, $minuten);
}
