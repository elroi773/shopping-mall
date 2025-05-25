<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> 상품 목록 </h1>
    <?php
        include 'db.php'; // db 파일을 불러옴 import 는 다른 언어를 불러오는것이라 다른 것임!
        $stmt=$pdo->query("SELECT * FROM products"); //product 싹 ! 다 ! 데리고 옴! 
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC); // 결과를 배열로 가지고 옴 그래서 products[0] 이렇게 불러 올 수 있다 
        //연관 배열 이차원 배열 그대로 table 에 넣은 것임 

    ?>

    <?php if(count($products)===0): ?>
        <!-- 불러온 배열의 내용이 비어있는지 아닌지 확인 -->
        <p>등록된 상품이 없습니다.</p>
        <!-- 없으면 상품이 없는것! -->
    <?php else: ?>
        <?php foreach($products as $product): ?>
            <!-- 받아온 배열을 foreach 에서 출력한 것임  -->
            <h2><?= htmlspecialchars($product['name']) ?></h2>
            <!-- 출력문 -->
            <p>가격 :<?= htmlspecialchars($product['price']) ?>원</p>
            <!-- 가격 출력문 htmlspecialchars = PHP에서 보안상 정말 중요한 함수 -->
            <a href="pages/products.php?id=<?=$product['id']?>">상세보기</a>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html> 