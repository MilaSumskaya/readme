<?php
include 'template/head.php'; //использование шаблона head
include 'template/nav.php'; //использование изменённого шаблона nav
include 'template/database.php';
if(!empty($_POST)) // если массив POST непустой, то добавить запись в базу
    {
        $userlogin = $_POST['UserLogin'];
        $userpassword = $_POST['UserPassword'];
        $usersurname = $_POST['UserSurname'];
        $username = $_POST['UserName'];
        $userpatronymic = $_POST['UserPatronymic'];
        $sql = "INSERT INTO user(UserSurname, UserName, UserPatronymic, UserRole, UserLogin, UserPassword, id_punct) 
        VALUES 
        ('$usersurname', '$username', '$userpatronymic', 1 ,'$userlogin','$userpassword')";
        $result = $connection->query($sql);
        $user = mysqli_fetch_assoc($result);
        header("Location: index.php");
    }

?>
<main>
    <div class="container mb-5">
        <div class="row">
        <div class = "col-1"></div>
            <div class = "col-10">
            <form action = "" method = "POST">
                <div class = "form-group mb-2 col-4">
                <input type = "text" class = "form-control" placeholder = "Фамилия" name = "UserSurname">
                </div>
                <div class = "form-group mb-2 col-4">
                <input type = "text" class = "form-control" placeholder = "Имя" name = "UserName">
                </div>
                <div class = "form-group mb-2 col-4">
                <input type = "text" class = "form-control" placeholder = "Отчество" name = "UserPatronymic">
                </div>
                <div class = "form-group mb-2 col-4">
                <input type = "text" class = "form-control" placeholder = "Логин" name = "UserLogin">
            </div>
            <div class = "form-group mb-2 col-4">
                <input type = "password" class = "form-control" placeholder = "Пароль" name = "UserPassword">
            </div>
            <div class = "form-group mb-2 col-4">
                <input type = "password" class = "form-control" placeholder = "Подтверждение пароля" name = "UserPassword2">
            </div>
            <div class = "form-group mb-2 col-4">
                <button type = "submit" class = "btn btn-primary" name = "submit" value = "1">Зарегистрироваться</button>
            </div>            
            </div>
            <div class = "col-1"></div>            
        </div>
    </div>
</main>
<?php include 'template/footer.php'; ?> <!--использование изменённого шаблона footer -->