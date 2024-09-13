<?php
require_once 'Middleware.php';
require_once __DIR__ . '/../models/Game.php';

class GameController
{
  private $model;

  public function __construct()
  {
    $this->model = new Game();
  }

  public function AddGame()
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

  public function DeleteGame($idgame)
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

  public function EditGame($idgame)
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

  public function showGameForm()
  {
    if (Middleware::checkAdmin()) {
      $games = $this->model->SelectGame();
      require_once 'views/admin/read/game.php';
    }
  }

  public function showAddGameForm()
  {
    // intinya bikin method buat select semua game

    require_once 'views/admin/add_game.php';
  }

  public function showEditGameForm($idgame)
  {
    // harusnya require once
  }
}
