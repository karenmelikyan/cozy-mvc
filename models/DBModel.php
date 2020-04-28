<?php


class DBModel
{
    private $db;
    private $tableName;

    /**
     * DBModel constructor.
     * @param $tableName
     *
     * The class constructor, also replaces
     * classic migrations: creates tables if
     * they do not already exist.
     */
    public function __construct($tableName)
    {
        $this->tableName = $tableName;

        $this->db = new mysqli(Config::$conf['host'], Config::$conf['username'], Config::$conf['password'],
            Config::$conf['dbname'], Config::$conf['port']) or die("Error " . mysqli_error($this->db));

        if(!$this->db->query('CREATE TABLE IF NOT EXISTS users')){
            $query = "CREATE Table users
                (
                id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(200) NOT NULL,
                email VARCHAR(200) NOT NULL,
                passwordHash VARCHAR(200) NOT NULL
                )";

            mysqli_query($this->db, $query);
        }

    }

    /**
     * @return array
     *
     * returns a two-dimensional array
     */
    public function getAll(): ?array
    {
        $dataArray = [];
        $query = "SELECT * FROM " . $this->tableName;
        $result = mysqli_query($this->db, $query);

        if($result) {
            $rows = mysqli_num_rows($result); // get amount of rows
            for ($i = 0; $i < $rows; ++ $i) {
                $dataArray[] = mysqli_fetch_row($result);
            }
            return $dataArray;
        }

       return null;
    }

    /**
     * @param $fieldName
     * @param $value
     * @return array|null
     *
     * returns a two-dimensional array
     */
    public function getByColumn($columnName, $value): ?array
    {
        $dataArray = [];
        $query = "SELECT * FROM " . $this->tableName . " WHERE " . $columnName . " = " . "'$value'";
        $result = mysqli_query($this->db, $query);

        if($result) {
            $rows = mysqli_num_rows($result); // get amount of rows
            for ($i = 0; $i < $rows; ++ $i) {
                $dataArray[] = mysqli_fetch_row($result);
            }
        }

        if(count($dataArray) > 0){
            return $dataArray;
        }

        return null;
    }

    /**
     * @param $fieldName
     * @param $value
     * @return bool
     */
    public function deleteByColumn($columnName, $value): bool
    {
        $query = "DELETE FROM " . $this->tableName . " WHERE " . $columnName . " = " . "'$value'";
        if(mysqli_query($this->db, $query)){
            return true;
        }

        return false;
    }

    /**
     * @param $postData
     * @return bool
     */
    public function insert($postData): bool
    {
        $values = [];
        foreach($postData as $value){
                       /**  safety from sql injections */
           $values[] = htmlentities(mysqli_real_escape_string($this->db, $value));
        }

        $query ="INSERT INTO " . $this->tableName . " VALUES(NULL, '$values[0]', '$values[1]', '$values[2]')";
        if(mysqli_query($this->db, $query)){
            return true;
        }

        return false;
    }

}