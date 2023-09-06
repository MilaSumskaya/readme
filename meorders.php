<?php
session_start();
$userid = $_SESSION['UserID'];
include 'template/head.php'; //использование шаблона head
include 'template/navklient.php'; //использование изменённого шаблона nav
include 'template/database.php'; ?>
<main>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-11 g-4">
        <table>
                <tr>
                    <th> Номер заказа </th> <th> Дата заказа </th> <th> Название товара </th>
                    <th> Адрес </th> <th> Дата получения </th> <th> Дата оплаты </th>
                    <th> Количество </th> <th> Цена </th> <th> Сумма заказа </th> <th> Статус заказа </th> <th> </th> <th> </th>
                </tr>
            <?php
            $sql = "SELECT ProductName, OrderDate, OrderDeliveryDate, ProductCost, ProductDiscountAmount, OrderStatus 
            FROM OrderProduct, Product, Orders WHERE OrderProduct.ProductArticleNumber=Product.ProductArticleNumber 
            AND OrderProduct.OrderID=Orders.OrderID AND UserID=$userid"; 
            $result = $connection->query($sql);
            foreach($result as $row)
            {
                echo "<tr>
                <td> $row[ProductName] </td> <td> $row[OrderDate] </td> <td> $row[OrderDeliveryDate] </td>
                <td> $row[ProductCost] </td> <td> $row[ProductDiscountAmount] </td> <td> $row[OrderStatus] </td>
                </tr>";
            }
            ?>
            </table>
        </div>
    </div>
</main>
</body><br>
<?php include 'template/footer.php';?>
