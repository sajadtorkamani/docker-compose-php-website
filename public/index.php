<?php
/** @var PDO $pdo */

require_once '../vendor/autoload.php';
require_once '../lib/database.php';

$sql = 'SELECT * from messages';
$stmt = $pdo->query($sql);

?>

<h1>Hello Docker!</h1>

<p>Hi. I'm running inside a Docker container.</p>

<p>I've successfully connected to a MySQL database that runs in a separate
  Docker container. How cool?</p>

<img src="/img.png" alt="Docker" style="max-width: 100%; width: 400px">

<p>
  You persist data to MySQL using volumes and the data will be there even when
  you stop and restart the container.
</p>

<section style="margin-bottom: 20px">
  <h3>Messages (<?= $stmt->rowCount() ?>)</h3>
    <?php while ($row = $stmt->fetch()): ?>
      <article style="margin-bottom: 10px;">
        <div style="margin-bottom: 5px;">
            <?= $row['body'] ?>
        </div>
        <em>
          (<?= $row['created_at'] ?>)
        </em>
      </article>
      <hr>
    <?php endwhile; ?>
</section>

<form action="../http/process-message.php" method="post">
  <input name="message" placeholder="Type a message" value="Hi" />
  <button>Add message</button>
</form>


