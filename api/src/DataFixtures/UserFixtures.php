<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('cedric@donkeycode.com');
        $user->setPassword('$2y$13$Gc/IvzT.SVQWczKDz6B6MeoeKouExax17eRbtawlsDO9vi.lG1mMW');
        $user->setRoles(['ROLE_ADMIN']);

        $manager->persist($user);

        $manager->flush();
    }
}
