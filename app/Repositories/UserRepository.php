<?php

namespace App\Repositories;

use App\Http\Requests\AssignUserSecretCityRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserRepository
{
    /**
     * Find user by email.
     *
     * @param string $email
     * @return User|null
     */
    public function findByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }

    /**
     * Find user by id.
     *
     * @param int $id
     * @return User|null
     */
    public function findById(int $id): ?User
    {
        return User::find($id);
    }

    /**
     * Get all users.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return User::all();
    }

    /**
     * Create a new user.
     *
     * @param array $data
     * @return User
     */
    public function create(array $data): User
    {
        return User::create($data);
    }

    /**
     * Update user.
     *
     * @param User $user
     * @param array $data
     * @return bool
     */
    public function update(User $user, array $data): bool
    {
        return $user->update($data);
    }

    /**
     * Delete user.
     *
     * @param User $user
     * @return bool|null
     */
    public function delete(User $user): ?bool
    {
        return $user->delete();
    }


    /**
     * Store association.
     *
     * @param  AssignUserSecretCityRequest $request
     * @return User $user
     */
    public function storeAssociation(AssignUserSecretCityRequest $request)
    {
        $user = User::where('city_id', $request->city_id)->first();
        $user->secret_city_id = $request->secret_city_id;
        $user->save();

        return $user;
    }

    public function getCityAssociations()
    {
        $associations = User::select('city_id', 'secret_city_id')->with('city','secret_city')->get();
        return $associations;

    }

    public function deleteAllAssociations()
    {
        User::query()->update([
            'secret_city_id' => null
        ]);

    }

    
}

