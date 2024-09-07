<?php
require_once 'Middleware.php';
class GameController
{
  private $model;
  private $middleware;

  public function __construct($model)
  {
    $this->model = $model;
    $this->middleware = new Middleware();
  }

  public function addGame()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["add"])) {
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
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["delete"])) {
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
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["edit"])) {
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
