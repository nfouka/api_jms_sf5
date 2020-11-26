<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use joshtronic\LoremIpsum;


class AppFixtures extends Fixture
{

        public function load(ObjectManager $manager)
    {


       $lipsum = new LoremIpsum() ;

        for ($i = 0; $i < 50; $i++) {
            $customer = new Article();
            $customer->setTitle( $lipsum->words(5) );
            $customer->setContent( $lipsum->paragraphs(2) ) ;
            $manager->persist($customer);
        }

        $manager->flush();
    }


}
