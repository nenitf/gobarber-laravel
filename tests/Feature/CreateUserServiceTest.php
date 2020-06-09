<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Repositories\Fakes\FakeUsersRepository;
use App\Providers\Fakes\FakeHashProvider;
use App\Services\CreateUserService;

class CreateUserServiceTest extends TestCase
{
    private $fakeUsersRepository;
    private $fakeHAshProvider;
    private $createUser;

    public function setUp():void
    {
        parent::setUp();
        $this->fakeUsersRepository = new FakeUsersRepository();
        $this->fakeHashProvider = new FakeHashProvider();

        $this->createUser = new CreateUserService($this->fakeUsersRepository, $this->fakeHashProvider);
    }

    public function testShouldBeAbleToCreateNewUser()
    {
        $user = new User('John Doe', 'johndoe@example.com', '123456');

        $userReceived = $this->createUser->execute($user);

        $this->assertNotNull($userReceived->getId(), 'aaa');
    }
}
