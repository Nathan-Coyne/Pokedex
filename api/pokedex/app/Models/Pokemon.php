<?php

namespace App\Models;

use App\Traits\ObjectToArray;

class Pokemon
{
    use ObjectToArray;
    private string $name;
    private string $url;
    private string $image;
    private int $height;
    private int $weight;
    private array $types;
    private array $abilities;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function setHeight(int $height): void
    {
        $this->height = $height;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): void
    {
        $this->weight = $weight;
    }

    public function getTypes(): array
    {
        return $this->types;
    }

    public function setTypes(array $types): void
    {
        $this->types = $types;
    }

    public function getAbilities(): array
    {
        return $this->abilities;
    }

    public function setAbilities(array $abilities): void
    {
        $this->abilities = $abilities;
    }
}
