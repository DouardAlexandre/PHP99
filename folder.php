<?php

/**
* Fonction qui réorganise un dossier , en créant des répertoires du nom de leur extensions
*/

function rangementParExtentions($folder){

	//Les noms des fichiers sont placés dans un tableau (en elevant les elements qui commencent par "."(current directory) et ".."(parent directory) avec array_diff()  
	$dossierARanger = array_diff(scandir($folder), array(".", "..") );


    //pour chaque element du doosier
	foreach($dossierARanger as $key => $filename){


        //On definit le chemin d'acces
		$directory = "$folder/$filename";

		//On recupere l'extention des fichiers
		$extension = strtolower(pathinfo($directory, PATHINFO_EXTENSION));

        //Si c'est un dossier , on le supprime du tableau pour ne traiter que les fichiers
		if(is_dir("$folder/$extension")){
			unset($dossierARanger[$key]);
		}
		
        //On verifie que le fichier existe
		if(is_file($directory)){

		    //On verifie que le dossier n'existe pas déjà
			if(!is_dir("$folder/$extension")){ 
                //On crée le dossier 
				mkdir("$folder/$extension", 0755);
			}
		}
		//On supprime le dossier "db" crée pour les miniatures ---thumbs.db
		$db = "db";
		$dir = "$folder/$db";
		if(is_dir("$dir")){
			rmdir("$dir");
		}

		//On verifie que le dossier existe 
		if(is_dir("$folder/$extension")){ 
	        //On verifie que le fichier a deplacer n'existe pas déjà dans la destination
			if(!is_file("$folder/$extension/$filename")){
				rename("$folder/$filename","$folder/$extension/$filename");
			}else { 
				echo "the file $filename already exist";}

			}
			
	}//fin foreach
	
	

}
rangementParExtentions("dossier");




