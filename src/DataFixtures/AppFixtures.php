<?php

namespace App\DataFixtures;

use App\Entity\Gender;
use App\Entity\Review;
use App\Entity\SocialProfile;
use App\Entity\User;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

class AppFixtures extends Fixture
{
    protected $passwordHasher;
    protected $slugger;

    public function __construct(UserPasswordHasherInterface $passwordHasher, SluggerInterface $slugger)
    {
        $this->passwordHasher = $passwordHasher;
        $this->slugger = $slugger;
    }
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create('fr_FR');

        $genderNames = ['Man', 'Woman', 'Indifferent'];
        $genders = [];
        foreach ($genderNames as $name) {
            $gender = new Gender();
            $gender->setName($name);
            $manager->persist($gender);
            $genders[] = $gender;
        }

        for ($i = 1; $i < 6; $i++) {
            $user = new User();
            $plaintextPassword = "password";
            $hashedPassword = $this->passwordHasher->hashPassword(
                $user,
                $plaintextPassword
            );
            $user->setPassword($hashedPassword);
            $user->setEmail("email$i@gmail.com");
            $user->setPseudo($faker->randomElement(['aymane_afd', 'thomas14', 'manon_rf', 'chris_ele', 'carla.ozu']));
            $user->setCreatedAt(new DateTimeImmutable);
            $user->setGender($genders[array_rand($genders)]);

            for ($j = 1; $j <= 8; $j++) {
                $review = new Review();
                $review->setNote($faker->randomElement(['4', '6', '7', '9']));
                $review->setComment('comment');
                $review->setReviewAt(new DateTimeImmutable);
                $review->addReviewBy($user);

                $socialProfile = new SocialProfile();
                $socialProfile->setName($faker->randomElement(['Instagram', 'Linkedin', 'Facebook']));
                $socialProfile->setUrl($faker->url);
                $socialProfile->setAddedAt(new DateTimeImmutable());

                $user->addReview($review);
                $user->addSocialProfile($socialProfile);
                $user->addReviewBy($review);

                $manager->persist($review);
                $manager->persist($socialProfile);
            }

            $manager->persist($user);
        }

        $manager->flush();
    }
}