<?php
class Tamagotchi
{
    private $name;
    private $food;
    private $attention;
    private $sleep;
    private $life;
    private $age;

    // function __construct($name, $food, $attention, $sleep, $life, $age)
    // {
    //     $this->name = $name;
    //     $this->food = $food;
    //     $this->attention = $attention;
    //     $this->sleep = $sleep;
    //     $this->life = $life;
    //     $this->age = $age;
    // }
    function __construct($name)
    {
        $this->name = $name;
        $this->food = rand (4,10);
        $this->attention = rand(2,8);
        $this->sleep = 5;
        $this->life = true;
        $this->age = 1;
    }

    function getName()
    {
        return $this->name;
    }

    function getFood()
    {
        return $this->food;
    }

    function getAttention()
    {
        return $this->attention;
    }

    function getSleep()
    {
        return $this->sleep;
    }

    function getLife()
    {
        return $this->life;
    }

    function getAge()
    {
        return $this->age;
    }

    function save()
    {
        array_push($_SESSION['list_of_tamagotchis'], $this);
    }

    function age()
    {
        $this->foodLose();
        $this->sleepLose();
        $this->attentionLose();
        $this->age += 1;
        $this->checkLife();
    }
    function foodLose()
    {
        $this->food -= 1;
    }
    function sleepLose()
    {
        $this->sleep -= 1;
    }
    function attentionLose()
    {
        $this->attention -= 1;
    }
    function checkLife()
    {
        if ($this->age > 25 && rand(1,100) > 80) {
            $this->life = false;
        } elseif ($this->food <= 0 || $this->sleep <= 0 || $this->attention <= 0) {
            $this->life = false;
        }
        return $this->life;
    }

    function feed()
    {
        $this->food = 10;
    }

    function attend()
    {
        $this->attention = 10;
    }

    function sleep()
    {
        $this->sleep = 10;
    }

    static function getAll()
    {
        return $_SESSION['list_of_tamagotchis'];
    }

    static function deleteAll()
    {
        $_SESSION['list_of_tamagotchis'] = array();
    }
    static function ageAll()
    {
        foreach ($_SESSION['list_of_tamagotchis'] as $gotchi) {
            $gotchi->age();
        }
    }


}
?>
