<?php

class Radio
{
    private $artistName;
    private $songName;
    private $songLength;

    /**
     * Radio constructor.
     * @param string $artistName
     * @param string $songName
     * @param array $songLength
     * @throws Exception
     */
    public function __construct(string $artistName, string $songName, array $songLength)
    {
        $this->setArtistName($artistName);
        $this->setSongName($songName);
        $this->setSongLength($songLength);
    }

    /**
     * @return string
     */
    public function getArtistName(): string
    {
        return $this->artistName;
    }

    /**
     * @param string $artistName
     * @throws Exception
     */
    private function setArtistName(string $artistName)
    {
        if (strlen($artistName) < 3 || strlen($artistName) > 20) {
            throw new Exception("Artist name should be between 3 and 20 symbols.");
        }
        $this->artistName = $artistName;
    }

    /**
     * @return string
     */
    public function getSongName(): string
    {
        return $this->songName;
    }

    /**
     * @param string $songName
     * @throws Exception
     */
    private function setSongName(string $songName)
    {
        if (strlen($songName) < 3 || strlen($songName) > 20) {
            throw new Exception("Song name should be between 3 and 30 symbols.");
        }
        $this->songName = $songName;
    }

    /**
     * @return array
     */
    public function getSongLength(): array
    {
        return $this->songLength;
    }

    /**
     * @param array $songLength
     * @throws Exception
     */
    public function setSongLength(array $songLength)
    {
        $minutes = $songLength[0];
        $seconds = $songLength[1];
        if ($minutes < 0 || $minutes > 14) {
            throw new Exception("Song minutes should be between 0 and 14.");
        } elseif ($seconds < 0 || $seconds > 59) {
            throw new Exception("Song seconds should be between 0 and 59.");
        }

        $this->songLength = ["minutes" => $minutes, "seconds" => $seconds];
    }
}

$n = intval(readline());
$playList = [];
$artistName = "";
$songName = "";

for ($i = 0; $i < $n; $i++) {
    list($artistName, $songName, $songLength) = explode(";", readline());
    list($minutes, $seconds) = explode(":", $songLength);

    try {
        $song = new Radio($artistName, $songName, [intval($minutes), intval($seconds)]);
        echo "Song added." . PHP_EOL;
        $playList [] = $song;
    } catch (Exception $exception) {
        echo $exception->getMessage() . PHP_EOL;
    }
}

echo "Song added: " . count($playList) . PHP_EOL;
echo "Playlist length: ";

$minutes = NULL;
$seconds = NULL;
$hours = NULL;
$mins = NULL;
$sec = NULL;

foreach ($playList as $item) {
    foreach ($item->getSongLength() as $key => $value) {
        if ($key == "minutes") {
            $mins += $value;
        } elseif ($key == "seconds") {
            $sec += $value;
        }
    }
}

$hours = intval($mins / 60 + $sec / 60 / 60);
$mins = $mins - intval($mins / 60) * 60 + intval($sec / 60) - intval($sec / 60 / 60) * 60 == 60 ? 0 : $mins - intval
    ($mins / 60) * 60 + intval($sec / 60) - intval($sec / 60 / 60) * 60;
$sec = $sec % 60;

$mins = str_pad($mins, 2, "0", STR_PAD_LEFT);
$sec = str_pad($sec, 2, "0", STR_PAD_LEFT);

echo "{$hours}h {$mins}m {$sec}s";