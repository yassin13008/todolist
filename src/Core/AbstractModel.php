<?php 

namespace App\Core;

use PDO;

abstract class AbstractModel {


     static protected ?PDO $pdo = null;

     private static int $count = 0;

     function __construct()
     {
        if (self::$pdo == null) {

         $database = new DB;

         // this fait référence à l'objet en question (cette variable/proriété)
         self::$pdo = DB::getPDOConnection();
        
        // self fait référence à la class en question (cette class)
        // Ici on ne fait pas les -> mais les ::
         self::$count++;
        }
     }

    static function getCountPDO() {
        return self::$count;
     }
 
} ?>