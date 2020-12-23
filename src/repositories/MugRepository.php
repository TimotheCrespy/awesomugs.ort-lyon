<?php

spl_autoload_register(function ($className) {
    include(__DIR__ . '/../entities/' . $className . '.php');
});
include(__DIR__ . '/../database/DbConnection.php');

class MugRepository
{
    private PDO $dbConnection;

    public function __construct()
    {
        $this->setDbConnection(getDbConnection());
    }

    private function getDbConnection()
    {
        return $this->dbConnection;
    }

    private function setDbConnection($dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    function index()
    {
        $request = "SELECT * FROM mugs";
        $response = $this->getDbConnection()->query($request);
        $mugRecords = $response->fetchAll();

        $allMugs = [];

        foreach ($mugRecords as $mugRecord) {
            $allMugs[] = new Mug($mugRecord['color'], $mugRecord['shape'], $mugRecord['price']);
        }

        return $allMugs;
    }

    public function store($mug)
    {
        $request = "INSERT INTO mugs(color, shape, price) VALUES (:color, :shape, :price)";

        $statement = $this->getDbConnection()->prepare($request);

        $statement->execute([
            "color" => $mug->getColor(),
            "shape" => $mug->getShape(),
            "price" => $mug->getPrice(),
        ]);
    }
}
