<?php 
    try{
        require_once("../connectcd102g1.php");
         
        if(isset($_REQUEST['chlevel'])){
            
            $chglevel =$_REQUEST['chlevel'];
            $chgmemNo =$_REQUEST['chmemNo'];
            $sql2 = "UPDATE  member set memLevel = :uplevel where memNo = :upmemNo";
            $upbot = $pdo->prepare($sql2);
            $upbot->bindParam(':upmemNo',$chgmemNo);
            $upbot->bindParam(':uplevel', $chglevel);
            $upbot->execute();
        }
        if(isset($_REQUEST['searchmemId'])){
            $searchmemId = $_REQUEST['searchmemId'];
            $sql = "select * from member where memNo like ?";
            $bot = $pdo->prepare($sql);
            $bot->execute(array("%$searchmemId%"));
            $bots=$bot->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $sql = "select * from member";
            $bot = $pdo->query($sql);
            $bots=$bot->fetchAll(PDO::FETCH_ASSOC);
        }
        echo '<div class="Tr">
                        <div class="col">會員編號</div>
                        <div class="col">姓名</div>
                        <div class="col col-num">帳號</div>
                        <div class="col col-num">密碼</div>
                        <div class="col col-num">性別</div>
                        <div class="col">出生年月</div>
                        <div class="col">註冊日期</div>
                        <div class="col col-num">電話</div>
                        <div class="col col-big">信箱</div>
                        <div class="col col-num">權限</div>
                        <div class="col col-big">會員圖片</div>
                    </div>';
        
        foreach($bots as $data){
            if($data['memSex']==0){
                $data['memSex']='男';
            }else{
                $data['memSex']='女';
            }
            echo '<div class="Tr">';
            echo '<div class="col">',$data['memNo'],'</div>';
            echo '<div class="col">',$data['memName'],'</div>';
            echo '<div class="col col-num">',$data['memId'],'</div>';
            echo '<div class="col col-num">',$data['memPsw'],'</div>';
            echo '<div class="col col-num">',$data['memSex'],'</div>';
            echo '<div class="col">',$data['memBir'],'</div>';
            echo '<div class="col">',$data['memRegDate'],'</div>';
            echo '<div class="col">',$data['memTel'],'</div>';
            echo '<div class="col col-num">',$data['memEmail'],'</div>';
            echo '<div class="col col-num"><select class="chLevel">';
            if($data['memLevel']==0){
                echo '<option value="0">活耀</option><option value="1">停權</option>';
            }else{
                echo '<option value="1">停權</option><option value="0">活耀</option>';
            }
            echo '</select></div>';
            echo '<div class="col"><img src="../images/',$data['memImg'],'"></div>';
            echo '</div>';
            
		}
    }catch(PDOException $e){
	    echo "錯誤原因 : " , $e->getMessage(), "<br>";
	    echo "錯誤行號 : " , $e->getLine(), "<br>";
    }
?>