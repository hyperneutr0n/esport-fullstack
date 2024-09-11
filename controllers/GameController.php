<?php
require_once 'Middleware.php';
require_once '../models/Game.php';
class GameController
{
  private $model;

  public function __construct()
  {
    $this->model = new Game();
  }

  public function addGame()
  {
    if (Middleware::checkPostMethod() && Middleware::checkAdmin()) {
      $name = $_POST["name"];
      $description = $_POST["description"];

      if ($this->model->addGame($name, $description)) {
        echo "Game Added Successfully"; //sementara 
      } else {
        echo "Failed to add game.";
      }
    }
  }

  public function deleteGame($idgame)
  {
    if (Middleware::checkPostMethod() && Middleware::checkAdmin()) {
      if ($this->model->deleteGame($idgame)) {
        echo "Game Deleted";
      } else {
        echo "Failed to delete game.";
      }
    } else {
      echo "Game not found";
    }
  }

  public function editGame($idgame)
  {
    if (Middleware::checkPostMethod() && Middleware::checkAdmin()) {
      $name = $_POST["name"];
      $description = $_POST["description"];

      if ($this->model->updateGame($idgame, $name, $description)) {
        echo "Edit game success.";
      } else {
        echo "Failed to edit game.";
      }
    } else {
      echo "Game not found";
    }
  }

  public function showAddGameForm()
  {
    /* $check = $this->middleware->checkAdmin();
    if (!$check) {
      require_once 'views/admin/home.php';
    } else {
      require_once 'views/add_game.php';
    } */

    require_once 'views/admin/add_game.php';


    //page ta buat gini ?
  }

  public function showEditGameForm($idgame)
  {
    $game = $this->model->getGameById($idgame);
    if ($game) {
      require_once 'views/edit_game.php';
      // ini juga 
    } else {
      echo "Game not found.";
    }
  }
}
