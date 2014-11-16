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
        for($i = 0; $i< 4; $i++) {
            $concert = new Concert();
            $concert->setName(
                'FIRMA - [avanpremiera lansare „DESCÂNTECE”], SKY SWALLOWS CHALLENGER | POSITIVE JOHN | LOTF'
            );
            $concert->setDate(new \DateTime("2014-10-10 21:00:00"));
            $concert->setDescription(
                'Ca dovadă a unei energii creative inepuizabile, FIRMA propune un al treilea album cu un sound complex si o lirica introspectiva ce poarta amprenta trupei: ”DESCÂNTECE”. O parte dintre piesele ce vor fi incluse pe acest disc, respectiv „Copiii Cerului”, „Puterea” și "Două suflete", sunt disponibile online pe soundcloud și youtube.'
            );
            $concert->setImage('shelter-firma.jpg');
            $concert->setLocation("The Shelter");
            $concert->setAddress("Piata Unirii 25, Cluj-Napoca, 400113 Cluj-Napoca");

            $string = "http://maps.google.com/maps/api/geocode/json?address=" . str_replace(" ", "+", $concert->getAddress());
            $output = json_decode(file_get_contents($string));

            $concert->setLatitude($output->results[0]->geometry->location->lat);
            $concert->setLocation($output->results[0]->geometry->location->lng);

            $concert->setUrl('https://www.facebook.com/events/772649462777685/');
            $em->persist($concert);
            $em->flush();
        }
    }

    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}