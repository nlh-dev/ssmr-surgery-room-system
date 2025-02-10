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

    protected function paginationData($page, $numPages, $url, $buttons){

        $table = '
        <div class="flex items-center justify-end mt-3">
            <nav aria-label="Page navigation">
        ';

        if ($page <= 1) {
            $table .= '
            <ul class="inline-flex -space-x-px text-base h-10">
                <li>
                    <a href="#" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-300 border border-gray-300 rounded-s-lg bg-gray-800 border-gray-700 cursor-not-allowed">Anterior</a>
                </li>';
        } else {
            $table .= '
            <ul class="inline-flex -space-x-px text-base h-10">
                <li>
                    <a href="' . $url . ($page - 1) . '/" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-300 border border-gray-300 rounded-s-lg bg-gray-800 hover:bg-gray-900 border-gray-700 hover:text-white">Anterior</a>
                </li>
                    <li>
                    <a href="' . $url . '1/" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-300 border border-gray-300 bg-gray-800 hover:bg-gray-900 border-gray-700 hover:text-white">1</a>
                </li>';
        }

        $iterationCounter = 0;
        for ($counter = $page; $counter <= $numPages; $counter++) {
            if ($iterationCounter >= $buttons) {
                break;
            }

            if ($page == $counter) {
                $table .= '
                
                <li>
                    <a href="' . $url . $counter . '/" aria-current="page" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-300 border border-gray-300 bg-gray-800 hover:bg-gray-900 border-gray-700 hover:text-white">' . $counter . '</a>
                </li>';
            } else {
                $table .= '
                <li>
                    <a href="' . $url . $counter . '/" aria-current="page" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-300 border border-gray-300 bg-gray-800 hover:bg-gray-900 border-gray-700 hover:text-white">' . $counter . '</a>
                </li>';
            }

            $iterationCounter++;
        }

        if ($page == $numPages) {
            $table .= '
                <li>
                    <a href="#" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-300 border border-gray-300 bg-gray-800 border-gray-700 rounded-e-lg cursor-not-allowed">Siguiente</a>
                </li>
            </ul>';
        } else {
            $table .= '
                <li>
                    <a href="' . $url . ($page + 1) . '/" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-300 border border-gray-300 bg-gray-800 hover:bg-gray-900 border-gray-700 hover:text-white rounded-e-lg">Siguiente</a>
                </li>
            </ul>
            </div>';
        }

        $table .= '</nav>';
        return $table;
    }
}
