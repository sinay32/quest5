<?php
	function getConnection()
    {
        $host = "localhost";
        $dbname = "countries";
        $user = "root";
        $password = "";

        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

        return $db;
    }

    function getCountry()
    {
            $sql = "SELECT id, name FROM countries";
            $countryList = array();
            $conn = getConnection();

        foreach ($conn->query($sql, PDO::FETCH_ASSOC) as $row)
        {
            $countryList[$row['id']]['id'] = $row['id'];
            $countryList[$row['id']]['name'] = $row['name'];


        }
        return $countryList;
    }

   function addCountry($addname)
   {
        $db = getConnection();
        $res = $db->prepare("INSERT INTO countries (name) VALUES (:name)");
        $res->bindParam(':name', $addname);
        $res->execute();
    }

   function xssDef($string)//Защита HTML от XSS
    {
        return htmlspecialchars($string, ENT_QUOTES);
    }

    function checkName()
    {
        $resultArray = getCountry();
        $resultAll = [];
        array_walk_recursive($resultArray, function ($item) use (&$resultAll) {
            $resultAll[] = $item;
        });

        echo "<pre>";
        print_r($resultAll);
        echo "</pre>";

            if (in_array($_POST["name"],$resultAll) == true)
            {
                return true;
            }
                else
                {
                    return false;
                }
    }
?>