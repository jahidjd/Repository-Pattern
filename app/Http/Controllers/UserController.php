<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserRepositoryService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserRepositoryService $userRepositoryService)
    {
        $this->userService = $userRepositoryService;
    }

    public function index()
    {
        try {
            // Attempt to retrieve all users via the userService
            $users = $this->userService->getAllUsers();
        
            // Return a successful JSON response with the retrieved data
            return response()->json([
                'status' => 200,
                'message' => 'Users retrieved successfully',
                'data' => $users
            ], 200);
        } catch (\Throwable $th) {
            // Log the error for debugging purposes
            \Log::error('Failed to retrieve users: ' . $th->getMessage());
        
            // Return a JSON error response
            return response()->json([
                'status' => 500,
                'message' => 'Failed to retrieve users',
                'error' => $th->getMessage()
            ], 500);
        }
      
    }
}
