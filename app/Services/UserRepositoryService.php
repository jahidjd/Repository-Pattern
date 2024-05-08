<?php
namespace App\Services;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepositoryService
{
    public $userInterface;

    public function __construct(UserRepositoryInterface $userRepositoryInterface, public User $user)
    {
        $this->userInterface = $userRepositoryInterface;
    }

    public function getAllUsers()
    {
        return $this->userInterface->getAllUsers($this->user);
    }
}