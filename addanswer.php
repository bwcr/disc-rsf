<?php
if(isset($_POST)){
    require_once('connection.php');
    $title = $_POST['title'];
    $list1 = $_POST['list1'];
    $list2 = $_POST['list2'];
    $list3 = $_POST['list3'];
    $list4 = $_POST['list4'];
    $list5 = $_POST['list5'];
    $list6 = $_POST['list6'];
    $list7 = $_POST['list7'];
    $list8 = $_POST['list8'];
    $list9 = $_POST['list9'];
    $list10 = $_POST['list10'];
    $list11 = $_POST['list11'];
    $list12 = $_POST['list12'];
    $jobs = $_POST['jobs'];
    $paragraph = $_POST['paragraph'];

    $insert = $koneksi->query("INSERT INTO `results` (`title`, `list1`, `list2`, `list3`, `list4`, `list5`, `list6`, `list7`, `list8`, `list9`, `list10`, `list11`, `list12`, `jobs`, `paragraph`) VALUES ('$title', '$list1', '$list2', '$list3', '$list4', '$list5', '$list6', '$list7', '$list8', '$list9', '$list10', '$list11', '$list12', '$jobs', '$paragraph')");
}

?>