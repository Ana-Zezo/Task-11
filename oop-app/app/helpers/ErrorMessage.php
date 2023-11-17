<?php

namespace App\Helpers;

class ErrorMessage
{
    private $errors = [];

    public function add($message): void
    {
        $this->errors[] = $message;
    }

    public function all(): array
    {
        return $this->errors;
    }

    public function errorExit()
    {
        return !empty($this->errors);
    }
}