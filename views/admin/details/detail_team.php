<?php require __DIR__ . '/../../components/header.php'; ?>

<div class="jumbotron">
  <h1><?= $team["name"] ?></h1>
  <p><?= $team["game_name"] ?></p>
  <div class="justify-content-center align-items-center">
    <img src="../../images/public/<?=$idteam?>.jpg" alt="No logo yet" class = "logo-image">
  </div>
</div>
<div class="d-flex justify-content-center align-items-center mt-5 mb-5 flex-column">

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