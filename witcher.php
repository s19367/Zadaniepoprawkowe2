<?php
include_once  'creature.php';

/** klasa wiedzmin, dziedziczy z creature
 * Class witcher
 */
class witcher extends creature
{
    private $Ex;
    private $Ex_lvl;
    private $Ex_active;
    private $defcap;
    private $pass;
    private $bonus;
    private $exp;
    private $lvl;
    private $expmax;
    private $gold;
    private $pkt;
    private $armor;

    /**
     * @param $speed
     * @param $str
     * @param $agi
     * @param $live
     * @param $livemax
     */
    public function __construct($speed, $str, $agi, $live, $livemax, $name)
    {
        parent::__construct($speed, $str, $agi, $live, $livemax, $name);
    }

    /**
     * @return mixed
     */
    public function getArmor()
    {
        return $this->armor;
    }
    /**
     * @param $armor
     */
    public function setArmor($armor)
    {
        $this->armor=$armor;
    }
    /**
     * @param $gold
     */
    public function addGold($gold)
    {
        $this->gold=$gold;
    }

    /**
     * @return mixed
     */
    public function showGold()
    {
        return $this->gold;
    }

    /**
     *
     */
    public function lvlCheck()
    {
        if ($this->exp >= $this->expmax)
        {
            $this->incLvl();
            $this->pkt+=5;
            $this->exp = 0;
            return true;
        }
        else
            return false;
    }
    /**
     * @return mixed
     */
    public function showExpMax()
    {
        return $this->expmax;
    }
    /**
     * @param $expMax
     */
    public function getExpMax($expMax)
    {
        $this->expmax = $expMax;
    }


   
    public function pass()
    {
        $this->pass=true;
        return parent::get_ap()+1;
    }




}
?>