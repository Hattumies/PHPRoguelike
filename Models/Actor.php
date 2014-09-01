<?php

abstract class Actor {

    private $name;
    private $age;
    private $gender;
    private $race;
    private $hpMax;
    private $mpMax;
    private $hpCurrent;
    private $mpCurrent;

    abstract protected function decreaseHpCurrent();

    abstract protected function increaseHpCurrent();

    abstract protected function decreaseMpCurrent();

    abstract protected function increaseMpCurrent();

    abstract protected function decreaseHpMax();

    abstract protected function increaseHpMax();

    abstract protected function decreaseMpMax();

    abstract protected function increaseMpMax();

    public function getName() {
        return $this->$name;
    }

    public function getAge() {
        return $this->$age;
    }

    public function getGender() {
        return $this->$gender;
    }

    public function getRace() {
        return $this->$race;
    }

    public function setName($name) {
        $this->$name = $name;
    }

    public function setAge($age) {
        $this->$age = $age;
    }

    public function setGender($gender) {
        $this->$gender = $gender;
    }

    public function setRace($race) {
        $this->$race = $race;
    }

    public function getHpMax() {
        return $this->$hpMax;
    }

    public function getMpMax() {
        return $this->$mpMax;
    }

    public function getHpCurrent() {
        return $this->$hpCurrent;
    }

    public function getMpCurrent() {
        return $this->$mpCurrent;
    }

    public function setHpMax($hpMax) {
        $this->$hpMax = $hpMax;
    }

    public function setMpMax($mpMax) {
        $this->$mpMax = $mpMax;
    }

    public function setHpCurrent($hpCurrent) {
        $this->$hpCurrent = $hpCurrent;
    }

    public function setMpCurrent($mpCurrent) {
        $this->$mpCurrent = $mpCurrent;
    }

}

?>