<?php

namespace App\Controller;

use App\Entity\EtatProduit;
use App\Form\EtatProduitType;
use App\Repository\EtatProduitRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/etat/produit')]
class EtatProduitController extends AbstractController
{
    #[Route('/', name: 'app_etat_produit_index', methods: ['GET'])]
    public function index(EtatProduitRepository $etatProduitRepository): Response
    {
        return $this->render('etat_produit/index.html.twig', [
            'etat_produits' => $etatProduitRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_etat_produit_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EtatProduitRepository $etatProduitRepository): Response
    {
        $etatProduit = new EtatProduit();
        $form = $this->createForm(EtatProduitType::class, $etatProduit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $etatProduit->setDatecreate(new DateTime("now"));
            $etatProduit->setUsercreate($this->getUser());
            $etatProduitRepository->save($etatProduit, true);

            return $this->redirectToRoute('app_etat_produit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('etat_produit/new.html.twig', [
            'etat_produit' => $etatProduit,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_etat_produit_show', methods: ['GET'])]
    public function show(EtatProduit $etatProduit): Response
    {
        return $this->render('etat_produit/show.html.twig', [
            'etat_produit' => $etatProduit,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_etat_produit_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, EtatProduit $etatProduit, EtatProduitRepository $etatProduitRepository): Response
    {
        $form = $this->createForm(EtatProduitType::class, $etatProduit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $etatProduit->setDateupdate(new DateTime("now"));
            $etatProduit->setUserupdate($this->getUser());
            $etatProduitRepository->save($etatProduit, true);

            return $this->redirectToRoute('app_etat_produit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('etat_produit/edit.html.twig', [
            'etat_produit' => $etatProduit,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_etat_produit_delete', methods: ['POST'])]
    public function delete(Request $request, EtatProduit $etatProduit, EtatProduitRepository $etatProduitRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$etatProduit->getId(), $request->request->get('_token'))) {
            $etatProduit->setDatedelete(new DateTime("now"));
            $etatProduit->setUserdelete($this->getUser());
            $etatProduitRepository->remove($etatProduit, true);
        }

        return $this->redirectToRoute('app_etat_produit_index', [], Response::HTTP_SEE_OTHER);
    }
}
