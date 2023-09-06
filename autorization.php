<?php
include 'template/head.php'; //использование шаблона head
include 'template/nav.php'; //использование изменённого шаблона nav
include 'template/database.php';
if(!empty($_POST['UserPassword']) && !empty($_POST['UserLogin']))
{
    session_start();
    //пишем логин и пароль из формы в переменные для удобства работы:
    $userlogin = $_POST['UserLogin'];
    $userpassword = $_POST['UserPassword'];
    $sql = "SELECT * FROM user WHERE UserLogin='$userlogin' AND UserPassword='$userpassword'";
    $result = $connection->query($sql);
    $user = mysqli_fetch_assoc($result);
    if(!empty($user))
    {
    session_start();
    $_SESSION['UserRole'] = $user['UserRole'];
    $_SESSION['UserID'] = $user['UserID'];
    $_SESSION['UserLogin'] = $user['UserLogin'];  
    header("Location: index.php");
    }
}
?>
<main>
    <div class="container mb-5">
        <div class="row">
        <div class = "col-1"></div>
            <div class = "col-10">
            <form action = "autorization.php" method = "POST">
                <div class = "form-group mb-2 col-4">
                <input type = "text" class = "form-control" placeholder = "Введите логин" name = "UserLogin">
            </div>
            <div class = "form-group mb-2 col-4">
                <input type = "password" class = "form-control" placeholder = "Введите пароль" name = "UserPassword">
            </div>
            <div class = "form-group mb-2 col-4">
                <button type = "submit" class = "btn btn-primary" name = "submit" value = "1">Войти</button>
                      <a class="nav-link" href="gost.php">Зайти гостем</a>
            </div>          
            </div>
            <div class = "col-1"></div>            
        </div>
    </div>
</main>
<?php include 'template/footer.php'; ?> <!--использование изменённого шаблона footer -->