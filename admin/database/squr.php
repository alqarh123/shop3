<?php
class squr
{
   public static function squr_add($data)
   {
   $data_s=str_replace(" ","_","$data");
    return $data_s;
   }
   public static function squr_del($data)
   {
      $data_s=str_replace("_"," ","$data");
    return $data_s;
   }
}
?>