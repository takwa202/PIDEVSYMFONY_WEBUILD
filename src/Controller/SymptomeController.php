<?php

namespace App\Controller;

use App\Entity\Symptome;
use App\Form\SymptomeType;
use App\Repository\SymptomeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/symptome')]
class SymptomeController extends AbstractController
{
    #[Route('/', name: 'app_symptome_index', methods: ['GET'])]
    public function index(SymptomeRepository $symptomeRepository): Response
    {
        return $this->render('symptome/index.html.twig', [
            'symptomes' => $symptomeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_symptome_new', methods: ['GET', 'POST'])]
    public function new(Request $request, SymptomeRepository $symptomeRepository): Response
    {
        $symptome = new Symptome();
        $form = $this->createForm(SymptomeType::class, $symptome);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $symptomeRepository->save($symptome, true);

            return $this->redirectToRoute('app_symptome_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('symptome/new.html.twig', [
            'symptome' => $symptome,
            'form' => $form,
        ]);
    }

    #[Route('/{idSym}', name: 'app_symptome_show', methods: ['GET'])]
    public function show(Symptome $symptome): Response
    {
        return $this->render('symptome/show.html.twig', [
            'symptome' => $symptome,
        ]);
    }

    #[Route('/{idSym}/edit', name: 'app_symptome_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Symptome $symptome, SymptomeRepository $symptomeRepository): Response
    {
        $form = $this->createForm(SymptomeType::class, $symptome);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $symptomeRepository->save($symptome, true);

            return $this->redirectToRoute('app_symptome_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('symptome/edit.html.twig', [
            'symptome' => $symptome,
            'form' => $form,
        ]);
    }

    #[Route('/{idSym}', name: 'app_symptome_delete', methods: ['POST'])]
    public function delete(Request $request, Symptome $symptome, SymptomeRepository $symptomeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$symptome->getIdSym(), $request->request->get('_token'))) {
            $symptomeRepository->remove($symptome, true);
        }

        return $this->redirectToRoute('app_symptome_index', [], Response::HTTP_SEE_OTHER);
    }
}
