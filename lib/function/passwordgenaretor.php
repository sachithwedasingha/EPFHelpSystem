
<?php
     function get_password() {
           
       
         $pass = "";
         $str="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789";
         $len=8;
      
         $str_length = strlen($str);
        
         if($len == 0 || $len > $str_length){
             $len = $str_length;
         }
        
        
         for($i = 0;  $i < $len; $i++){
               
             $pass .=  $str[rand(0, $str_length)];
         }
         return $pass;
     }
        
?>