<?php
class Tamagotchi
{
    private $title;
    private $salary;
    private $company;
    private $responsibilities;
    private $dates;

    function __construct($title, $salary, $company, $responsibilities, $dates)
    {
        $this->title = $title;
        $this->salary = $salary;
        $this->company = $company;
        $this->responsibilities = $responsibilities;
        $this->dates = $dates;
    }

    function getTitle()
    {
        return $this->title;
    }

    function getSalary()
    {
        return $this->salary;
    }

    function getCompany()
    {
        return $this->company;
    }

    function getResponsibilities()
    {
        return $this->responsibilities;
    }

    function getDates()
    {
        return $this->dates;
    }

    function save()
    {
        array_push($_SESSION['list_of_jobs'], $this);
    }

    static function getAll()
    {
        return $_SESSION['list_of_jobs'];
    }

    static function deleteAll()
    {
        $_SESSION['list_of_jobs'] = array();
    }


}
?>
