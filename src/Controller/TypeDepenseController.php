<?php

namespace App\Controller;

use App\Entity\TypeDepense;
use App\Form\TypeDepenseType;
use App\Repository\TypeDepenseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/type/depense')]
class TypeDepenseController extends AbstractController
{
    #[Route('/', name: 'app_type_depense_index', methods: ['GET'])]
    public function index(TypeDepenseRepository $typeDepenseRepository): Response
    {
        return $this->render('type_depense/index.html.twig', [
            'type_depenses' => $typeDepenseRepository->findBy(array('statut'=>1)),
        ]);
    }

    #[Route('/new', name: 'app_type_depense_new', methods: ['GET', 'POST'])]
    public function new(Request $request, TypeDepenseRepository $typeDepenseRepository): Response
    {
        $typeDepense = new TypeDepense();
        $form = $this->createForm(TypeDepenseType::class, $typeDepense);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typeDepense->setUsercreate($this->getUser()->getUsername());
            $typeDepense->setDatecreate(new \DateTime('now'));
            $typeDepense->setStatut(1);
            $typeDepenseRepository->save($typeDepense, true);

            return $this->redirectToRoute('app_type_depense_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_depense/new.html.twig', [
            'type_depense' => $typeDepense,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_type_depense_show', methods: ['GET'])]
    public function show(TypeDepense $typeDepense): Response
    {
        return $this->render('type_depense/show.html.twig', [
            'type_depense' => $typeDepense,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_type_depense_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TypeDepense $typeDepense, TypeDepenseRepository $typeDepenseRepository): Response
    {
        $form = $this->createForm(TypeDepenseType::class, $typeDepense);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typeDepense->setUserUpdate($this->getUser()->getUsername());
            $typeDepense->setDateUpdate(new \DateTime('now'));
            $typeDepense->setStatut(1);
            $typeDepenseRepository->save($typeDepense, true);

            return $this->redirectToRoute('app_type_depense_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_depense/edit.html.twig', [
            'type_depense' => $typeDepense,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_type_depense_delete', methods: ['POST'])]
    public function delete(Request $request, TypeDepense $typeDepense, TypeDepenseRepository $typeDepenseRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeDepense->getId(), $request->request->get('_token'))) {
            $typeDepense->setUserDelete($this->getUser()->getUsername());
            $typeDepense->setDateDelete(new \DateTime('now'));
            $typeDepense->setStatut(0);
            $typeDepenseRepository->remove($typeDepense, true);
        }

        return $this->redirectToRoute('app_type_depense_index', [], Response::HTTP_SEE_OTHER);
    }
}
