<?php

class Motoadicto {
  public static function formatDate($str)
  {
    $date = date_create($str);
    return date_format($date, 'd/m/Y');
  }
  public static function getDay($str)
  {
    $date = date_create($str);
    return date_format($date, 'd');
  }
  public static function getMonth($str)
  {
    $search  = array('Jan','Feb','Mar','Apr', 'May', 'Jun', 'Jul', 'Aug','Sep','Oct','Nov','Dec');
    $replace = array('Ene','Feb','Mar','Abr', 'May', 'Jun', 'Jul', 'Ago','Sep','Oct','Nov','Dic');
    $date = date_create($str);
    return str_replace($search,$replace,date_format($date, 'M'));
  }
  public static function getYear($str)
  {
    $date = date_create($str);
    return date_format($date, 'Y');
  }

}

?>
