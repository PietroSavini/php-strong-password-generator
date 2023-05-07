
<?php

   function generateRndPassword($type,$psw_length){
          $rnd_pssword = substr ( str_shuffle($type),0,$psw_length);
          return $rnd_pssword;
   }

?>