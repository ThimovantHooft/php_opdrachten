<?php
class LootjesV2
{
/**
* Minimaal aantal deelnemers
*
* @var int
*/
private $minimalNames = 3;

/**
* Maximum aantal deelnemers
*
* @var int
*/
private $maximumNames = 10;

/**
* @var array
*/
private $names = [];

/**
* @var array
*/
private $errors = [];

/**
* Hiermee wordt het script uitgevoerd
*/
public function run()
{
$results = [];

if (!empty($_POST['names'])) {
$names = array_filter($_POST['names']);

$this->validateNames($names);

if (empty($this->errors)) {
$this->names = $names;

$results = $this->trekLootjes();
}
}

$this->render($results);
}

/**
* @param $names
*/
    private function validateNames($names)
    {
        if (count($names) < $this->minimalNames) {
            $this->addError(vsprintf("Er zijn %d namen ingevoerd, minimaal is %d", [
                count($names),
                $this->minimalNames
            ]));
        }

        if (count($names) > $this->maximumNames) {
            $this->addError(vsprintf("Er zijn %d namen ingevoerd, maximaal is %d", [
                count($names),
                $this->maximumNames
            ]));
        }
    }

/**
* Trek lootjes
*/
private function trekLootjes()
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


/**
* Alle HTML output
* @param $results
*/
private function render($results)
{
echo '<h1>Lootjestrekker opdracht</h1>';

if (count($this->errors) > 0) {
echo '<p style="color: red; font-weight: bold;">';
    echo '  Er hebben zich fouten voorgedaan';
    echo '  <ul>';

    foreach ($this->errors as $error) {
    echo '   ' . sprintf('<li>%s</li>', $error);
    }

    echo '  </ul>';
echo '</p>';
echo '<br />';
}

if ($results) {
foreach ($results as $name => $result) {
print $name ." -> ". $result .'<br />';
}
} else {
echo '<form method="post">';

    for ($i = 1; $i <= $this->maximumNames; $i++) {
    echo 'Naam ' . $i . ': <input type="text" name="names[]" value="' . (!empty($_POST['names'][$i - 1]) ? $_POST['names'][$i - 1] : null) . '" /><br />';
    }

    echo '<input type="submit" value="Trek lootjes" />';
    echo '</form>';
}
}

/**
* Voeg de foutmeldingen toe aan de array errors
* @param $error
*/
private function addError($error)
{
array_push($this->errors, $error);
}
}

$lootjes = new LootjesV2();
$lootjes->run();











}