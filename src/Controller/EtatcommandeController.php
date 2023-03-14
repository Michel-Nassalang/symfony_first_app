<?php

namespace App\Controller;

use App\Entity\Etatcommande;
use App\Form\EtatcommandeType;
use App\Repository\EtatcommandeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/etatcommande')]
class EtatcommandeController extends AbstractController
{
    #[Route('/', name: 'app_etatcommande_index', methods: ['GET'])]
    public function index(EtatcommandeRepository $etatcommandeRepository): Response
    {
        return $this->render('etatcommande/index.html.twig', [
            'etatcommandes' => $etatcommandeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_etatcommande_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EtatcommandeRepository $etatcommandeRepository): Response
    {
        $etatcommande = new Etatcommande();
        $form = $this->createForm(EtatcommandeType::class, $etatcommande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $etatcommandeRepository->save($etatcommande, true);

            return $this->redirectToRoute('app_etatcommande_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('etatcommande/new.html.twig', [
            'etatcommande' => $etatcommande,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_etatcommande_show', methods: ['GET'])]
    public function show(Etatcommande $etatcommande): Response
    {
        return $this->render('etatcommande/show.html.twig', [
            'etatcommande' => $etatcommande,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_etatcommande_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Etatcommande $etatcommande, EtatcommandeRepository $etatcommandeRepository): Response
    {
        $form = $this->createForm(EtatcommandeType::class, $etatcommande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $etatcommandeRepository->save($etatcommande, true);

            return $this->redirectToRoute('app_etatcommande_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('etatcommande/edit.html.twig', [
            'etatcommande' => $etatcommande,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_etatcommande_delete', methods: ['POST'])]
    public function delete(Request $request, Etatcommande $etatcommande, EtatcommandeRepository $etatcommandeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$etatcommande->getId(), $request->request->get('_token'))) {
            $etatcommandeRepository->remove($etatcommande, true);
        }

        return $this->redirectToRoute('app_etatcommande_index', [], Response::HTTP_SEE_OTHER);
    }
}
