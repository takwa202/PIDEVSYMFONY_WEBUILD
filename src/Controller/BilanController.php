<?php

namespace App\Controller;

use App\Entity\Bilan;
use App\Form\BilanType;
use App\Repository\BilanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/bilan')]
class BilanController extends AbstractController
{
    #[Route('/', name: 'app_bilan_index', methods: ['GET'])]
    public function index(BilanRepository $bilanRepository): Response
    {
        return $this->render('bilan/index.html.twig', [
            'bilans' => $bilanRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_bilan_new', methods: ['GET', 'POST'])]
    public function new(Request $request, BilanRepository $bilanRepository): Response
    {
        $bilan = new Bilan();
        $form = $this->createForm(BilanType::class, $bilan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bilanRepository->save($bilan, true);

            return $this->redirectToRoute('app_bilan_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bilan/new.html.twig', [
            'bilan' => $bilan,
            'form' => $form,
        ]);
    }

    #[Route('/{idBilan}', name: 'app_bilan_show', methods: ['GET'])]
    public function show(Bilan $bilan): Response
    {
        return $this->render('bilan/show.html.twig', [
            'bilan' => $bilan,
        ]);
    }

    #[Route('/{idBilan}/edit', name: 'app_bilan_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Bilan $bilan, BilanRepository $bilanRepository): Response
    {
        $form = $this->createForm(BilanType::class, $bilan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bilanRepository->save($bilan, true);

            return $this->redirectToRoute('app_bilan_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bilan/edit.html.twig', [
            'bilan' => $bilan,
            'form' => $form,
        ]);
    }

    #[Route('/{idBilan}', name: 'app_bilan_delete', methods: ['POST'])]
    public function delete(Request $request, Bilan $bilan, BilanRepository $bilanRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bilan->getIdBilan(), $request->request->get('_token'))) {
            $bilanRepository->remove($bilan, true);
        }

        return $this->redirectToRoute('app_bilan_index', [], Response::HTTP_SEE_OTHER);
    }
}
