<?php

namespace App\DataFixtures;

use App\Entity\City;
use App\Entity\Country;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $senegal = new Country;
        $senegal->setName('Sénégal');
        $ci = new Country;
        $ci->setName('Côte d\'Ivoire');
        $nigeria = new Country;
        $nigeria->setName('Nigéria');
        $mali = new Country;
        $mali->setName('Mali');
        $ca = new Country;
        $ca->setName('Canada');

        $dakar = new City;
        $dakar->setName("Dakar");
        $dakar->setCountry($senegal);
        $rufisque = new City;
        $rufisque->setName("Rufisque");
        $rufisque->setCountry($senegal);
        $pikine = new City;
        $pikine->setName("Pikine");
        $pikine->setCountry($senegal);
        $kaolack = new City;
        $kaolack->setName("Kaolack");
        $kaolack->setCountry($senegal);
        $fatick = new City;
        $fatick->setName("Fatick");
        $fatick->setCountry($senegal);
        $thies = new City;
        $thies->setName("Thiès");
        $thies->setCountry($senegal);
        $mbour = new City;
        $mbour->setName("Mbour");
        $mbour->setCountry($senegal);
        $diamniadio = new City;
        $diamniadio->setName("Diamniadio");
        $diamniadio->setCountry($senegal);

        $lagos = new City;
        $lagos->setName("Lagos");
        $lagos->setCountry($nigeria);
        $kano = new City;
        $kano->setName("Kano");
        $kano->setCountry($nigeria);
        $kaduna = new City;
        $kaduna->setName("Kaduna");
        $kaduna->setCountry($nigeria);
        $ibadan = new City;
        $ibadan->setName("Ibadan");
        $ibadan->setCountry($nigeria);

        $abidjan = new City;
        $abidjan->setName("Abidjan");
        $abidjan->setCountry($ci);
        $daloa = new City;
        $daloa->setName("Daloa");
        $daloa->setCountry($ci);
        $bouake = new City;
        $bouake->setName("Bouaké");
        $bouake->setCountry($ci);
        $yamoussoukro = new City;
        $yamoussoukro->setName("Yamoussoukro");
        $yamoussoukro->setCountry($ci);

        $kayes = new City;
        $kayes->setName("Kayes");
        $kayes->setCountry($mali);
        $mopti = new City;
        $mopti->setName("Mopti");
        $mopti->setCountry($mali);
        $segou = new City;
        $segou->setName("Ségou");
        $segou->setCountry($mali);

        $quebec = new City;
        $quebec->setName("Québéc");
        $quebec->setCountry($ca);
        $montreal = new City;
        $montreal->setName("Montréal");
        $montreal->setCountry($ca);

        $manager->persist($senegal);
        $manager->persist($ci);
        $manager->persist($nigeria);
        $manager->persist($mali);
        $manager->persist($ca);

        $manager->persist($dakar);
        $manager->persist($rufisque);
        $manager->persist($pikine);
        $manager->persist($kaolack);
        $manager->persist($fatick);
        $manager->persist($thies);
        $manager->persist($mbour);
        $manager->persist($diamniadio);

        $manager->persist($lagos);
        $manager->persist($kano);
        $manager->persist($kaduna);
        $manager->persist($ibadan);

        $manager->persist($abidjan);
        $manager->persist($daloa);
        $manager->persist($bouake);
        $manager->persist($yamoussoukro);

        $manager->persist($kayes);
        $manager->persist($mopti);
        $manager->persist($segou);

        $manager->persist($montreal);
        $manager->persist($quebec);

        $manager->flush();
    }
}