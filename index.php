<?php
include_once 'fonctions.php';
    try
    {
        if(!empty($_GET['L4F']))
        {
            $url = explode('/', filter_var($_GET['L4F'], FILTER_SANITIZE_URL));

            switch($url[0])
            {
                case "L4F":
                    if(empty($url[1]))
                    {
                        getMembers();
                    }
                    else
                    {
                        getMembersById($url[1]);
                    }
                break;

                case "GAMES":
                    if(!empty($url[1]))
                    {
                        getGamesById($url[1]);
                    }
                    else
                    {
                        getGames();
                    }
                break;

                default : throw new Exception ("Vérifiez l'URL, seulement 'L4F' et 'GAMES' sont disponibles");
            }
        }
        else
        {
            throw new Exception ('Problème lors de la récupération de données !');
        }
    }
    catch(Exception $e)
    {
        $erreur = 
        [
            "message" => $e->getMessage(),
            "code" => $e->getCode()
        ];
        print_r($erreur);
    }