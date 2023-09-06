<?php
session_start();
$userid = $_SESSION['UserID'];
include 'template/head.php'; //использование шаблона head
include 'template/navmanager.php'; //использование изменённого шаблона nav
include 'template/database.php'; ?>
<main>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-11 g-4">
        <table>
                <tr>
                    <th> Нанименование продукта </th> <th> Дата заказа </th> <th> Дата доставки </th>
                    <th> Общая сумма заказа </th> <th> Общий размер скидки заказа </th> <th> ФИО клента </th>
                </tr>
            <?php
            $sql = "SELECT ProductName, OrderDate, OrderDeliveryDate, (ProductCost*AmountOrder) AS SumOrder, 
            (ProductDiscountAmount) AS SelectDiscount, CONCAT(UserSurname, ' ', UserName, ' ', UserPatronymic) AS FIO
            FROM Product, Orders, OrderProduct, User WHERE 
            OrderProduct.ProductArticleNumber=Product.ProductArticleNumber AND OrderProduct.OrderID=Orders.OrderID
            AND Orders.UserID=User.UserID"; 
            $result = $connection->query($sql);
            foreach($result as $row)
            {
                echo "<tr>
                <td> $row[ProductName] </td> <td> $row[OrderDate] </td> <td> $row[OrderDeliveryDate] </td>
                <td> $row[SumOrder] </td> <td> $row[SelectDiscount] </td> <td> $row[FIO] </td>  
                <td><a href='orders.php?id_order=$row[id_order]'><button type='submit' class='btn btn-primary'>Отправить</button></a></td>
                
                </tr>";
            }
            ?>
            </table>
        </div>
    </div>
</main>
</body><br>
<?php include 'template/footer.php';?>
