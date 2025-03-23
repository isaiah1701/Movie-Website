<?php

namespace App\Controller;

use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Movie;
use App\Form\MovieFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class MovieController extends AbstractController

{

    private $em;

    private $movieRepository;

    public function __construct( MovieRepository $movieRepository,EntityManagerInterface $em){

           $this->movieRepository = $movieRepository;

           $this->em = $em;

    }



  

   


    #[Route('/movies/{id}', methods: ['GET'], name: 'show_movie')]
    public function show($id): Response
    {
        $movie = $this->movieRepository->find($id);
        
        return $this->render('movies/show.html.twig', [
            'movie' => $movie
        ]);
    }


    //route with path of movie
    #[Route('/movies', methods:['GET'],name: 'movies')]
    public function index(): Response
  {
  
  
      $movies = $this->movieRepository->findAll();
      
     
   
  return $this->render('movies/index.html.twig', [
      'movies' => $movies
  ]);


}

 


#[Route('/', methods:['GET'],name: 'index')]
    public function myindex(): Response
  {
  
  
      $movies = $this->movieRepository->findAll();
      
     
   
  return $this->render('movies/index.html.twig', [  //displays page 
      'movies' => $movies
  ]);
}







  #[Route('/movies/delete/{id}', methods:['GET','DELETE'],name: 'delete_movie')] 
    public function delete($id): Response{

        $movie = $this->movieRepository->find($id); 
        $this->em->remove($movie);  

        $this->em->flush();

        return $this->redirectToRoute('movies');

        



        
    }

    #[Route('/movies/update/{id}', name:'update_movie')]
    public function update($id, Request $request): Response {
        $movie = $this->movieRepository->find($id); 
        $form = $this->createForm(MovieFormType::class, $movie);    
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $ImagePath = $form->get('ImagePath')->getData(); // Assuming 'ImagePath' is the correct field name
    
            if ($ImagePath) {
                $originalFilename = pathinfo($ImagePath->getClientOriginalName(), PATHINFO_FILENAME);
                $newFilename = $originalFilename . '-' . uniqid() . '.' . $ImagePath->guessExtension();
    
                try {
                    $ImagePath->move(
                        $this->getParameter('kernel.project_dir') . '/public/uploads',
                        $newFilename
                    );
                } catch (FileException $e) {
                    // Handle the exception if something happens during file upload
                    // You could log the error and add a flash message here
                    return new Response($e->getMessage());
                }
    
                // Update the 'ImagePath' property to store the new file path
                $movie->setImagePath('/uploads/' . $newFilename);
            }
    
            // Update other fields regardless of image upload
            $movie->setTitle($form->get('title')->getData());
            $movie->setDirector($form->get('director')->getData()); 
            $movie->setRunningTime($form->get('RunningTime')->getData());
            $movie->setReviewer($form->get('reviewer')->getData()); 
            $movie->setReview($form->get('review')->getData());
    
            $this->em->flush();
            return $this->redirectToRoute('movies');
        }
    
        return $this->render('movies/edit.html.twig', [
            'movie' => $movie,
            'form' => $form->createView()
        ]);
    }
    

    #[Route('/create', name: 'create_movie')]
    public function create(Request $request): Response
    {
        $movie = new Movie();
        $form = $this->createForm(MovieFormType::class, $movie);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {  //CHECk if form is valid
            $newMovie = $form->getData();
            $image_path = $form->get('image_path')->getData();
            
            if ($image_path) {
                $newFileName = uniqid() . '.' . $image_path->guessExtension();

                try {
                    $image_path->move(
                        $this->getParameter('kernel.project_dir') . '/public/uploads',
                        $newFileName
                    );
                } catch (FileException $e) {
                    return new Response($e->getMessage());
                }
               
                $newMovie->setimage_path('/uploads/' . $newFileName);
            }

            $this->em->persist($newMovie);
            $this->em->flush();

            return $this->redirectToRoute('movies');
        }

        return $this->render('movies/create.html.twig', [
            
            
            
            'form' => $form->createView()   //creates view, display form 


        ]);
    }
    

     


       

       

    
}


   





    
   

    

