<?php

namespace App\Services;

use App\Http\Requests\AssignUserSecretCityRequest;
use App\Repositories\UserRepository;

class UserService
{
    protected UserRepository $userRepository;

    /**
     * Constructor
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function storeAssociation(AssignUserSecretCityRequest $request){
        $user  =  $this->userRepository->storeAssociation($request);
        return $user;

    }

    public function getCityAssociations(){
        $associations =  $this->userRepository->getCityAssociations();
        return $associations;
    }

    public function deleteAllAssociations(){
        $associations =  $this->userRepository->deleteAllAssociations();
        return $associations;
    }
}
