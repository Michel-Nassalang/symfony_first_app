<?php

namespace App\Controller;

use App\Entity\EtatService;
use App\Form\EtatServiceType;
use App\Repository\EtatServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/etatservice')]
class EtatServiceController extends AbstractController
{
    #[Route('/', name: 'app_etat_service_index', methods: ['GET'])]
    public function index(EtatServiceRepository $etatServiceRepository): Response
    {
        return $this->render('etat_service/index.html.twig', [
            'etat_services' => $etatServiceRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_etat_service_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EtatServiceRepository $etatServiceRepository): Response
    {
        $etatService = new EtatService();
        $form = $this->createForm(EtatServiceType::class, $etatService);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $etatService->setStatutES(1);
            $etatService->setDatecreateES(new \DateTime("now"));
            $etatService->setUserCreateES($this->getUser());
            $etatServiceRepository->save($etatService, true);


            return $this->redirectToRoute('app_etat_service_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('etat_service/new.html.twig', [
            'etat_service' => $etatService,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_etat_service_show', methods: ['GET'])]
    public function show(EtatService $etatService): Response
    {
        return $this->render('etat_service/show.html.twig', [
            'etat_service' => $etatService,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_etat_service_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, EtatService $etatService, EtatServiceRepository $etatServiceRepository): Response
    {
        $form = $this->createForm(EtatServiceType::class, $etatService);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $etatServiceRepository->save($etatService, true);

            return $this->redirectToRoute('app_etat_service_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('etat_service/edit.html.twig', [
            'etat_service' => $etatService,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_etat_service_delete', methods: ['POST'])]
    public function delete(Request $request, EtatService $etatService, EtatServiceRepository $etatServiceRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$etatService->getId(), $request->request->get('_token'))) {
            $etatServiceRepository->remove($etatService, true);
        }

        return $this->redirectToRoute('app_etat_service_index', [], Response::HTTP_SEE_OTHER);
    }
}
