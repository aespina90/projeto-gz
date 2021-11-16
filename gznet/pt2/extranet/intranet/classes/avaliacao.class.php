<?php



    class AVALIACAO{

        public function Quest_show($q, $i){
            
            echo $q[$i]['pergunta'];
            echo '<br>';

          
        }



        public function Perg_show($q, $i){
            
                    $pergs[0] = $q[$i]['r1'];
                    $pergs[1] = $q[$i]['r2'];
                    $pergs[2] = $q[$i]['r3'];
                    $pergs[3] = $q[$i]['r4'];
                    $pergs[4] = $q[$i]['r5'];

                    

                    shuffle($pergs);

            for ($j = 0; $j < 5; $j++){
                if($i == 0){
                    $id[] = $i + 1 +$j;
                }else if($i == 1){
                    $id[] = $i + 5 +$j;
                }else if($i == 2){
                    $id[] = $i + 9 +$j;
                }else if($i == 3){
                    $id[] = $i + 13 +$j;
                }else if($i == 4){
                    $id[] = $i + 17 +$j;
                }else if($i == 5){
                    $id[] = $i + 21 +$j;
                }else if($i == 6){
                    $id[] = $i + 25 +$j;
                }else if($i == 7){
                    $id[] = $i + 29 +$j;
                }else if($i == 8){
                    $id[] = $i + 33 +$j;
                }else if($i == 9){
                    $id[] = $i + 37 +$j;
                }else if($i == 10){
                    $id[] = $i + 41 +$j;
                }else if($i == 11){
                    $id[] = $i + 45 +$j;
                }else if($i == 12){
                    $id[] = $i + 49 +$j;
                }else if($i == 13){
                    $id[] = $i + 53 +$j;
                }else if($i == 14){
                    $id[] = $i + 57 +$j;
                }else if($i == 15){
                    $id[] = $i + 61 +$j;
                }else if($i == 16){
                    $id[] = $i + 65 +$j;
                }else if($i == 17){
                    $id[] = $i + 69 +$j;
                }else if($i == 18){
                    $id[] = $i + 73 +$j;
                }else if($i == 19){
                    $id[] = $i + 77 +$j;
                }


            }



            for($j = 0; $j < 5; $j++){
                echo '<input type="radio" id="resp'.$id[$j].'" name="resp'.$i.'" value="'.$pergs[$j].'" />';
                echo ' '.$pergs[$j];
                echo '<br>';
            }
                return $pergs;
        }



        public function Perg_show2($q, $i){

            for($j = 0; $j < 5; $j++){

                echo ' '.$q[$i][$j];
                echo '<br>';
            }

        }




    }

?>
