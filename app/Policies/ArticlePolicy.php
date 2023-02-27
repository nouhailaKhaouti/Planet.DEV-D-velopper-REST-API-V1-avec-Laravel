<?php

namespace App\Policies;

use App\Models\article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any articles.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        // By default, allow all users to view articles
        return true;
    }

    /**
     * Determine whether the user can view the article.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\article  $article
     * @return mixed
     */
    public function view(User $user, article $article)
    {
        // By default, allow all users to view articles
        return true;
    }

    /**
     * Determine whether the user can create articles.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        // Only allow publishers and admins to create articles
        return  $user->role->label === "admin" || $user->role->label === "publisher";
    }

    /**
     * Determine whether the user can update the article.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\article  $article
     * @return mixed
     */
    public function update(User $user, article $article)
    {
        // Only allow the publisher or admin to update an article
        return $user->id === $article->user_id || $user->role_id === 2;
    }

    /**
     * Determine whether the user can delete the article.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\article  $article
     * @return mixed
     */
    public function delete(User $user, article $article)
    {
        // Only allow the publisher or admin to delete an article
        return $user->id === $article->user_id || $user->role_id=== 2;
    }

    /**
     * Determine whether the user can restore the article.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\article  $article
     * @return mixed
     */
    public function restore(User $user, article $article)
    {
        // Only allow admins to restore articles
        return  $user->role_id === 2;
    }

    /**
     * Determine whether the user can permanently delete the article.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\article  $article
     * @return mixed
     */
    public function forceDelete(User $user, article $article)
    {
        // Only allow admins to permanently delete articles
        return $user->role_id === 2;
    }
}
