<?php
class lootjes
{
    /**
     * @var array
     */

    public $names = [];
    /**
     * @var array
     */
    public $errors;



    public function trekLootjes()
    {
        while (true) {
            $names = $this->names;
            $lootjes = $this->names;

            shuffle($lootjes);

            $results = array_combine($names, $lootjes);

            foreach ($results as $name => $lootje) {
                if ($name === $lootje) {
                    continue 2;
                }
            }
        }
    }

    public function resultaat($results)
    {
        if (count($this->errors) > 0) {
            echo 'Er is iets fout gegaan!';

            echo '<a href="index.php" class="btn btn=outline warning" >Back</a>';
        }
        if ($results) {
            foreach ($results as $name => $result) {
           //     echo '<tr><td>' . $name .'hoi'. '</td>';
                echo '<div>' . $result .'->'. $name. '</div>>';

            }
        }


    }
    private function addError($error)
    {
        array_push($this->errors, $error);
    }

    public function run()
    {
        $results = [];

        if (!empty($_POST['names'])) {
            $names = array_filter($_POST['names']);

            if (empty($this->errors)) {
                $this->names = $names;

                $results = $this->trekLootjes();
            }
        }

        $this->resultaat($results);
    }

}

$a = new lootjes();
$a->run();
?>
<!--<html>-->
<!--<head>-->
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">-->
<!--    <link rel="stylesheet" href="styles.css">-->
<!--</head>-->
<!---->
<!--<body>-->
<!---->
<!--<div class="container-fluid">-->
<!---->
<!--    <div class="inleiding_text">-->
<!--        <h1>De ingedeelde lootjes zijn</h1>-->
<!--    </div>-->
<!--    <table class="table">-->
<!--        <thead class="thead-dark">-->
<!--        <tr>-->
<!--            <th scope="col">Naam</th>-->
<!--            <th scope="col">Getrokken Lootje</th>-->
<!--        </tr>-->
<!--        </thead>-->
<!--        <tbody>-->
<!--        --><?php;//
//
//        ?>
<!--        </tbody>-->
<!--    </table>-->
<!---->
<!---->
<!--    <a href="index.php">-->
<!--        <button class="btn btn-info" >Home</button>-->
<!--    </a>-->
<!--</div>-->
<!--</body>-->
<!---->
<!--</html>-->
