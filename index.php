<?php include_once ('functions.php');
$resultCountry = getCountry();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <div class="block">
            <div class="block__table">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Название</th>
                    </tr>
                        <?php foreach ($resultCountry as $key => $rate):?>
                    <tr>
                        <td><?php echo xssDef($key); ?></td>
                        <td><?php echo xssDef($rate["name"]); ?></td>
                    </tr>
                         <?php endforeach;?>
                </table>
            </div>
                <form action="index.php" method="post">
                    <div class="block__button">
                        <img src="island.png" alt="островок">
                        <div class="block_sumbit">
                            <p><input class="country" type="text" name="name" placeholder ="Введите страну" required value=""></p>
                            <p><input class="sumbit" type="submit" name="btn"></p>
                        </div>
                    </div>
                </form>
        </div>
    </body>
</html>

<?php
    if ($_POST["btn"])
    {
        if (!empty($_POST["name"]) and checkName() == false)
        {
            addCountry($_POST["name"]);
        }
    }
?>


