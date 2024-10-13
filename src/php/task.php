<?php
    session_start();

    if (!isset($_SESSION['tasks']) || !is_array($_SESSION['tasks'])) {
        $_SESSION['tasks'] = [];
    }

    if (isset($_POST['task_name'])) {

        if ($_POST['task_name'] != "") {
            
            $file_name = null;

            if (isset($_FILES['task_image']) && $_FILES['task_image']['error'] == 0) {
                $ext = strtolower(substr($_FILES['task_image']['name'], -4)); 
                $file_name = md5(date("Y.m.d.H.i.s")) . $ext; 
                $dir = 'uploads/'; 

                move_uploaded_file($_FILES['task_image']['tmp_name'], $dir . $file_name);
            }

            $data = [
                "task_name" => $_POST["task_name"],
                "task_description" => $_POST['task_description'],
                "task_date" => $_POST['task_date'],
                "task_image" => $file_name
            ];


            $_SESSION['tasks'][] = $data; 

            
            unset($_POST['task_name']);
            unset($_POST['task_description']);
            unset($_POST['task_date']);

            
            header('Location: ../../index.php');
            exit;
        } else {
        
            $_SESSION['message'] = 'O campo nome da tarefa não pode ser vazio!';
            header('Location: ../../index.php');
            exit;
        }
    }

    if (isset($_GET['key'])) {

        array_splice($_SESSION['tasks'], $_GET['key'], 1);

        header('Location: ../src/index.php');
        exit;
    }
?>
