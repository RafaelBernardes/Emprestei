<?php

/**
 * Created by PhpStorm.
 * User: lfelipeeb
 * Date: 15/08/16
 * Time: 16:33
 */
class Connection
{
    private static $conection, $host, $dbName, $user, $pass;

    /**
     * Connection constructor.
     *
     * Singleton Class
     */
    private function __construct()
    {

    }

    /**
     * For get a Objetc of Connection, call this method
     *
     * @return PDO|string
     */
    public static function getInstace(){

        if (!isset(self::$conection)){
            if(file_exists("mysql.ini")) {
                $file = parse_ini_file('mysql.ini');

                self::$host = isset($file['host']) ? $file['host'] : NULL;
                self::$dbName = isset($file['dbName']) ? $file['dbName'] : NULL;
                self::$user = isset($file['user']) ? $file['user'] : NULL;
                self::$pass = isset($file['pass']) ? $file['pass'] : NULL;
                try {
                    self::$conection = new PDO("mysql:host=".self::$host."; dbname=".self::$dbName.";charset=utf8", self::$user, self::$pass);
                    self::$conection->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                } catch (PDOException $e) {
                    echo "Error  na conexao com Banco de Dados<br/><br/>" .
                        $e->getMessage() . "<br><br>";
                }

            }else {
                return "Impossivel ler o arquivo de configuração";
            }
        }
        return self::$conection;
    }

    /**
     * The __toString method allows a class to decide how it will react when it is converted to a string.
     *
     * @return string
     * @link http://php.net/manual/en/language.oop5.magic.php#language.oop5.magic.tostring
     */
    public function __toString()
    {
        return "This is Singleton Class, that return the connection with: <br><br>".
        "Host: ".self::$host."<br>DB Name: ".self::$dbName."<br>User: ".self::$user;
    }


}