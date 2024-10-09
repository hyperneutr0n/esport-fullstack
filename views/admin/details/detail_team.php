<?php require __DIR__ . '/../../components/header.php'; ?>

<h1>This is team details form</h1>
<div class="d-flex justify-content-center align-items-center mt-5 mb-5 flex-column">

  <form action="/process/updateteam" method="POST" id="addteamForm">
    <div>
      <label for="">ID team:</label>
      <input type="text" name="ids" disabled value="<?= $team["idteam"] ?>">
      <input type="hidden" name="id" value="<?= $team["idteam"] ?>">
    </div>
    <div>
      <label for="">Select game: </label>
      <select name="idgame" id="idgame" disabled value="<?= $team["idgame"] ?>">
        <?php foreach ($games as $game) { ?>
          <?php

          if ($game["idgame"] == $team["idgame"]) { ?>
            <option value="<?= $game["idgame"] ?>" selected><?= $game["name"] ?></option>

          <?php
          } else { ?>
            <option value="<?= $game["idgame"] ?>"><?= $game["name"] ?></option>
          <?php } ?>

        <?php } ?>
      </select>
    </div>
    <div>
      <label for="">Name:</label>
      <input type="text" id="name" name="name" disabled value="<?= $team["name"] ?>">
    </div>
  </form>
  <h2>This team past and upcoming events</h2>
  <table border="1">
    <thead>
      <tr>
        <th>ID Event</th>
        <th>Name </th>
        <th>Date</th>
        <th>Description</th>
        <th colspan="2">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($events as $event) { ?>
        <tr>
          <?php $id = $event["idevent"] ?>
          <td><?= $id ?></td>
          <td><?= $event["name"] ?></td>
          <td><?= $event["date"] ?></td>
          <td><?= $event["description"] ?></td>
          <td><a href="/admin/updateevent?id=<?= $id ?>" class="action-link blue-link">Update</a></td>
          <td><a href="/process/deleteevent?id=<?= $id ?>" class="action-link red-link">Delete</a></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <h2>These are this team's achievements</h2>
  <table border="1">
    <thead>
      <tr>
        <th>ID Achievement</th>
        <th>Name</th>
        <th>Date</th>
        <th>Description</th>
        <th colspan=" 2">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($achievements as $achievement) { ?>
        <?php $id = $achievement["idachievement"]; ?>
        <tr>
          <td><?= $achievement["idachievement"] ?></td>
          <td><?= $achievement["name"] ?></td>
          <td><?= $achievement["date"] ?></td>
          <td><?= $achievement["description"] ?></td>
          <td><a href="/admin/updateachievement?id=<?= $id ?>" class="action-link blue-link">Update</a></td>
          <td><a href="/process/deleteachievement?id=<?= $id ?>" class="action-link red-link">Delete</a></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>

</div>

</body>

</html>