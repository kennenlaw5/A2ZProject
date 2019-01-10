<?php

namespace App\Policies;

use App\Movie;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MoviePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can edit the movie.
     *
     * @param  \App\User  $user
     * @param  \App\Movie  $movie
     * @return mixed
     */
    public function update(User $user, Movie $movie)
    {
        return $movie->owner_id == $user->id;
    }
}
