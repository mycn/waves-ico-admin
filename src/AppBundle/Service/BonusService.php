<?php


namespace AppBundle\Service;


use AppBundle\Entity\Transaction;
use Doctrine\Common\Persistence\ObjectManager;

class BonusService
{

    protected $em;
    protected $day;

    protected $days = [

    ];


    public function __construct(ObjectManager $em, $day)
    {
        $this->em = $em;
        $this->day = $day;
    }

    public function getBonus()
    {

        $bonus = 0;

        if ($this->day >= 25 || $this->day == 24) {
            $bonus = 25;
        }

        if ($this->day <= 23 && $this->day >= 21) {
            $bonus = 20;
        }

        if ($this->day <= 20 && $this->day >= 18) {
            $bonus = 15;
        }

        if ($this->day <= 17 && $this->day >= 14) {
            $bonus = 10;
        }

        if ($this->day <= 13 && $this->day >= 6) {
            $bonus = 5;
        }

        return $bonus;

    }
}