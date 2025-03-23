<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class  MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $movie = new Movie();
        $movie->setTitle("Shrek");
        $movie->setDirector("Andrew Adamson");
        $movie->setReview("Funny Movie about a big green ogre ");
        $movie->setReviewer("Isaiah Michael");
        $movie->setRunningTime("90");
        $movie->setimage_path("https://cdn.pixabay.com/photo/2015/04/14/17/08/alien-722415_1280.jpg");
        $movie->addActor($this->getReference("actor_1"));
        $movie->addActor($this->getReference("actor_2"));


        $manager->persist($movie);


        $movie2 = new Movie();
        $movie2->setTitle("Mickey: The Story of a Mouse");
        $movie2->setDirector("Walt Disney");
        $movie2->setReview("A jolly cartoon mouse");
        $movie2->setReviewer("Isaiah Michael");
        $movie->setRunningTime("93");
        $movie2->setimage_path("https://cdn.pixabay.com/photo/2016/10/27/22/29/mickey-mouse-1776700_1280.jpg");
        $manager->persist($movie2);
         

        $movie2->addActor($this->getReference("actor_3"));
        $movie2->addActor($this->getReference("actor_3"));

        $manager->flush();



    }
}
