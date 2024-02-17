<?php
class conc
{
    private static $pdo;
    public static function make()
    {
        try
        {
            self::$pdo=self::$pdo?
            :new PDO ('mysql:host=localhost;dbname=new_shop','root','');
        return self::$pdo;
    }
        catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }
}
?>