<?php
include 'template/head.php'; //использование шаблона head
session_start();
$userlogin  =  $_SESSION['UserLogin'];
//var_dump($_SESSION);
include 'template/navmanager.php'; //использование изменённого шаблона nav
include 'template/database.php'; ?>
    <main>
    <div class = "container mb-5">
            <div class = "row">
                <div class = "col-1"></div>
                <div class = "col-10">
                    <?php
                    echo 'Страница менеджера:'.$userlogin
                    ?>
                                <?php
                        $sql = "SELECT * FROM Product";
            $result = $connection->query($sql);
            
            foreach($result as $row)
            {
                echo "<div class='col'>
                    <div class='card h-100'>
                        <div class='card-body'>
                            <img src='img/$row[ProductPhoto]' class='card-img-top' alt='...'>
                            <p class='card-text'>$row[ProductName]</p>
                            <p class='card-text'>$row[ProductCost] руб.</p>
                            <p class='card-text'>$row[ProductDiscountAmount] %</p>
                        </div>
                    </div>
                </div>";
            }
            ?>
                </div>
                <div class = "col-1"></div>
            </div>
    </main>
</body>
<?php 
include 'template/footer.php'; ?>