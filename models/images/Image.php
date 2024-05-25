<?php

namespace app\models\images;

class Image
{
    protected string $url;
    protected string $picture;
    protected string $baseName;
    protected ?string $hash = null;

    public function __construct($url)
    {
        $this->url = $url;
        $this->baseName = pathinfo($this->url, PATHINFO_BASENAME);
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getHash()
    {
        if (!isset($this->hash)) {
            $this->hash = md5($this->getPicture());
        }
        return $this->hash;
    }

    public function getPicture()
    {
        if (!isset($this->picture)) {
            // $this->picture = file_get_contents($this->url);
            $this->picture = $this->baseName;
        }
        return $this->picture;
    }

    public function getBaseName()
    {
        return $this->baseName;
    }

    public function __get($key)
    {
        return $this->$key;
    }
}
