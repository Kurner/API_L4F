<?php

function getMembers()
{
    $pdo = dbbConnexion();
    $req = "SELECT * FROM membres";
    prepareSelectSQL($req);
}

function getMembersById($memberId)
{
    $pdo = dbbConnexion();
    // $req = "SELECT * FROM membres WHERE id=$memberId";
    $req = "SELECT
    membres.pseudo,
    games.nameGame
  FROM membres
  INNER JOIN membresGames
    ON membres.id = membresGames.membresID
  LEFT JOIN games
    ON membresGames.gamesID = games.id
    WHERE membres.id = $memberId";
    prepareSelectSQL($req);
}

function getGames()
{
    $pdo = dbbConnexion();
    $req = "SELECT * FROM games";
    prepareSelectSQL($req);
}

function getGamesById($idGames)
{
    $pdo = dbbConnexion();
    $req = "SELECT * FROM games WHERE id=$idGames";
    prepareSelectSQL($req);
}

function dbbConnexion()
{
    return new PDO("mysql:host=localhost;dbname=L4F;charset=utf8","user","user");
}

function sendJSON($data)
{
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    echo json_encode($data,JSON_UNESCAPED_UNICODE);
}

function prepareSelectSQL($req)
{
    $pdo = dbbConnexion();
    $stmt = $pdo->prepare($req);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    sendJSON($data);
}