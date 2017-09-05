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

        if ($this->day >= 28) {
            $bonus = 25;
        }

        if ($this->day <= 27 && $this->day >= 25) {
            $bonus = 20;
        }

        if ($this->day <= 24 && $this->day >= 22) {
            $bonus = 15;
        }

        if ($this->day <= 21 && $this->day >= 18) {
            $bonus = 10;
        }

        if ($this->day <= 17 && $this->day >= 12) {
            $bonus = 5;
        }

        return $bonus;

    }
}