<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>  
    <h1>상품 목록</h1>

    <?php 
        // $products = [
        //     ['id'=>1, 'name'=>'상품1', 'price' =>10000],
        //     ['id'=>2,'name'=>'상품2', 'price' =>20000],
        //     ['id'=>3,'name'=>'상품3', 'price' =>30000]
        // ]; //연관배열 -> DB 연결로 바꿀 것임 

        include 'db.php'; //import 비슷비슷
        $stmt = $pdo->query("SELECT * FROM products"); //프로덕트 싹! 다! 데리고 옴
        $products = $stmt -> fetchAll(PDO::FETCH_ASSOC); //결과를 배열로 가지고 옴 그래서 products[0] 이렇게 할 수 있두앙두앙

        //연관 배열 이차원배열 그대로 table에 넣은 것임  

        // foreach ($products as $product) {
        //     echo "<div>";
        //     echo "<h2>".$product['name']."</h2>";
        //     echo "<p>가격:".$product['price']."원</p>";
        //     echo "<a href='page/product.php?id=".$product['id']."'>상세보기</a>";
        //     echo "</div>";

        // } -> 이것 지워야함! 

        
    ?>

    <?php if(count($products) === 0) : ?>
        <p>등록된 상품이 없습니다.</p>
    <?php else :  ?>
       <?php foreach($products as $product) :  ?>
        <!-- 받아온 배열을 foreach에서 출력한 것임 -->
        <h2><?= htmlspecialchars($product['name']) ?></h2>
        <p>가격 : <?= htmlspecialchars($product['price']) ?>원</p>
        <a href="page/product.php?id=<?=$product['id']?>">상세보기</a>
    <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>