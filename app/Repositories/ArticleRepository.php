<?php
namespace App\Repositories;

use App\User;
use App\Article;

class ArticleRepository
{
    public function forUser(User $user)
    {
        return Article::where('user_id', $user->id)
            ->orderBy('created_at', 'des')
            ->get();
    }
}