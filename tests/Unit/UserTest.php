<?php

namespace App\Tests\Unit;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

    private User $user;

    protected function setUp(): void
    {
        parent::setUp();

        // Je créer en fonction de ma classe User un attribut User
        $this->user = new User();
    }

    //je créer ma methode testGetEmail pour tester l'email
    public function testGetEmail(): void
    {
        //je créer une value qui seras l'email de test
        $value = 'test@test.com';

        $response = $this->user->setEmail($value);

        // Ce qui est attendu c'est user de la variable response
        self::assertInstanceOf(User::class, $response);

        //ce qui est attendu c'est notre value et ce l'on test c'est notre email
        self::assertEquals($value, $this->user->getEmail());

        //je test également le UserIdentifier car les deux sont liés
        self::assertEquals($value, $this->user->getUserIdentifier());
    }
}
