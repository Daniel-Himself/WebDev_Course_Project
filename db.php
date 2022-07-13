<?php

//? dbClass Is Containing All The Functions And The DATABASE Connection That We Need It For Use
class dbClass
{
    private static $host;
    private static $db;
    private static $charset;
    private static $user;
    private static $pass;
    private static $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];
    public static $connection;
    private static $obj;

    public function __construct(
        string $host = "localhost",
        string $db = "project",
        string $charset = "utf8",
        string $user = "root",
        string $pass = ""
    ) {
        // Define The SQL DATA BASE INFORMATION
        self::$host = $host;
        self::$db = $db;
        self::$charset = $charset;
        self::$user = $user;
        self::$pass = $pass;
    }

    public function GetInstance(): dbClass
    {
        if (self::$obj == null) {
            self::$obj = new dbClass();
        }

        return self::$obj;
    }
    // Connection Function .
    public static function connect()
    {
        $dns = "mysql:host="
            . self::$host
            . ";dbname="
            . self::$db
            . ";charset="
            . self::$charset;
        self::$connection = new PDO($dns, self::$user, self::$pass, self::$opt);
    }
    public static function disconnect()
    {
        self::$connection = null;
    }

    public static function addRecipe($recipeName, $recipeTitle, $recipeMethod, $authorName, $recipeImage)
    {
        $db = new dbClass();
        $db::connect();
        $sql = "INSERT INTO recipes (recipe_name,Aothur, recipe_method, recipe_title ,dateAdded ,recipe_image)
         VALUES (:recipeName,:Author,:recipeMethod,:recipeTitle,CURRENT_TIMESTAMP , :recipeIMAGE)";
        $statement = $db::$connection->prepare($sql);
        $result =  $statement->execute(
            [
                ":recipeName" => $recipeName,
                ":Author" => $authorName,
                ":recipeMethod" => $recipeMethod,
                ":recipeTitle" => $recipeTitle,
                ":recipeIMAGE" => $recipeImage,

            ]
        );
        $db::disconnect();
        if ($result)
            return true;
        return false;
    }

    public static function EditRecipe($recipeName, $recipeTitle, $recipeMethod, $recipeID)
    {
        $db = new dbClass();
        $db::connect();
        $sql = "UPDATE recipes SET
         recipe_name = '$recipeName'
        ,recipe_method = '$recipeMethod' 
        ,recipe_title = '$recipeTitle'
        ,dateAdded = CURRENT_TIMESTAMP
        WHERE id = '$recipeID'
        ";
        $statement = $db::$connection->query($sql);
        $db::disconnect();
        if ($statement)
            return true;
        return false;
    }

    public static function FetchData()
    {
        $db = new dbClass();
        $db::connect();
        $sql = "SELECT * FROM recipes";
        $statement = $db::$connection->query($sql);
        $Data = $statement->fetchAll();
        return $Data;
    }
    public static function FetchDataViaID($id)
    {
        $db = new dbClass();
        $db::connect();
        $sql = "SELECT * FROM recipes WHERE id = '$id'";
        $statement = $db::$connection->query($sql);
        $Data = $statement->fetch();
        return $Data;
    }

    public static function FetchIngredientDataViaID($id)
    {
        $db = new dbClass();
        $db::connect();
        $sql = "SELECT * FROM ingredients WHERE recipe_id = '$id'";
        $statement = $db::$connection->query($sql);
        $Data = $statement->fetchAll();
        return $Data;
    }
    public static function FetchIngredientCOUNTViaID($id)
    {
        $db = new dbClass();
        $db::connect();
        $sql = "SELECT COUNT(recipe_id) 
        FROM ingredients WHERE recipe_id = '$id'";
        $statement = $db::$connection->query($sql);
        $Data = $statement->rowCount();
        return $Data;
    }

    public static function DeleteRecipe($recipe_ID)
    {
        $db = new dbClass();
        $db::connect();
        $sql = "DELETE FROM recipes WHERE id ='$recipe_ID'";
        $statement = $db::$connection->query($sql);
        if ($statement)
            return true;
        return false;
    }

    public static function checkEmailIfExist($emailAddress)
    {
        $db = new dbClass();
        $db::connect();
        // SQL Query That We Send To Our SQL DATABASE That Select The PASSWORD To That UserName  We Write In The Input.
        $sql_2 = "SELECT * FROM users WHERE  email='$emailAddress' LIMIT 1";
        $statement_2 = $db::$connection->query($sql_2);
        $result = $statement_2->fetch();
        if ($result > 0)
            return true;
        return false;
    }
}
