<?php

/** klasa odpowiedzialna za eliksiry
 * Class eliksir
 */
class eliksir
{
    private $eliksir;
    private $tempEx;
    private $eliksir_lvl;
    private $bonus;

    /** konstruktory klasy
     * @param $ex
     * @param $lvl
     */
    public function __construct($ex, $lvl)
    {
        $this->eliksir=$ex;
        $this->tempEx=$ex;
        $this->eliksir_lvl=$lvl;
    }

    /** Pokazuje posiadany eliksir
     *
     */
    public function show()
    {
        switch ($this->eliksir)
        {
            case 1:
                echo '<p>Eliksir szybkosc</p>';
                break;
            case 2:
                echo '<p>Eliksir sily</p>';
                break;
            case 3:
                echo '<p>Eliksir zycia</p>';
                break;
            default:
                echo '<p>Eliksir error</p>';
        }
    }

    /** sprawdza czy jest eliksir
     * @return bool
     */
    public function checkEx()
    {
        if($this->eliksir==null)
            echo 'pusty';
            //return false;
        else
            return true;
    }

    /** wypicie eliksiru
     * @return int
     */
    public function drink()
    {
        $this->tempEx= $this->eliksir;
        switch ($this->eliksir)
        {
            case 1:
                $bonus = 15* $this->eliksir_lvl;
                $this->bonus=$bonus+15;
                $this->eliksir = null;
                return $this->bonus;
                break;
            case 2:
                $bonus = 10* $this->eliksir_lvl;
                $this->bonus=$bonus+10;
                $this->eliksir = null;
                return $this->bonus;
                break;
            case 3:
                $bonus = 20* $this->eliksir_lvl;
                $this->bonus=$bonus+20;
                echo 'qq';
                $this->eliksir = null;
                return $this->bonus;
                break;
            default:
                echo '<p>Brak Eliksir</p>';
        }
    }

    /** zwraca aktualny eliksir
     * @return mixed
     */
    public function wtf()
    {
        return $this->eliksir;
    }

    /** zwraca eliksir ktory zostal ostatnio wypity
     * @return mixed
     */
    public function tempwtf()
    {
        return $this->tempEx;
    }

    /** sprawdza bonus
     * @param $param
     * @return int
     */
    public function bonusCheck ($param)
    {
        if(($param%2==0) && ($this->bonus!=null))
        {
            $temp = $this->bonus;
            $this->bonus=null;
            return $temp;
        }
        else
            return 0;
    }


}