<?php

namespace App\Controller;

use App\Entity\Category;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/category', name: 'app_category')]
    public function listAction(ManagerRegistry $doctrine): Response
    {
        $categories = $doctrine->getRepository('App\Entity\Category')->findAll();
        return $this->render('category/index.html.twig', [
            'categories'=>$categories
        ]);
    }

    #[Route('/category/delete/{id}', name: 'category_delete')]
    public function deleteAction(ManagerRegistry $doctrine, $id): Response
    {
        $em = $doctrine->getManager();
        $categories = $em->getRepository('App\Entity\Category')->find($id);
        $em->remove($categories);
        $em->flush();

        $this->addFlash(
            'error',
            'Category deleted'
        );
        return $this->redirectToRoute('app_category');
    }
}
