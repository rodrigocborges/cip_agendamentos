<form action="" method="POST" enctype="multipart/form-data">

    <input type="date" name="date" required>
    <input type="text" name="start" placeholder="Horário de início" required>
    <input type="text" name="end" placeholder="Horário de término" required>
    <input type="text" name="teacher" placeholder="Nome do professor/servidor" required>
    <select name="type">
        <option value="0">Laboratório</option>
        <option value="0">Sala de reunião</option>
    </select>
    <input type="submit" name="submit" value="Inserir">

</form>


<?php
    $pdo = new Connection("localhost", "cip", "root", "");
    $conn = $pdo->getConnection();
    if(isset($_POST["submit"])){
        $insert = $conn->prepare("INSERT INTO diary (type, date, start, end, teacher) VALUES (?, ?, ?, ?, ?)");
        $insert->bindParam(1, $_POST["type"], PDO::PARAM_INT);
        $insert->bindParam(2, $_POST["date"], PDO::PARAM_STR);
        $insert->bindParam(3, $_POST["start"], PDO::PARAM_STR);
        $insert->bindParam(4, $_POST["end"], PDO::PARAM_STR);
        $insert->bindParam(5, $_POST["teacher"], PDO::PARAM_STR);      
        $insert->execute(); 
    }

?>