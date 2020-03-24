<?php
// create a db named practicedb
$pdo = new PDO('sqlite:practicedb.db');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//// create a table foo if not exist and add a text attrubute bar
// $pdo->exec("CREATE TABLE IF NOT EXISTS foo (bar TEXT)");
// $stmt = $pdo->prepare($insert);
// $stmt->bindValue(':foo', '1');
// $stmt->execute();

$sql = 'select * from foo where bar = :bar';
// $argv[1]=="insert"?"INSERT":($argv[1]=="search"?"SEARCH":"")
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':foo', '1');
$stmt->execute();

$result = $stmt->fetchAll();
foreach ($result as $key => $row) {
    echo $key.':foo='.$row['bar']."\n";
}
