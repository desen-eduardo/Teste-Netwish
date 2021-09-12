<?php

class ValidarDados 
{
   public static function validar(array $data): bool
   {
       foreach ($data as $key) {
           if (empty($key)) {
               return false;
           }
       }

       return true;
   } 
}