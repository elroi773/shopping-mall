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
        include 'db.php'; //import 비슷비슷 //DB 연결에 관련한 설정을 관련한 파일 MYSQL 연결 설정이 들어감 
        $stmt = $pdo->query("SELECT * FROM products"); //프로덕트 싹! 다! 데리고 옴
        //PDO 는 객체임 
        $products = $stmt -> fetchAll(PDO::FETCH_ASSOC); //결과를 배열로 가지고 옴 그래서 products[0] 이렇게 할 수 있두앙두앙
        //fetch all 를 연관 배열 현태로 넣는 명령어 pdo :: fetch _Assoc 칼럼명을 배열의 키 값으로 가지고 옴 

        //연관 배열 이차원배열 그대로 table에 넣은 것임  
        //products 에 들어가느건 상품 목록 id 는 뭐고 가격은 뭐고 암튼 그런거 
        
    ?>

    <?php if(count($products) === 0) : ?>
        <!-- 행 갯수를 세는 명령어  -->
        <p>등록된 상품이 없습니다.</p>
    <?php else :  ?>
       <?php foreach($products as $product) :  ?>
        <!-- 받아온 배열을 foreach에서 출력한 것임 -->
        <!-- 각각의 상품을 product 에 넣은 것임 product 는 상품의 이름을 나타냄  -->
        <h2><?= htmlspecialchars($product['name']) ?></h2>
        <p>가격 : <?= htmlspecialchars($product['price']) ?>원</p>
        <!-- htmlspecialchars 는 < > & 같은 html 엔 티티? 같은걸로 바꿔서 보안을 예방함  -->
        <a href="page/product.php?id=<?=$product['id']?>">상세보기</a>
        <!-- < ? =어쩌고 이 부분이 id 가 고유한 식별자가 되서 해당 상품을 구별할 수 있게 해줌 출력하는 것임  -->
    <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>