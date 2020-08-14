<?php

require('database.php');
require('query.php');

//クエリマネージャーの生成
$queryManager = queryManager::getInstance();

//文字列が最小、最大値範囲内かどうか
function checkStrLen(string $in, int $minimum, int $maximum):string
{
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

function checkConflict(string $name):bool{
    global $queryManager, $pdo;

    try{
        $queryManager->setQuery("SELECT * FROM account WHERE UserName = '$name'");
        $stmt = $pdo->query($queryManager->getQuery());
        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //競合するかチェックする
        //TRUE:競合しない
        //FALSE:競合する
        return empty($response);
    }catch(PDOException $e){
        var_dump($e);
    }
}

function registAccount(){
    global $queryManager, $pdo;

    try{
        //POSTされた情報を扱いやすい変数に代入
        $userName = checkStrLen($_POST['userName'], 4, 32);
        $password = checkStrLen($_POST['password'], 8, 16);
    
        if($userName == null || $password == null){
    
            throw new Exception('ユーザ名、またはパスワードが設定されていません');
    
        }else{
            //クエリをセット
            //INSERT INTO account VALUE(1, '$userName', '$password', current_timestamp())
            if(checkConflict($userName)){
                $queryManager->setQuery("INSERT INTO account VALUE(3, :user, :pass, current_timestamp())");
            }else{
                throw new Exception('ユーザー名が重複しています');
            }
        }
        
    }catch(Exception $e){
        echo '例外がスローされました:'. $e->getMessage().'\n';
    }
    
    $stmt = $pdo->prepare($queryManager->getQuery());
    $stmt->bindValue(':user', $userName);
    $stmt->bindValue(':pass', $password);
    $stmt->execute();
}

registAccount();

?>
