<?php
 
namespace App\Policies;
 
use App\Models\Treinador;
use App\Models\Post;
use App\Models\User;
 
class TreinadorPolicy
{
    public function delete(?User $user): bool
    {
        return !is_null($user);
    }
        public function create(?User $user): bool
    {
        return !is_null($user);
    }
    public function update(?User $user): bool
    {
        return !is_null($user);
    }
}