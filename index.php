<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
    <h1>Simple Factory</h1>
<body>

<?php

$products = array(
        array(
            'id'    =>1,
            'model' =>'LOGITECH KB10', // продукт 1
            'price' =>'135.67',
            'type'  =>'keyboard'        // продукт 2
        ),
        array(
            'id'    =>2,
            'model' =>'A4TECH X56',
            'price' =>'546.90',
            'type'  =>'mouse'
        )
);

$productsFactory =new ProductFactory();
$cart =array();
foreach ($products as $product) {   // для каждого продукта вызываем метод make
    $cart[] = $productsFactory->make($product); // передав отдельные массивы в метод make
}
echo "<pre>";
var_dump($cart);
echo "</pre>";

?>

</body>
</html>


