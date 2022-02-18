<?php

namespace App\Controller;

use App\Entity\City;
use App\Entity\Country;
use App\Repository\CityRepository;
use App\Repository\CountryRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function home(): Response
    {
        $form = $this->createFormBuilder()
            ->add('name', TextType::class)
            ->add('country', EntityType::class, [
                'class' => Country::class,
                'choice_label' => 'name',
                'placeholder' => 'Please choose a country',
                'query_builder' => function (CountryRepository $countryRepo) {
                    return $countryRepo->createQueryBuilder('c')->orderBy('c.name', 'ASC');
                }
            ])
            ->add('city', EntityType::class, [
                'class' => City::class,
                'choice_label' => 'name',
                'placeholder' => 'Please choose a city',
                'disabled' => true,
                'query_builder' => function (CityRepository $cityRepo) {
                    return $cityRepo->createQueryBuilder('c')->orderBy('c.name', 'ASC');
                }
            ])
            ->add('message', TextareaType::class)
            ->getForm();

        return $this->renderForm('layouts/home.html.twig', [
            'form' => $form,
        ]);
    }
}