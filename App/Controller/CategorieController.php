<?php

namespace App\Controller;

use App\Manager\ManagerRoles;

class CategorieController extends ManagerRoles {

  public function addCategorie() {
    header('Access-Control-Allow-Origin: *, Content-Type : application/json');
    $json = file_get_contents("php://input");
    $code = 200;
    $message = "";
    if ($json) {
      $data = json_decode($json, true);
      $this->setNom($data["nom"]);
      $this->create();
      http_response_code($code);
      $message = ["Ok" => "La categorie a bien ete ajoute en BDD"];
    } else {
      $code = 400;
      $message = ["Error" => "Le JSON est invalide"];
    }
  }

  public function findCategorieById() {
    header('Access-Control-Allow-Origin: *, Content-Type : application/json');
    $code = 200;
    $message = "";
    if (isset($_GET["id"]) and !empty($_GET["id"])) {
      $data = $this->find($_GET["id"]);
      if ($data) {
        $message = $data;
      } else {
        $message = ['error' => 'La categorie n\'existe pas en BDD'];
        $code = 400;
      }
    } else {
      $message = ['error' => 'param id vide'];
      $code = 400;
    }
    http_response_code($code);
    echo mb_convert_encoding(json_encode($message), "UTF-8", "UTF-8");
  }

  public function findAllCategorie() {
    header('Access-Control-Allow-Origin: *, Content-Type : application/json');
    $code = 200;
    $message = "";

    $data = $this->findAll();
    if ($data) {
      $message = $data;
    } else {
      $message = ['error' => 'La categorie n\'existe pas en BDD'];
      $code = 400;
    }
    http_response_code($code);
    echo mb_convert_encoding(json_encode($message, true), "UTF-8", "UTF-8");
  }

  public function updateCategorie() {
    header('Access-Control-Allow-Origin: *, Content-Type : application/json');
    $json = file_get_contents("php://input");
    $code = 200;
    $message = "";
    if ($json) {
      $data = json_decode($json, true);
      $id = $data["id"];
      $this->setNom($data["nom"]);
      $this->update($id);
      $message = ['ok' => 'Le categorie a ete mis a jour en BDD'];
    } else {
      $code = 400;
      $message = ["error" => "le Json est invalide"];
    }
    http_response_code($code);
    echo mb_convert_encoding(json_encode($message), "UTF-8", "UTF-8");
  }

  public function deleteCategorie() {
  }
}
