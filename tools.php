<?php
if (isset($_POST['userid'])) {
    $message = array();
    $message['userid'] = $_POST['userid'];
    $message['todo'] = $_POST['todo'];
    $message['completed'] = $_POST['completed'];


    $json = file_get_contents('data.json');
    $data = json_decode($json, true);
    $data[] = $message;
    $json = json_encode($data);
    file_put_contents('data.json', $json);
    header("location: ./");
} elseif (isset($_GET['userid'])) {
    $json = file_get_contents('data.json');
    $data = json_decode($json, true);
    $todo = array();
    foreach ($data as $item) {
        if ($item['userid'] != $_GET['userid']) {
            $todo[] = $item;
        }
    }
    $todo = json_encode($todo);
    file_put_contents('data.json', $todo);
    header("location: index.php");
}
?>
