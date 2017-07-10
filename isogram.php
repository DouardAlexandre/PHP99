

<?php

/**
* Function qui determine si un mot est un isograme
*/

function isIsogram($word){

 //Scinde une chaîne et capture les positions ,prend en compte les sous-chaînes non vides 
 $chars_a = preg_split('//u',$word, -1, PREG_SPLIT_NO_EMPTY);

//On applique la fonction strtolower sur le tableau
 $chars_array = array_map('strtolower', $chars_a);

 //Supression des espaces vides puis des tirets
 foreach($chars_array as $index => $letter){
    if($letter ==" "){
     unset($chars_array[$index]);
 }
}

 foreach($chars_array as $index => $letter){
    if($letter =="-" ){
     unset($chars_array[$index]);
 }
}

//array_count_values retourne un tableau key->lettre   value->occurences(int)
$occurence_array = array_count_values($chars_array);

//pour chaque element de ce tableau on verifie qu'aucune lettre ne se répete
foreach($occurence_array as $occurence){
    if ($occurence>1){
       return false;
   }
}
return true;
}

