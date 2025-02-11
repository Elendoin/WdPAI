<?php

class Suggestion{
    private $title;
    private $description;
    private $image;


    public function __construct(string $title, string $description, string $image)
    {
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
    }

    public function getTitle() : string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getDescription() : string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getImage() : string
    {
        return $this->image;
    }

    public function setImage($image): void
    {
        $this->image = $image;
    }


}