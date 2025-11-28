<?php
require_once __DIR__ . "/../core/CurlClient.php";
require_once __DIR__ . "/../config/api_config.php";

class UsersController
{
    public function index()
    {
        $url = API_BASE_URL . "users/index.php";
        $response = CurlClient::request("GET", $url);
        $users = $response['data'] ?? [];

        // Lewat satu file index saja, modal akan digunakan untuk create/edit
        require __DIR__ . "/../views/users/index.php";
    }

    public function store($formData)
    {
        $url = API_BASE_URL . "users/create.php";
        CurlClient::request("POST", $url, $formData);

        // Redirect kembali ke index
        header("Location: web.php?action=index");
        exit;
    }

    public function update($formData, $id)
    {
        $url = API_BASE_URL . "users/update.php?id=" . $id;
        CurlClient::request("PUT", $url, $formData);

        header("Location: web.php?action=index");
        exit;
    }

    public function destroy($id)
    {
        $url = API_BASE_URL . "users/delete.php?id=" . $id;
        CurlClient::request("DELETE", $url);

        header("Location: web.php?action=index");
        exit;
    }
}
