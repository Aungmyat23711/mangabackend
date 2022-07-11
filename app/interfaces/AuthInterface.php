<?php
namespace App\interfaces;

interface AuthInterface{
    public function addAuth($auth);
    public function loginAuth($auth);
    public function loginAdminAuth($auth);
}