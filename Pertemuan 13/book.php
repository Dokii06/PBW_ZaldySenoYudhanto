<?php
require_once "method.php";
$obj_book = new Book();
$request_method = $_SERVER["REQUEST_METHOD"];

switch ($request_method) {
    case 'GET':
        if (!empty($_GET["id"])) {
            $id = intval($_GET["id"]);
            $obj_book->get_book($id);
        } else {
            $obj_book->get_books();
        }
        break;

    case 'POST':
        if (!empty($_GET["id"])) {
            $id = intval($_GET["id"]);
            $obj_book->insert_book($id);
        } else {
            $obj_book->insert_book();
        }
        break;

    case 'DELETE':
        if (!empty($_GET["id"])) {
            $id = intval($_GET["id"]);
            $obj_book->delete_book($id);
        } else {
            $response = [
                'status' => 400,
                'message' => 'Bad Request: Missing ID'
            ];
            header("Content-Type: application/json");
            echo json_encode($response);
        }
        break;

        break;
        
    default:
        header("Content-Type: application/json");
        echo json_encode([
            'status' => 405,
            'message' => 'Method Not Allowed'
        ]);
        break;
}