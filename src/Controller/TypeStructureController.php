<?php

namespace App\Controller;

use App\Entity\TypeStructure;
use App\Form\TypeStructureType;
use App\Repository\TypeStructureRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/type/structure')]
class TypeStructureController extends AbstractController
{
    #[Route('/', name: 'app_type_structure_index', methods: ['GET'])]
    public function index(TypeStructureRepository $typeStructureRepository): Response
    {
        return $this->render('type_structure/index.html.twig', [
            'type_structures' => $typeStructureRepository->findBy(array('statut'=>1)),
        ]);
    }

    #[Route('/new', name: 'app_type_structure_new', methods: ['GET', 'POST'])]
    public function new(Request $request, TypeStructureRepository $typeStructureRepository): Response
    {
        $typeStructure = new TypeStructure();
        $form = $this->createForm(TypeStructureType::class, $typeStructure);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typeStructure->setUsercreate($this->getUser());
            $typeStructure->setDatecreate(new DateTime('now'));
            $typeStructure->setStatut(1);
            $typeStructureRepository->save($typeStructure, true);
            /*$typeStructure->setUsercreate($this->getUser());
            $typeStructure->setDatecreate(new DateTime('now'));
            $typeStructure->setStatut(1);*/


            return $this->redirectToRoute('app_type_structure_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_structure/new.html.twig', [
            'type_structure' => $typeStructure,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_type_structure_show', methods: ['GET'])]
    public function show(TypeStructure $typeStructure): Response
    {
        return $this->render('type_structure/show.html.twig', [
            'type_structure' => $typeStructure,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_type_structure_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TypeStructure $typeStructure, TypeStructureRepository $typeStructureRepository): Response
    {
        $form = $this->createForm(TypeStructureType::class, $typeStructure);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $typeStructure->setUserupdate($this->getUser());
            $typeStructure->setDateupdate(new DateTime('now'));

            $typeStructureRepository->save($typeStructure, true);

            return $this->redirectToRoute('app_type_structure_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_structure/edit.html.twig', [
            'type_structure' => $typeStructure,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_type_structure_delete', methods: ['POST'])]
    public function delete(Request $request, TypeStructure $typeStructure, TypeStructureRepository $typeStructureRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeStructure->getId(), $request->request->get('_token'))) {

            $typeStructure->setUserdelete($this->getUser());
            $typeStructure->setDatedelete(new DateTime('now'));
            $typeStructure->setStatut(0);
            $typeStructureRepository->save($typeStructure, true);
        }

        return $this->redirectToRoute('app_type_structure_index', [], Response::HTTP_SEE_OTHER);
    }
}
