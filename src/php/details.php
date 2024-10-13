<?php

    $data = $_SESSION['tasks'][$_GET['key']];

    include('../../index.php');
    include('./task.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="details-contatiner">
        <header>
            <h1><?php echo $data['task_name'];?></h1>
        </header>

        <div class="row">
            <div class="details">
                <dl>
                    <dt>Descrição da Tarefa:</dt>
                    <dd><?php echo $data['task_description'];?></dd>
                    <dt>Data de Tarefa:</dt> 
                    <dd><?php echo $data['task_date'];?></dd>
                </dl>
                
            </div>

            <div class="img">
                <img src="../uploads/<?php echo $data['task_image']?>" alt="Imagem">
            </div>

            <div class="footer">
                <p>Desenvolvido por @Jovêncio_Neto</p>
            </div>
        </div>
    </div>
</body>
</html>