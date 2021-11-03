<?php
include_once "controller/basecontroller.php";

class Notecontroller extends Basecontroller
{
    public function __construct()
    {
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
        } else {
            $action = "";
        }
        if ($action == "edit") {
            Notecontroller::edit();
        }
        if ($action == "") {
            Notecontroller::list();
        }
    }
    public static function edit()
    {
        $note=new note();
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = $_GET['id'];
            $noteEdit = $note->getNoteById($id);
            if ($noteEdit == false) {
                $notes = $note->shownote();
                if ($notes == false) {
                    header("Location: index.php?action=logout");
                }
                require_once('view/note.php');
            }
        } else {
            $notes = $note->shownote();
            if ($notes == false) {
                header("Location: index.php?action=logout");
            }
            require_once('view/note.php');
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $content = $_POST['content'];
            if ($content == "") {
                $alert = "<span class='error'>KHÔNG ĐƯỢC ĐỂ TRỐNG</span>";
                require_once('view/editnote.php');
                return;
            }
            $update_note = $note->update_note($content, $id);
            $notes = $note->shownote();
            if ($notes == false) {
                header("Location: index.php?action=logout");
            }
            header("Location: index.php?controller=note");      
        }
        require_once('view/editnote.php');
    }
    public static function list()
    {
        $note=new note();
        if (!isset($_SESSION['email']) && !isset($_COOKIE['email'])) {
            require_once("controller/logincontroller.php");
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addnote'])) {
            $content = $_POST['content'];
            if ($content == "") {
                echo "<script>alert ('KHÔNG ĐƯỢC ĐỂ TRỐNG')</script>";
                $notes = $note->shownote();
                require_once('view/note.php');
            }
            $notes = $note->insert_note($_POST);
            if ($notes == false) {
                header("Location: index.php?action=logout");
            }
        }
        if (isset($_GET['delId']) && is_numeric($_GET['delId'])) {
            $delid = $_GET['delId'];
            $notes = $note->del_note($delid);
            if ($notes == false) {
                header("Location: index.php?action=logout");
            }
        }
        $notes = $note->shownote();
        require_once('view/note.php');
    }
}

