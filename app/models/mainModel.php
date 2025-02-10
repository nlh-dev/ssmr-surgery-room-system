<?php

namespace app\models;

use \PDO;

if (file_exists(__DIR__ . "/../../config/server.php")) {
    require_once __DIR__ . "/../../config/server.php";
}

class mainModel{
    private $dbServer = DBSERVER;
    private $dbName = DBNAME;
    private $dbUser = DBUSER;
    private $dbPassword = DBPASSWORD;

    // FUNCTION TO EXECUTE CONNECTION TO DATA BASE //
    protected function dbConnect(){
        $dbConnection = new PDO("mysql:host=" . $this->dbServer . ";dbname=" . $this->dbName, $this->dbUser, $this->dbPassword);
        $dbConnection->exec("SET CHARACTER SET utf8");
        return $dbConnection;
    }

    // FUNCTION TO EXECUTE A REQUEST DATA TO DATABASE
    public function dbRequestExecute($dbRequest){
        $dbRequest_SQL = $this->dbConnect()->prepare($dbRequest);
        $dbRequest_SQL->execute();
        return $dbRequest_SQL;
    }

    // FUNCTION TO AVOID SQL INJECTION
    public function cleanRequest($string){

        $forbiddenWords = ["<script>", "</script>", "<script src", "<script type=", "SELECT * FROM", "SELECT ", " SELECT ", "DELETE FROM", "INSERT INTO", "DROP TABLE", "DROP DATABASE", "TRUNCATE TABLE", "SHOW TABLES", "SHOW DATABASES", "<?php", "?>", "--", "^", "<", ">", "==", "=", ";", "::"];

        $string = trim($string);
        $string = stripslashes($string);

        foreach ($forbiddenWords as $forbiddenWord) {
            $string = str_ireplace($forbiddenWord, "", $string);
        }
        $string = trim($string);
        $string = stripslashes($string);
        return $string;
    }

    // FUNCTION TO VERIFY DATA
    protected function verifyData($filter, $string){
        if (preg_match("/^" . $filter . "$/", $string)) {
            return false;
        } else {
            return true;
        }
    }

    // MAIN FUNCTION TO SAVE DATA INTO ANY TABLE FROM DATABASE
    protected function saveData($table, $data){

        $saveData_Query = "INSERT INTO $table (";
        $C = 0;
        foreach ($data as $key) {
            if ($C >= 1) {
                $saveData_Query .= ",";
            }
            $saveData_Query .= $key["db_FieldName"];
            $C++;
        }

        $saveData_Query .= ") VALUES(";
        $C = 0;
        foreach ($data as $key) {
            if ($C >= 1) {
                $saveData_Query .= ",";
            }
            $saveData_Query .= $key["db_ValueName"];
            $C++;
        }
        $saveData_Query .= ")";

        $dbSaveData_SQL = $this->dbConnect()->prepare($saveData_Query);

        foreach ($data as $key) {
            $dbSaveData_SQL->bindParam($key["db_ValueName"], $key["db_realValue"]);
        }

        $dbSaveData_SQL->execute();
        return $dbSaveData_SQL;
    }
}
