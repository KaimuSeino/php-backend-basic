<?php
/**
 * クラスの基礎
 */
class Person
{
    private $name;
    public $age;

    function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    function hello()
    {
        echo 'hello, ' . $this->name;
        echo $this->age;
    }
}

$bob = new Person('Bob', 18);
$bob->hello();

echo $bob->age;

echo "<div>thisについて</div>";

class UserCall
{
    private $name;
    public $age;

    function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    function callPhone()
    {
        echo "hello?, hi!" . $this->name;
        return $this;
    }

    function callUserName()
    {
        echo "Oh," . $this->age;
        return $this;
    }
}

$kaimu = new UserCall('Kaimu', 21);
$kaimu->callPhone()->callUserName();

echo "<div>Staticメソッドについて</div>";

class CatDog
{
    private $name;
    public $age;
    public const catName = "Yui";

    function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    function catCall()
    {
        echo 'hello, ' . $this->name . ", your age is " . $this->age;
        echo static::catName;
        return $this;
    }

    static function bye()
    {
        echo 'bye';
    }
}

$yui = new CatDog('ai', 3);
$yui->catCall();
echo CatDog::catName;
CatDog::bye();
