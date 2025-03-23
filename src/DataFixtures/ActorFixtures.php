<?php

namespace App\DataFixtures;


use App\Entity\Actor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ActorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $Actor = new Actor();
        $Actor->setName("Mike Myers");
        $manager->persist($Actor);


        $Actor2 = new Actor();
        $Actor2->setName("Eddie Murphy");
        $manager->persist($Actor2);


        $Actor3 = new Actor();
        $Actor3->setName("Brent Iwan");
        $manager->persist($Actor3);


        $Actor4 = new Actor();
        $Actor4->setName("Russi Taylor");
        $manager->persist($Actor4);

        $manager->flush();
        
        $this->addReference("actor_1", $Actor);
        $this->addReference("actor_2", $Actor2);
        $this->addReference("actor_3", $Actor3);
        $this->addReference("actor_4", $Actor4);

    }
}
