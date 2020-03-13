<?php

    $host = 'localhost';
    $user = 'root';
    $password = 'root';
    $dbname = 'phpblog2';

//set DSN
$dsn = 'mysql:host=' . $host .'; dbname=' . $dbname;

//create a PDO instance
$pdo = new PDO($dsn, $user, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

//PDO QUERY

$stmt = $pdo->query("SELECT * FROM posts");

// while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//     echo $row['title'];
//     echo $row->title;
// }

// while($row = $stmt->fetch()) {
//     echo $row->title . '<br>';
// }

//unsafe
// $query = "SELECT * from posts WHERE author = '$author'";

$author = 'Telmo Sampaio';
$is_published = true;
$id = 4;
//positional params
$sql = 'SELECT * FROM posts WHERE author = ? && is_published = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$author, $is_published]);
$posts = $stmt->fetchAll();

foreach($posts as $post) {
    echo $post->title . '<br>';
    echo $post->body . '<br>';
}

//fetch single post
$sql = 'SELECT * FROM posts WHERE id = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$post = $stmt->fetch();

echo "<h1>This is the Post body</h1>
        <p>$post->body</p>";

// $title = 'Post Test';
// $body = 'This is the body of post test';
// $author = 'Telmo Sampaio';

//Insert Data
// $sql = 'INSERT into posts(title, body, author) VALUES(?, ?, ?)';
// $stmt = $pdo->prepare($sql);
// $stmt->execute([$title, $body, $author]);
// echo "post added";

// $body = "This is the updated body";
// $is_published;
// $id = 6;

//Update Data
// $sql = 'UPDATE posts SET body = ?, is_published = ? WHERE id = ?';
// $stmt = $pdo->prepare($sql);
// $stmt->execute([$body, $is_published, $id]);
// echo "post updated";

$id = 6;

//DELETE Data
$sql = 'DELETE FROM posts WHERE id = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
echo "post deleted";







