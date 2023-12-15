<?php

namespace App\Manager;

use App\Manager\ManagerInterface;
use App\Model\Categorie;

class ManagerCategorie extends Categorie implements ManagerInterface {
  public function create() {
    $nom = $this->getNom();
    try {
      $req = $this->connexion()->prepare('INSERT INTO categorie(nom) VALUE (?)');
      $req->bindParam(1, $nom, \PDO::PARAM_STR);
      $req->execute();
    } catch (\Throwable $th) {
      die($th->getCode());
    }
  }

  public function find(int $id): Categorie {
    try {
      $req = $this->connexion()->prepare('SELECT id, nom FROM categorie WHERE id = (?)');
      $req->bindParam(1, $id, \PDO::PARAM_INT);
      $req->execute();
      return $req->fetch(\PDO::FETCH_ASSOC);
    } catch (\Throwable $th) {
      die($th->getCode());
    }
  }

  public function findAll(): array {
    try {
      $req = $this->connexion()->prepare('SELECT id, nom FROM categorie');
      $req->execute();
      $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, Categorie::class);
      return $req->fetchAll();
    } catch (\Throwable $th) {
      die($th->getCode());
    }
  }

  public function update(int $id) {
    $nom = $this->getNom();
    try {
      $req = $this->connexion()->prepare('UPDATE categorie SET nom = (?) WHERE id = (?)');
      $req->bindParam(1, $nom, \PDO::PARAM_STR);
      $req->bindParam(2, $id, \PDO::PARAM_INT);
      $req->execute();
      $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, Categorie::class);
      return $req->fetch();
    } catch (\Throwable $th) {
      die($th->getCode());
    }
  }
  public function delete(int $id): void {
  }
}
