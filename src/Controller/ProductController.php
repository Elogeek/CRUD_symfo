<?php

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/product', name: 'product_')]

class ProductController extends AbstractController {

    // To have it easier
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    // Add product in the db
    #[Route('/add', name: 'add')]
    public function addProduct(EntityManagerInterface $em) : Response {
      $p = new Product();
      $p
          ->setName('super nom')
          ->setShortDescription('cool')
          ->setDescription('description hyper longue')
          ->setAvailableQuantity(5)
          ->setPrice(1.50)
      ;

      $em->persist($p);

      // Enregistrement en dbb
      $em->flush();

      return $this->render('product/home.html.twig');
    }

    //Update a product
    #[Route('/update/{id}', name: 'update')]
    public function updateProduct(Product  $product, EntityManagerInterface $em): Response {
        $product->setPrice(1.68);
        $product->setName('Mon beau produit');

        $em->flush();

        return $this->render('product/home.html.twig');
    }

    //Delete a product
    #[Route('/delete/{id}', name: 'delete')]
    public function deleteProduct(Product $product, EntityManagerInterface $em): Response {
        $em->remove($product);
        $em->flush();
        return $this->render('');
    }

    // Read
    #[Route('/view/first', name: 'view_first')]
    public function viewSingleProduct(EntityManagerInterface $em): Response {
        $productRepository = $em->getRepository(Product::class);
        $product = $productRepository->find(1);
        return $this->render('product\home.html.twig', [
            'product' => $product,
        ]);
    }
}