<?php

/**
 * Created by PhpStorm.
 * User: hayk
 * Date: 22/02/2017
 * Time: 13:05
 */
class Lotto
{
    private static $MIN = 1;
    private static $MAX = 42;
    public static $AANTAL = 7;
    private $aantalWeken;
    private $trekkingen;

    public function __construct($aantalWeken)
    {
        $this->aantalWeken = $aantalWeken;
        $this->trekkingen = array();
        $this->genereerTrekkingenVoorAantalWeken();
    }

    public function getAantalWeken()
    {
        return $this->aantalWeken;
    }

    public function getTrekkingen()
    {
        return $this->trekkingen;
    }

    public function getAantallenPerGetal()
    {
        $alleGetallen = $this->getAlleGetallen();
        foreach($this->trekkingen as $week)
        {
            foreach($week as $getal)
            {
                $alleGetallen[$getal-1]++;
            }
        }
        return $alleGetallen;
    }

    public function getAantalMaxVoorkomendeGetallen($aantalMeestVoorkomendeGetallen = 7)
    {
        $gesorteerd = $this->getAantallenPerGetal();
        arsort($gesorteerd);
        return array_slice($gesorteerd, 0, $aantalMeestVoorkomendeGetallen, true);
    }

    private function getAlleGetallen()
    {
        $alleGetallen = array();
        for($i = 0; $i < self::$MAX; $i++)
        {
            $alleGetallen[$i] = 0;
        }
        return $alleGetallen;
    }

    private function getTrekkingenEenWeek()
    {
        $trekkingen = array();
        for($i = 0; $i < self::$AANTAL; $i++)
        {
            $getal = rand(self::$MIN, self::$MAX);
            if (in_array($getal, $trekkingen)) {
                $i--;
            } else {
                $trekkingen[] = $getal;
            }
        }
        return $trekkingen;
    }

    private function genereerTrekkingenVoorAantalWeken()
    {
        for($i = 0; $i < $this->aantalWeken; $i++)
        {
            $this->trekkingen[] = $this->getTrekkingenEenWeek();
        }
    }
}