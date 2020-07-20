<?php

class Frontend {

    // Méthode qui permet de formater la date pour l'affichage
    public static function formatDate($date) {

        $formattedDate = date('d/m/Y', strtotime($date));
        return $formattedDate;
        
	}

}