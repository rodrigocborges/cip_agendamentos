<h1> Visualizando agendamentos</h1>
<p><a href="?">Voltar</a></p>
<table>
<tr>
    <th>Local</th>
    <th>Data</th>
    <th>Horário inicio</th>
    <th>Horário fim</th>
    <th>Professor</th>
    <th>Ação</th>
</tr>
<?php
    $pdo = new Connection("localhost", "cip", "root", "");
    $conn = $pdo->getConnection();
    $select = $conn->prepare("SELECT * FROM diary ORDER BY id DESC");
    $select->execute();
    while($qr = $select->fetch(PDO::FETCH_OBJ)){
?>
<tr>
<td><?php if($qr->type == 0) { echo "Laboratório"; } else { echo "Sala de reunião"; }?></td>
<td><?php echo date("d/m/Y", strtotime($qr->date)); ?></td>
<td><?php echo $qr->start; ?></td>
<td><?php echo $qr->end; ?></td>
<td><?php echo $qr->teacher; ?></td>
<td><a href="?<?php echo $_SERVER["QUERY_STRING"]; ?>&del_id=<?php echo $qr->id; ?>">Deletar</a></td>
</tr>
<?php
    }
?>
</table>
