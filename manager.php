<?php
session_start();
$login  =  $_SESSION['login'];
//var_dump($_SESSION);
?>
<?php include 'template/head.php'; 
?>
<body>
    <?php include 'template/navmanager.php'; ?>
    <main>
    <div class = "container mb-5">
            <div class = "row">
                <div class = "col-1"></div>
                <div class = "col-10">
                    <?php
                    echo 'Страница менеджера:'.$login
                    ?>
                </div>
                <div class = "col-1"></div>
            </div>
    </main>
</body>
<?php 


include 'template/footer.php'; ?>