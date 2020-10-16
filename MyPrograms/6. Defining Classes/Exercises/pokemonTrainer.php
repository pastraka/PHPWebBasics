<?php

class Trainer
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var int
     */
    private $badges;
    /**
     * @var Pokemon [][]
     */
    private $pokemons;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->badges = 0;
        $this->pokemons = [];
    }

    public function catchPokemon(Pokemon $pokemon): void
    {
        $this->pokemons[$pokemon->getElement()] [] = $pokemon;
    }

    public function receiveBadges(): void
    {
        $this->badges++;
    }

    public function hasPokemonByElement(string $element): bool
    {
        return key_exists($element, $this->pokemons) && count($this->pokemons[$element]) > 0;
    }

    public function hitPokemons(int $dmg): void
    {
        foreach ($this->pokemons as $type => $pokemonsByType) {
            foreach ($pokemonsByType as $key => $pokemon) {
                $pokemon->hit($dmg);
                if (!$pokemon->isAlive()) {
                    unset($this->pokemons[$type][$key]);
                }
            }
        }
    }

    /**
     * @return int
     */
    public function getBadges(): int
    {
        return $this->badges;
    }

    public function __toString()
    {
        $pokemonCount = 0;
        foreach ($this->pokemons as $pokemonsByType) {
            $pokemonCount += count($pokemonsByType);
        }
        return $this->name . ' ' . $this->badges . ' ' . $pokemonCount;
    }
}


class Pokemon
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $element;

    /**
     * @var int
     */
    private $health;

    /**
     * Pokemon constructor.
     * @param string $name
     * @param string $element
     * @param int $health
     */
    public function __construct(string $name, string $element, int $health)
    {
        $this->name = $name;
        $this->element = $element;
        $this->health = $health;
    }

    /**
     * @return mixed
     */
    public function getElement()
    {
        return $this->element;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getHealth(): int
    {
        return $this->health;
    }

    public function isAlive(): bool
    {
        return $this->getHealth() > 0;
    }

    public function hit(int $dmg): void
    {
        $this->health -= max(0, $dmg);
    }
}

/** @var Trainer [] $trainers */
$trainers = [];
$line = readline();

while ($line != "Tournament") {

    list($trainerName, $pokemonName, $element, $health) = explode(" ", $line);
    if (!key_exists($trainerName, $trainers)) {
        $trainers[$trainerName] = new Trainer($trainerName);
    }
    $trainer = $trainers[$trainerName];
    $trainer->catchPokemon(new Pokemon($pokemonName, $element, $health));

    $line = readline();
}

$line = readline();

while ($line != "End") {

    foreach ($trainers as $trainer) {
        if ($trainer->hasPokemonByElement($line)) {
            $trainer->receiveBadges();
        } else {
            $trainer->hitPokemons(10);
        }
    }

    $line = readline();
}

uksort($trainers, function ($key1, $key2) use ($trainers) {
    $trainer1 = $trainers[$key1];
    $trainer2 = $trainers[$key2];

    return $trainer2->getBadges() <=> $trainer1->getBadges();
});

echo implode(PHP_EOL, $trainers);