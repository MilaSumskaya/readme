<?php include 'template/head.php';
    session_start();
    $userrole = $_SESSION['UserRole'];
    $id_user = $_SESSION['UserID'];
    $usersurname  =  $_SESSION['UserSurname'];
$username  =  $_SESSION['UserName'];
$userpatronymic  =  $_SESSION['UserPatronymic'];
    if($userrole == "1")
    {
        header("Location: klient.php");
        exit;
    }
    if($userrole == "2")
    {
        header("Location: manager.php");
        exit;
    }
    else
    {
        $message = 'Неверный логин или пароль';
    }?>
<body>
    <?php include 'template/nav.php'; ?>
    <main>
    <div class="container mb-5">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    <h1>Экзаменационное задание Карпухина Даниила</h1>
                </div>
                <div class="col-1"></div>
            </div>
    </main>
</body>    
    <?php 
include 'template/footer.php'; ?>