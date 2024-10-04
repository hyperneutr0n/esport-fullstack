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
        echo "<script>alert('Game Added Successfully');</script>"; 
      } else {
        echo "<script>alert('Failed to add game');</script>";
      }
    }
  }

  public function DeleteGame()
  {
    if (Middleware::checkAdmin()) {
      $idgame = $_GET["id"];
      if ($this->model->deleteGame($idgame)) {
        echo "<script>alert('Game Deleted');</script>";
      } else {
        echo "<script>alert('Failed to delete game');</script>";
      }
    } else {
      echo "<script>alert('Game not found');</script>";
    }
  }

  public function EditGame()
  {
    if (Middleware::checkPostMethod() && Middleware::checkAdmin()) {
      $idgame = $_POST["idgame"];
      $name = $_POST["name"];
      $description = $_POST["description"];

      if ($this->model->updateGame($idgame, $name, $description)) {
        echo "<script>alert('Edit game success');</script>";
      } else {
        echo "<script>alert('Failed to edit game');</script>";
      }
    } else {
      echo "<script>alert('Game not found');</script>";
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

     // intinya bikin method buat select semua game
    require_once  'views/admin/create/add_game.php';
  }

  public function showEditGameForm()
  {
    if (Middleware::checkAdmin()) {
      $id = $_GET["id"];
      $game = $this->model->SelectGameId($id);
      require_once 'views/admin/update/edit_game.php';
    }
     // harusnya require once
  }
}
