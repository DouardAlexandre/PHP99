<?php


/**
* Fonction qui determine si une phrase est un pangramme
*/

function isPangram($sentence){


	$lowchars = strtolower($sentence);

    //Un premier tableau qui contient les lettres de l'alphabet
	$alphabet = range('a', 'z');

    //Un second qui contient les caracteres du mot étudié
	$tablettres = str_split($lowchars);

	//Croisement des deux tableaux ,les occurences sont placées dans un nouveau tableau
	$occurences =[];
	$occurences = array_intersect($tablettres,$alphabet);

    //Chaque lettre est rangée dans un tableau en fonction de ses occurences
	$array = array_count_values($occurences);

    //Si la longueur du tableau d'occurences >26 alors le mot est un pangramme
	if(count($array) >= 26) {
		return true;
	}
    //Si il est inferieur à 26, il ne contient pas chaque lettre de l'alphabet
	return false;
}





