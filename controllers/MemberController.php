<?php

class MemberController
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function addMember()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        }
    }

    public function showRegisterForm()
    {
        require_once 'views/register.php';
    }
}
