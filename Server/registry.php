<?php

require('database.php');
require('query.php');

//文字列が最小、最大値範囲内かどうか
function checkStrLen(string $in, int $minimum, int $maximum):string{
    try{
        $in_strlen = strlen($in);

        if($maximum < $minimum){
            throw new Exception('MIN値がMAX値よりも大きい');
        }
        
        if($in_strlen < $minimum){
            return false;
        }elseif($maximum < $in_strlen){
            return false;
        }else{
            return $in;
        }

    }catch(Exception $e){
        echo '例外がスローされました:'. $e->getMessage().'\n';
    }
}

try{
    //POSTされた情報を扱いやすい変数に代入
    $UserName = checkStrLen($_POST['userName'], 4, 32);
    $Password = checkStrLen($_POST['password'], 8, 16);

    if($UserName == null || $Password == null){
        echo $UserName;
        echo $Password;
        throw new Exception('ユーザ名、またはパスワードが設定されていません');
    }else{
        //クエリマネージャーの生成
        $QueryManager = QueryManager::getInstance();

        //クエリをセット
        $QueryManager->setQuery("INSERT INTO account VALUE(null, '$UserName', '$Password', current_timestamp())");
    }
    
}catch(Exception $e){
    echo '例外がスローされました:'. $e->getMessage().'\n';
}

try{
    $stmt = $pdo->prepare($QueryManager->getQuery());
    $stmt->execute();
    echo 'QUERY_ACCEPTED';
}catch(PDOException $e){
    echo 'QUERY_ERROR:'.$e;
}

?>
