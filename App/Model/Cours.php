<?php

namespace App\Model;

use App\Utils\BddConnect;
use App\Model\Utilisateur;

class Cours extends BddConnect {

  //attributs
  private int $id;
  private string $nom;
  private string $contenu;
  private string $dateDebut;
  private string $dateFin;
  private Utilisateurs $idUtilisateur;

  public function __construct() {
    $this->idUtilisateur = new Utilisateurs();
  }

  //fonctions
  //getter
  public function getId(): int {
    return $this->id;
  }

  public function getNom(): string {
    return $this->nom;
  }

  public function getContenu(): string {
    return $this->contenu;
  }

  public function getDateDebut(): string {
    return $this->dateDebut;
  }

  public function getDateFin(): string {
    return $this->dateFin;
  }

  public function getIdUtilisateur(): Utilisateurs {
    return $this->idUtilisateur;
  }

  //setter
  public function setId(int $id): self {
    $this->id = $id;
    return $this;
  }

  public function setNom(string $nom): self {
    $this->nom = $nom;
    return $this;
  }
  public function setContenu(string $content): self {
    $this->contenu = $content;
    return $this;
  }

  public function setMail(string $dateStart): self {
    $this->dateDebut = $dateStart;
    return $this;
  }

  public function setMdp(string $dateEnd): self {
    $this->dateFin = $dateEnd;
    return $this;
  }
  public function setRole(Utilisateurs $idUser): self {
    $this->idUtilisateur = $idUser;
    return $this;
  }
}
