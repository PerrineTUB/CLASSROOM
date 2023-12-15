<?php

namespace App\Model;

use App\Utils\BddConnect;

class Roles extends BddConnect {

  private int $id;
  private string $non;

  public function getId(): int {
    return $this->id;
  }

  public function getNom(): string {
    return $this->non;
  }

  public function setId(int $id): self {
    $this->id = $id;
    return $this;
  }

  public function setNom(string $nom): self {
    $this->non = $nom;
    return $this;
  }
}
