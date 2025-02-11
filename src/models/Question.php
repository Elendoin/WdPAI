<?php

class Question
{
    private $content;
    private $correct_answer;
    private $option_A;
    private $option_B;
    private $option_C;
    private $option_D;
    private $date;
    private $image;

    public function __construct(string $content,
                                int $correct_answer,
                                string $option_A,
                                string $option_B,
                                string $option_C,
                                string $option_D,
                                $date,
                                string $image)
    {
        $this->content = $content;
        $this->correct_answer = $correct_answer;
        $this->option_A = $option_A;
        $this->option_B = $option_B;
        $this->option_C = $option_C;
        $this->option_D = $option_D;
        $this->date = $date;
        $this->image = $image;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getCorrectAnswer(): int
    {
        return $this->correct_answer;
    }

    public function setCorrectAnswer(int $correct_answer): void
    {
        $this->correct_answer = $correct_answer;
    }

    public function getOptionA(): string
    {
        return $this->option_A;
    }

    public function setOptionA(string $option_A): void
    {
        $this->option_A = $option_A;
    }

    public function getOptionB(): string
    {
        return $this->option_B;
    }

    public function setOptionB(string $option_B): void
    {
        $this->option_B = $option_B;
    }

    public function getOptionC(): string
    {
        return $this->option_C;
    }

    public function setOptionC(string $option_C): void
    {
        $this->option_C = $option_C;
    }

    public function getOptionD(): string
    {
        return $this->option_D;
    }

    public function setOptionD(string $option_D): void
    {
        $this->option_D = $option_D;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date): void
    {
        $this->date = $date;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }
}