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
        header('Location: /admin/game?message=Succesfully%20added%20game');
      } else {
        header('Location: /admin/game?message=Failed%20adding%20game');
      }
    } else {
      header("Location: /");
    }
  }

  public function DeleteGame()
  {
    if (Middleware::checkAdmin()) {
      $idgame = $_GET["id"];
      if ($this->model->deleteGame($idgame)) {
        header('Location: /admin/game?message=Succesfully%20deleted%20game');
      } else {
        header('Location: /admin/game?message=Failed%20deleting%20game');
      }
    } else {
      header("Location: /");
    }
  }

  public function EditGame()
  {
    if (Middleware::checkPostMethod() && Middleware::checkAdmin()) {
      $idgame = $_POST["idgame"];
      $name = $_POST["name"];
      $description = $_POST["description"];

      if ($this->model->updateGame($idgame, $name, $description)) {
        header('Location: /admin/game?message=Succesfully%20updated%20game');
      } else {
        header('Location: /admin/game?message=Failed%20updating%20game');
      }
    } else {
      header("Location: /");
    }
  }

  public function showGameForm()
  {
    if (Middleware::checkAdmin()) {
      $games = $this->model->SelectGame();
      require_once 'views/admin/read/game.php';
    }
    header("Location: /");
  }

  public function showAddGameForm()
  {
    if (Middleware::checkAdmin()) {

      require_once  'views/admin/create/add_game.php';
    } else {
      header("Location: /");
    }
  }

  public function showEditGameForm()
  {
    if (Middleware::checkAdmin()) {
      $id = $_GET["id"];
      $game = $this->model->SelectGameId($id);
      require_once 'views/admin/update/edit_game.php';
    } else {
      header("Location: /");
    }
  }
}
