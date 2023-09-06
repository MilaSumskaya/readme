<?php
include 'template/head.php'; //использование шаблона head
session_start();
$userlogin  =  $_SESSION['UserLogin'];
include 'template/navmanager.php'; //использование изменённого шаблона nav
include 'template/database.php'; ?>
<main>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-11 g-4">
        <?php
                    echo 'Страница менеджера:'.$userlogin
                    ?>
        <table>
                <tr>
                    <th> Номер товара </th><th> Название товара </th> <th> Цена </th> <th> Количество проданных </th> <th> Сумма </th> 
                </tr>
            <?php
            $sql = "SELECT Product.ProductArticleNumber, ProductName, ProductCost, AmountOrder AS Count, AmountOrder*ProductCost AS Sum FROM Product, OrderProduct WHERE OrderProduct.ProductArticleNumber=Product.ProductArticleNumber";
            $result = $connection->query($sql);
            foreach($result as $row)
            {
                echo "<tr>
                <td> $row[ProductArticleNumber] </td> <td> $row[ProductName] </td> <td> $row[ProductCost] </td>
                <td> $row[Count] </td> <td> $row[Sum]</td>
                </tr>";
            }
            ?>
            </table>
        </div>
    </div>
</main>
</body><br>
<?php include 'template/footer.php';?>