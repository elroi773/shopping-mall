<?php

    $host = 'localhost'; //원격 db 면 db ip 주소를 써야 함 
    $user = 'root';
    $password = 'Mysql4344!';
    $dbname = 'PHP'; // db 이름 

    try{
        $pdo = new PDO("mysql:host=$host;dbname=$dbname",$user,$password); //이 부분이 실제로 db 연결 하는 부분임 
        //우리가 새로운 pdo 객체를 만들어서 변수에 저장 함  
        
        //에러 모드 설정 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //에러가 나며는 예외로 던져라 ! 그럼 캐치가 잡음 그러면 에러메세지를 정확하게 알 수 있음! 디버깅할떄 좋음 
    }catch(PDOException $e){ //pdo db 연결 에러만 잡을것.임 
        die("데이터베이스 연결 실패.... 죽으세용.".$e->getMessage()); //구체적인 에러도 볼 수 있게끔 함 
    }

?> 