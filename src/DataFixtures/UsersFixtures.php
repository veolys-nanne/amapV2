<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsersFixtures extends Fixture
{
    private UserPasswordHasherInterface $userPasswordHasher;

    public function __construct(UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->userPasswordHasher = $userPasswordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('amaphommesdeterre@etre-enchante.org');
        $user->setPlainPassword('#AmapHommesDeTerre14');
        $user->setPassword(
            $this->userPasswordHasher->hashPassword($user, $user->getPlainPassword())
        );
        $user->setAdmin(true);
        $user->setFirstname('Amap');
        $user->setLastname('Hommes de Terre');
        $user->setAddress('D50');
        $user->setCity('Cambremer');
        $user->setZipCode('14340');
        $user->setDeleted(false);

        $manager->persist($user);
        $manager->flush();
    }
}
