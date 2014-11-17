<?php
namespace Ibw\JobeetBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Positive\WebsiteBundle\Entity\Concert;

class LoadConcertData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $em)
    {
        $concert1 = new Concert();
        $concert1->setName(
            'FIRMA - [avanpremiera lansare „DESCÂNTECE”], SKY SWALLOWS CHALLENGER | POSITIVE JOHN | LOTF'
        );
        $concert1->setImage('shelter-firma.jpg');
        $concert1->setDate(new \DateTime("2014-10-10 21:00:00"));
        $concert1->setDescription(
            'Ca dovadă a unei energii creative inepuizabile, FIRMA propune un al treilea album cu un sound complex si o lirica introspectiva ce poarta amprenta trupei: ”DESCÂNTECE”. O parte dintre piesele ce vor fi incluse pe acest disc, respectiv „Copiii Cerului”, „Puterea” și "Două suflete", sunt disponibile online pe soundcloud și youtube.'
        );
        $concert1->setLocation("The Shelter");
        $concert1->setAddress("Piata Unirii 25, Cluj-Napoca, 400113 Cluj-Napoca");
        $string = "http://maps.google.com/maps/api/geocode/json?address=" . str_replace(" ", "+", $concert1->getAddress());
        $output = json_decode(file_get_contents($string));
        $concert1->setLatitude($output->results[0]->geometry->location->lat);
        $concert1->setLongitude($output->results[0]->geometry->location->lng);
        $concert1->setUrl('https://www.facebook.com/events/772649462777685/');


        $concert2 = new Concert();
        $concert2->setName("NEW DISORDER 3 YEARS ANNIVERSARY & CELEBRATION With FINE IT'S PINK & POSITIVE JOHN");
        $concert2->setImage("concert1.jpg");
        $concert2->setDate(new \DateTime("2013-12-6 21:00:00"));
        $concert2->setDescription(
            'Ca dovadă a unei energii creative inepuizabile, FIRMA propune un al treilea album cu un sound complex si o lirica introspectiva ce poarta amprenta trupei: ”DESCÂNTECE”. O parte dintre piesele ce vor fi incluse pe acest disc, respectiv „Copiii Cerului”, „Puterea” și "Două suflete", sunt disponibile online pe soundcloud și youtube.'
        );
        $concert2->setLocation("The Shelter");
        $concert2->setAddress("Piata Unirii 25, Cluj-Napoca, 400113 Cluj-Napoca");
        $string = "http://maps.google.com/maps/api/geocode/json?address=" . str_replace(" ", "+", $concert2->getAddress());
        $output = json_decode(file_get_contents($string));
        $concert2->setLatitude($output->results[0]->geometry->location->lat);
        $concert2->setLongitude($output->results[0]->geometry->location->lng);
        $concert2->setUrl('https://www.facebook.com/events/772649462777685/');



        $concert3 = new Concert();
        $concert3->setName("VIOLENT MONKEY vs. POSITIVE JOHN");
        $concert3->setImage("concert2.jpg");
        $concert3->setDate(new \DateTime("2014-02-18 21:00:00"));
        $concert3->setDescription(
            'Ca dovadă a unei energii creative inepuizabile, FIRMA propune un al treilea album cu un sound complex si o lirica introspectiva ce poarta amprenta trupei: ”DESCÂNTECE”. O parte dintre piesele ce vor fi incluse pe acest disc, respectiv „Copiii Cerului”, „Puterea” și "Două suflete", sunt disponibile online pe soundcloud și youtube.'
        );
        $concert3->setLocation("The Shelter");
        $concert3->setAddress("Piata Unirii 25, Cluj-Napoca, 400113 Cluj-Napoca");
        $string = "http://maps.google.com/maps/api/geocode/json?address=" . str_replace(" ", "+", $concert3->getAddress());
        $output = json_decode(file_get_contents($string));
        $concert3->setLatitude($output->results[0]->geometry->location->lat);
        $concert3->setLongitude($output->results[0]->geometry->location->lng);
        $concert3->setUrl('https://www.facebook.com/events/772649462777685/');

        $em->persist($concert1);
        $em->persist($concert2);
        $em->persist($concert3);
        $em->flush();

        $this->addReference('concert1', $concert1);
        $this->addReference('concert2', $concert2);
        $this->addReference('concert3', $concert3);
    }

    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}