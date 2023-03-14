<?php

namespace App\Controller;

use App\Entity\EtatCaisse;
use App\Form\EtatCaisseType;
use App\Repository\EtatCaisseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/etat/caisse')]
class EtatCaisseController extends AbstractController
{
    #[Route('/', name: 'app_etat_caisse_index', methods: ['GET'])]
    public function index(EtatCaisseRepository $etatCaisseRepository): Response
    {
        return $this->render('etat_caisse/index.html.twig', [
            'etat_caisses' => $etatCaisseRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_etat_caisse_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EtatCaisseRepository $etatCaisseRepository): Response
    {
        $etatCaisse = new EtatCaisse();
        $form = $this->createForm(EtatCaisseType::class, $etatCaisse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $etatCaisseRepository->save($etatCaisse, true);

            return $this->redirectToRoute('app_etat_caisse_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('etat_caisse/new.html.twig', [
            'etat_caisse' => $etatCaisse,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_etat_caisse_show', methods: ['GET'])]
    public function show(EtatCaisse $etatCaisse): Response
    {
        return $this->render('etat_caisse/show.html.twig', [
            'etat_caisse' => $etatCaisse,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_etat_caisse_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, EtatCaisse $etatCaisse, EtatCaisseRepository $etatCaisseRepository): Response
    {
        $form = $this->createForm(EtatCaisseType::class, $etatCaisse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $etatCaisseRepository->save($etatCaisse, true);

            return $this->redirectToRoute('app_etat_caisse_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('etat_caisse/edit.html.twig', [
            'etat_caisse' => $etatCaisse,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_etat_caisse_delete', methods: ['POST'])]
    public function delete(Request $request, EtatCaisse $etatCaisse, EtatCaisseRepository $etatCaisseRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$etatCaisse->getId(), $request->request->get('_token'))) {
            $etatCaisseRepository->remove($etatCaisse, true);
        }

        return $this->redirectToRoute('app_etat_caisse_index', [], Response::HTTP_SEE_OTHER);
    }
}
