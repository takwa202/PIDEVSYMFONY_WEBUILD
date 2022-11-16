<?php

namespace App\Controller;

use App\Entity\CommandeWeb;
use App\Form\CommandeWeb1Type;
use App\Repository\CommandeWebRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/commande/web')]
class CommandeWebController extends AbstractController
{
    #[Route('/', name: 'app_commande_web_index', methods: ['GET'])]
    public function index(CommandeWebRepository $commandeWebRepository): Response
    {
        return $this->render('commande_web/index.html.twig', [
            'commande_webs' => $commandeWebRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_commande_web_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CommandeWebRepository $commandeWebRepository): Response
    {
        $commandeWeb = new CommandeWeb();
        $form = $this->createForm(CommandeWeb1Type::class, $commandeWeb);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $commandeWebRepository->save($commandeWeb, true);

            return $this->redirectToRoute('app_commande_web_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('commande_web/new.html.twig', [
            'commande_web' => $commandeWeb,
            'form' => $form,
        ]);
    }

    #[Route('/{idComd}', name: 'app_commande_web_show', methods: ['GET'])]
    public function show(CommandeWeb $commandeWeb): Response
    {
        return $this->render('commande_web/show.html.twig', [
            'commande_web' => $commandeWeb,
        ]);
    }

    #[Route('/{idComd}/edit', name: 'app_commande_web_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CommandeWeb $commandeWeb, CommandeWebRepository $commandeWebRepository): Response
    {
        $form = $this->createForm(CommandeWeb1Type::class, $commandeWeb);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $commandeWebRepository->save($commandeWeb, true);

            return $this->redirectToRoute('app_commande_web_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('commande_web/edit.html.twig', [
            'commande_web' => $commandeWeb,
            'form' => $form,
        ]);
    }

    #[Route('/{idComd}', name: 'app_commande_web_delete', methods: ['POST'])]
    public function delete(Request $request, CommandeWeb $commandeWeb, CommandeWebRepository $commandeWebRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$commandeWeb->getIdComd(), $request->request->get('_token'))) {
            $commandeWebRepository->remove($commandeWeb, true);
        }

        return $this->redirectToRoute('app_commande_web_index', [], Response::HTTP_SEE_OTHER);
    }
}
