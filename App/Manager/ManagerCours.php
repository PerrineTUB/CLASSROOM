<?php

namespace App\Manager;

use App\Manager\ManagerInterface;
use App\Model\Cours;

class ManagerCours extends Cours implements ManagerInterface {
  public function create() {
    $nom = $this->getNom();
    try {
      $req = $this->connexion()->prepare('INSERT INTO Cours (nom, contenu, date_debut, date_fin, id_utilisateur ) VALUE (?,?,?,?,?)');

      $req->bindParam(1, $nom, \PDO::PARAM_STR);
      $req->bindParam(2, $contenu, \PDO::PARAM_STR);
      $req->bindParam(3, $dateDebut, \PDO::PARAM_STR);
      $req->bindParam(4, $dateFin, \PDO::PARAM_STR);
      $req->bindParam(5, $idUtilisateur, \PDO::PARAM_STR);

      $req->execute();
    } catch (\Throwable $th) {
      die($th->getCode());
    }
  }

  public function find(int $id): Cours {
    try {
      $req = $this->connexion()->prepare('SELECT id, nom FROM roles WHERE id = (?)');
      $req->bindParam(1, $id, \PDO::PARAM_INT);
      $req->execute();
      return $req->fetch(\PDO::FETCH_ASSOC);
    } catch (\Throwable $th) {
      die($th->getCode());
    }
  }

  public function findAll(): array {
    try {
      $req = $this->connexion()->prepare('SELECT id, nom FROM roles');
      $req->execute();
      $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, Roles::class);
      return $req->fetchAll();
    } catch (\Throwable $th) {
      die($th->getCode());
    }
  }

  public function update(int $id) {
    $nom = $this->getNom();
    try {
      $req = $this->connexion()->prepare('UPDATE roles SET nom = (?) WHERE id = (?)');
      $req->bindParam(1, $nom, \PDO::PARAM_STR);
      $req->bindParam(2, $id, \PDO::PARAM_INT);
      $req->execute();
      $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, Roles::class);
      return $req->fetch();
    } catch (\Throwable $th) {
      die($th->getCode());
    }
  }
  public function delete(int $id): void {
  }
}
