<?php
function show($pdo, $keyword = null)
{
    $stmt;
    if ($keyword) {
        $stmt = $pdo->prepare("select * from foo where bar = :bar");
        $stmt->bindValue(':bar', $keyword);
        $stmt->execute();
    } else {
        $stmt = $pdo->prepare("select * from foo");
        $stmt->execute();
    }

    $result = $stmt->fetchAll();
    foreach ($result as $key => $row) {
        echo $key.':foo='.$row['bar']."\n";
    }
}


// create a db named practicedb
$pdo = new PDO('sqlite:practicedb.db');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->exec("CREATE TABLE IF NOT EXISTS foo (bar TEXT)");

switch ($argv[1]) {
case 'insert':
    $stmt = $pdo->prepare("INSERT INTO foo (bar) VALUES (:bar)");
    $stmt->bindValue(':bar', $argv[2]);
    $stmt->execute();
    show($pdo);
    break;
case 'search':
    show($pdo, $argv[2]);
}





//// create a table foo if not exist and add a text attrubute bar
// 
// $stmt = $pdo->prepare($insert);
// $stmt->bindValue(':foo', '1');
// $stmt->execute();

// $sql = 'select * from foo where bar = :bar';
// // $argv[1]=="insert"?"INSERT":($argv[1]=="search"?"SEARCH":"")
// $stmt = $pdo->prepare($sql);
// $stmt->bindValue(':foo', '1');
// $stmt->execute();


