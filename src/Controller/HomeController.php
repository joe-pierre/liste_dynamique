<?php

namespace App\Controller;

use App\Entity\City;
use App\Entity\Country;
use App\Repository\CityRepository;
use App\Repository\CountryRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function home(Request $request): Response
    {
        $form = $this->createFormBuilder()
            ->add('name', TextType::class, [
                'constraints' => new NotBlank(),
            ])
            ->add('country', EntityType::class, [
                'class' => Country::class,
                'choice_label' => 'name',
                'placeholder' => 'Please choose a country',
                'query_builder' => function (CountryRepository $countryRepo) {
                    return $countryRepo->createQueryBuilder('c')->orderBy('c.name', 'ASC');
                },
                'constraints' => new NotBlank(['message'=>'Please choose a country']),
            ])
            ->add('city', EntityType::class, [
                'class' => City::class,
                'choice_label' => 'name',
                'placeholder' => 'Please choose a city',
                'disabled' => true,
                'query_builder' => function (CityRepository $cityRepo) {
                    return $cityRepo->createQueryBuilder('c')->orderBy('c.name', 'ASC');
                },
                'constraints' => new NotBlank(['message'=>'Please choose a city']),
            ])
            ->add('message', TextareaType::class, [
                'constraints' => [
                    new NotBlank(),
                    new Length(['min' => 5])
                ]
            ])
            ->getForm()
        ;

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            dd('cool');
        }
        
        return $this->renderForm('layouts/home.html.twig', [
            'form' => $form,
        ]);
    }
}