<?php


class CatFactory implements CatFactoryInterface
{
    /**
     * @param string $breed
     * @param string $name
     * @param int $param
     * @return Catt
     * @throws Exception
     */
    public static function create(string $breed, string $name, int $param): Catt
    {
        if (!class_exists($breed)) {
            throw new Exception("");
        }
        //creating instance of the class
        return new $breed($breed, $name, $param);
    }
}