<!-- 
    Autor: Rafał Kosowski

    Zawartoś pliku:
        To jest klasa Osoba. Definiuje ona pojedyńczą osobę  
 -->
<?php
  class Osoba{
    //właściwości
    public $id,$imie, $nazwisko, $numer,$email,$haslo;

    //konstruktor
    public function __construct($id,$imie, $nazwisko, $numer,$email) {
      $this->id=$id;
      $this->imie=$imie;
      $this->nazwisko=$nazwisko;
      $this->numer=$numer;
      $this->email=$email;
      
    }  
    //metoda odpowiedzialna za wyświetlenie właściciela auta na stronie z ogłoszeniem
    public function wyswietlOsobe()
    {
      echo(
        '<div id="czlowiek">
          <h3>Kontakt do właściciela</h3>
          <div id="nick">'.$this->imie.' '.$this->nazwisko.'</div> 
          <div id="numer">Telefon: <a href="tel:'.$this->numer.'">'.$this->numer.'</a></div> 
          <div id="email">E-mail: <a href="mailto:'.$this->email.'">'.$this->email.'</a></div> 
        </div>'
      );
    }
  }

?>
