<?php
    class RESULTADO{

        public function Acertos($var1, $var2){
            $nota = 0;
            for ($i = 0; $i < 20; $i++){
                if($var1[$i] == $var2[$i]){
                    $nota++;
                }else{
                    
                }
            }

            return ($nota/2)*10;

        }

        }

?>
