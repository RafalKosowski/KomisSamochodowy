<!-- 
    Autor: Rafał Kosowski

    Zawartoś pliku:
        To jest klasa Samochod. Definiuje ona pojedyńczy samochód  
 -->
<?php
class Samochod{
    // właściwości obiektów
    public $id,$nazwa,$marka,$model,$paliwo,$rok,$przebieg,$pojemnosc,$moc,$skrzynia,$cena,$opis,$osobaId;
     
    // Konstruktor
    function __construct($id,$nazwa,$marka,$model,$paliwo,$rok,$przebieg,$pojemnosc,$moc,$skrzynia,$cena,$opis,$osobaId)
    {
        $this->id=$id;
        $this->nazwa =$nazwa;
        $this->marka = $marka;
        $this->model =$model;
        $this->paliwo = $paliwo; 
        $this->rok = $rok;
        $this->przebieg=$przebieg;
        $this->pojemnosc=$pojemnosc;
        $this->moc=$moc;
        $this->skrzynia=$skrzynia;
        $this->cena = $cena;
        $this->opis =$opis;
        $this->osoba=$osobaId;
    }
    
    // metoda odpowiadająca za wyświetlanie auta na stronie głównej i stronie z moimi autami
    public function pokazAutoMini(bool $czyMoje)
    {
       //ustawienie odpowiedniego katalogu
        if ($czyMoje) {
            $katalog = './../auta/'.$this->id;
        }else
        {
            $katalog = './auta/'.$this->id;
        }
       
        @ $pliki = scandir($katalog,1);
       echo(
            
        '<a href="/projekt/page/carPage.php?id='.$this->id.'">
         <div class="auto" >
                <div class="img">
                    <img src="'.$katalog.'/'.$pliki[0].'" />
                </div>
              
                <div class="tytul">
                    '.$this->nazwa.'
                </div>
              
                <div class="model">
                    '.$this->marka.' '.$this->model.'   
                </div>
                
                <div class="cena">
                '.$this->cena.' zł
                </div>
               
                <div class="dane">
                    <span>
                    '.$this->rok.'
                    </span>
                    <span>
                    '.$this->przebieg.'km
                    </span>
                    <span>
                    '.$this->pojemnosc.'cm3
                    </span>
                    <span>
                    '.$this->paliwo.'
                    </span>
                </div>');
                if ($czyMoje) {
                    echo('<button><a href="./../app/removeCar.php?id='.$this->id.'">Usuń ogłoszenie</a></button>');
                }
        echo('</div>
            </a>'
        
        );
        
    }
    // metoda odpowiadająca za wyświetlanie auta na stronie ogłoszenia
    public function wyswietlAuto()
    {
        $katalog = '../auta/'.$this->id;
        $pliki = scandir($katalog);
            echo('<div id="foto">' );
            foreach($pliki as $plik){
                if($plik!='.' and $plik!='..'){
                    echo('<img src="'.$katalog.'/'.$plik.'" />');
                }
                
            }
            echo('<div id="przyciski"><button onclick="prev()">◀</button><button onclick="next()">▶</button></div>');
            
            echo ('</div>');
            echo (
                '<div id="nazwa"><h1>'.$this->nazwa.'</h1></div>
                <div id="cena"><h1><b> '.$this->cena.' zł </b></h1></div>
                <div id="dane">
                <h3>Dane pojazdu</h3>
                <table>
                    <tr>
                        <td>Rok produkcji</td>
                        <td>'.$this->rok.'</td>
                    </tr>
                    <tr>
                        <td>Przebieg</td>
                        <td>'.$this->przebieg.' km</td>
                    </tr>
                    <tr>
                        <td>Paliwo</td>
                        <td>'.$this->paliwo.'</td>
                    </tr>
                    <tr>
                        <td>Pojemność skokowa </td>
                        <td>'.$this->pojemnosc.' cm3</td>
                    </tr>
                    <tr>
                        <td>Moc silnika</td>
                        <td>'.$this->moc.' KM</td>
                    </tr>
                </table>
            </div>
            <br/>
            
            <div id="opis">
            <h3>Opis</h3>
                 <p>
                 '.$this->opis.'
                 </p>
            </div>
            <br>
            '
            );

           
    }



}


?>