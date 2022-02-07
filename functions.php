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
        $addname1 = mb_strtolower($addname);
        $db = getConnection();
        $res = $db->prepare("INSERT INTO countries (name) VALUES (:name)");
        $res->bindParam(':name', $addname1);
        $res->execute();
    }

   function xssDef($string)//Защита HTML от XSS
    {
        return htmlspecialchars($string, ENT_QUOTES);
    }


    function checkName($name)
    {
        $list = getCountry();
        $error = 0;
        foreach($list as $listItem) {

            if(mb_strtolower($name) === mb_strtolower($listItem['name'])) {
                ++$error;
            }
        }

        if($error > 0) {
            return false;
        }
        else {
            return true;
        }

    }
?>