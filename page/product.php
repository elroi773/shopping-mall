<?php
        // session_start();
        // $products = [
        //     ['id'=>1, 'name'=>'상품1', 'price' =>10000, 'description' =>'상품의 1 상세설명'],
        //     ['id'=>2,'name'=>'상품2', 'price' =>20000,  'description' =>'상품의 2 상세설명'],
        //     ['id'=>3,'name'=>'상품3', 'price' =>30000,  'description' =>'상품의 3 상세설명']
        // ]; //연관배열

        //  //id 파라미터가 전달 되었는가?
        //  //url 에서 포함된 id 파라미터에서 가지고 옴 

        // if(isset($_GET['id'])){
        //     $product_id = $_GET['id'];
        //     $product = null;

        //     //상품 id에 맞는 상품 찾기
        //     foreach($products as $p){
        //         if($p['id'] == $product_id){
        //             $product = $p;
        //             break;
        //         }
        //     }

        //     //상품이 존재하면
        //     if($product){
        //         echo "<h1>".htmlspecialchars($product['name'])."</h1>";
        //         echo "<p>가격:".htmlspecialchars($product['price'])."원</p>";
        //         echo "<p>상세 설명:" .htmlspecialchars($product['description'])."</p>";
        //     }else{
        //         echo "<p>상품을 찾을 수 없습니다.</p>";
        //     }
        // }
        // else {echo "<p> 상품 id가 전달되지 않았습니다.</p>";
        // } -> 다 지우셈

        include '../db.php';
        if(isset($_GET['id'])){
            // URL 에서 파라미터를 받아오는 것임 url 의 id 를 받는 것임 id 가 잘 오면 
            //product id 에 저장 되는 것임 
            $product_id = $_GET['id'];
            $product = null;

            //상품 id 에 맞게 상품을 찾아야 함 
            //상품 조회 php data object pdo 

            $stmt = $pdo->prepare("SELECT * FROM products WHERE id = :id"); //쿼리문을 컴파일 하는 것임 미리 준비 하는 단계  :id 는 해킹 되는거 막을려고 하는것임 좀 더 알아보기 쿼리 구조만 미리 준비 함 
            $stmt -> bindParam(':id',$product_id, PDO::PARAM_INT); //준비한 쿼리의 아이디 자리의 프로덕트 아이디 값 넣은 것임 int 는 정수형인것을 명시 (상품 id int) 
            $stmt -> execute(); //쿼리를 실행 시키는게 execute id 가 3일때, 실행 ---> ( 이레 : 이게 맞는지 지피티 확인 할 것 )

            $product = $stmt -> fetch(PDO::FETCH_ASSOC);

            if($product){
                echo "<h1>".htmlspecialchars($product['name'])."</h2>";
                echo "<p>가격".htmlspecialchars($product['price'])."원 </p>";
                echo "<p> 상세 설명 : ".htmlspecialchars($product['description'])."</p>";
            } else{ 
                echo "<p> 상품을 찾을 수 없습니다 </p>";
            }
        }else{
            echo "<p> 상품 id 가 전달되지 않았습니다 </p>";
        }
?>
