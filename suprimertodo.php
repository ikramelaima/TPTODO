<?php
echo $_GET['id'];
if (isset($_GET['id'])) {
    $json = file_get_contents('data.json');
    $data = json_decode($json, true);
    $todo = array();
    array_pop($data);
    $todo = json_encode($data);
    file_put_contents('data.json', $todo);
    header("location: index.php");
}
?>