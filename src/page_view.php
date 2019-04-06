<h1>Agendamentos</h1>
<?php
    $pdo = new Connection("localhost", "cip", "root", "");
    $conn = $pdo->getConnection();

    if(isset($_GET["del_id"])){
      $id = $_GET["del_id"];
      $del = $conn->prepare("DELETE FROM diary WHERE id = ?");
      $del->bindParam(1, $id);
      $del->execute();
      header("Location: ?pg=page_view");
    }

    $select = $conn->prepare("SELECT * FROM diary ORDER BY id DESC");
    $select->execute();
    while($qr = $select->fetch(PDO::FETCH_OBJ)){
        $type = ($qr->type == 0) ? "Laboratório" : "Sala de reunião";
        $d = date("d/m/Y", strtotime($qr->date));
        $start = $qr->start;
        $end = $qr->end;
        $teacher = $qr->teacher;
?>
<div class="box">
<p><?php echo $type; ?></p>
<p><?php echo $d; ?></p>
<p><?php echo $start; ?> - <?php echo $end; ?></p>
<p><?php echo $teacher; ?></p>
<p><a class="btn" href="?<?php echo $_SERVER["QUERY_STRING"]; ?>&del_id=<?php echo $qr->id; ?>">Deletar</a></td></p>
</div>
<?php
    }
?>
