<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Entity\Equipo;

/**
 * @Route("/equipo")
 */
class EquipoController extends AbstractController
{
    /**
     * @Route("/lista", name="listaEquipo")
     */
    public function listaEquipo()
    {
        $repository = $this->getDoctrine()->getRepository(Equipo::class);
        $equipos = $repository->findAll();
        return $this->render(
            'equipo/lista.html.twig',
            [
                'equipos' => $equipos
            ]
        );
    }

    /**
     * @Route("/nuevo", name="nuevoEquipo")
     */
    public function nuevoEquipo()
    {
        return $this->render('home/home.html.twig');
    }
}
