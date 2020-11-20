<?php
/*
public : signifie que l'on pourra faire appelle à la méthode ou à la propriété
depuis l'extérieur du fichier
private: signifie que l'on ne pourra pas faire appelle à la méthode ou à la propriété
depuis l'extérieur du fichier, mais on pourra tout de même y faire appelle depuis la class courant
en utilisant *this-> (mais on n'y a pas acces depuis les class enfants)
protected: fonctionne comme private sauf que la méthode ou à la propriété
pourra être utilisé également par les enfants
*/
class Compteur {

    protected $fichier;
    const INCREMENT = 1;

    public function __construct(string $fichier)
    {
        $this->fichier = $fichier;
    }

    public function incrementer(): void
    {
        $compteur = 1;
        if (file_exists($this->fichier)) {
            // Si le fichier existe on incrémente
            $compteur = (int)file_get_contents($this->fichier);
            $compteur += static::INCREMENT;
        }
        file_put_contents($this->fichier, $compteur);
    }

    public function recuperer(): int
    {
        if (!file_exists($this->fichier)) {
            return 0;
        }
        return file_get_contents($this->fichier);
    }
}