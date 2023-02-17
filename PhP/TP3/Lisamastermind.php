<?php
  class Lisamastermind{
    protected int $taille;
    protected String $secret;
    protected array $tentatives;
    protected int $nbTentatives=0;

    public function __construct($taille){
      $this->taille=$taille;
      $this->tentatives=[];
      $this->secret="";
      $car='0123456789';
      for($i=0;$i<$taille;$i++){$this->secret.=$car[rand(0,9)];}
    }
    public function getTaille(){return $this->taille;}
    public function getSecret(){return $this->secret;}
    public function getTentatives(){return $this->tentatives;}
    public function getNbTentatives(){return $this->nbTentatives;}

    public function test($essai) {
      $this->tentatives[$nbTentatives]=$essai;
      $this->nbTentatives++;
      $malPlace=0;
      $bienPlace=0;
      for($i=0;$i<$this->taille;$i++){
        if ($essai[$i]==$this->secret[$i]) {$bienPlace++;}
        else {
          for($j=0;$j<$this->taille;$j++){
            if($essai[$i]==$this->secret[$j]) {$malPlace++;}
          }
        }
      }
      $resultat= [$essai,$bienPlace,$malPlace];
      return $resultat;
    }
  }
?>