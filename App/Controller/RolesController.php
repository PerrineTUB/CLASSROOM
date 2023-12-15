<?php

namespace App\Controller;

use App\Manager\ManagerRoles;

class RolesController extends ManagerRoles {

  public function addRole() {
    header('Access-Control-Allow-Origin: *, Content-Type : application/json');
    $json = file_get_contents("php://input");
    $code = 200;
    $message = "";
    if ($json) {
      $data = json_decode($json, true);
      $this->setNom($data["nom"]);
      $this->create();
      http_response_code($code);
      $message = ["Ok" => "Le rôle a bien ete ajoute en BDD"];
    } else {
      $code = 400;
      $message = ["Error" => "Le JSON est invalide"];
    }
  }

  public function findRoleById() {
    header('Access-Control-Allow-Origin: *, Content-Type : application/json');
    $code = 200;
    $message = "";
    if (isset($_GET["id"]) and !empty($_GET["id"])) {
      $data = $this->find($_GET["id"]);
      if ($data) {
        $message = $data;
      } else {
        $message = ['error' => 'Le role n\'existe pas en BDD'];
        $code = 400;
      }
    } else {
      $message = ['error' => 'param id vide'];
      $code = 400;
    }
    http_response_code($code);
    echo mb_convert_encoding(json_encode($message), "UTF-8", "UTF-8");
  }

  public function findAllRole() {
    header('Access-Control-Allow-Origin: *, Content-Type : application/json');
    $code = 200;
    $message = "";

    $data = $this->findAll();
    if ($data) {
      $message = $data;
    } else {
      $message = ['error' => 'Le role n\'existe pas en BDD'];
      $code = 400;
    }
    http_response_code($code);
    echo mb_convert_encoding(json_encode($message, true), "UTF-8", "UTF-8");
  }

  public function updateRole() {
    header('Access-Control-Allow-Origin: *, Content-Type : application/json');
    $json = file_get_contents("php://input");
    $code = 200;
    $message = "";
    if ($json) {
      $data = json_decode($json, true);
      $id = $data["id"];
      $this->setNom($data["nom"]);
      $this->update($id);
      $message = ['ok' => 'Le Role a ete mis a jour en BDD'];
    } else {
      $code = 400;
      $message = ["error" => "le Json est invalide"];
    }
    http_response_code($code);
    echo mb_convert_encoding(json_encode($message), "UTF-8", "UTF-8");
  }

  public function deleteRole() {
  }
}
