<?php

spl_autoload_register();
class Main
{
    const PATTERN = "/\\s+/";
    const INPUT_END_COMMAND = "End";

    /**
     * @var array
     */
    private $cats;

    public function run()
    {
        $this->readData();
    }

    private function findCatByName(string $name): Catt
    {
        if (array_key_exists($name, $this->cats)) {
            return $this->cats[$name];
        }
    }

    private function readData()
    {
        $input = readline();
        while ($input !== self::INPUT_END_COMMAND) {
            $data = preg_split(self::PATTERN, $input, -1, PREG_SPLIT_NO_EMPTY);

            $breed = $data[0];
            $name = $data[1];
            $param = intval($data[2]);

            $cat = null;
            try {
                $this->cats[$name] = CatFactory::create($breed, $name, $param);
            } catch (Exception $e) {
                $e->getMessage();
            }

            $input = readline();
        }

        $catName = readline();
        $cat = $this->findCatByName($catName);
        echo $cat;
    }
}

$main = new Main();
$main->run();