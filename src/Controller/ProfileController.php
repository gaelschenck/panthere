<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TeamRepository;

#[Route('/profile', name: 'app_profile')]
class ProfileController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(TeamRepository $teamRepository ): Response
    {
        $member = $teamRepository->findAll();
        $organigram = $this->buildOrganigram($member, null);

        return $this->render('profile/index.html.twig', [
            'controller_name' => 'ProfileController',
            'team'=> $teamRepository->findAll(),
            'organigram' => $organigram,
            
            // 'teams' => $teamRepository->findBy([],['id' => 'asc']),
            // 'positions' => $positionRepository->findBy([],['id' => 'asc'])  
        ]);
    }    
  
    private function buildOrganigram(array $member, ?int $boss) : array
    {
        $organigram = [];
            foreach ($member as $employee){
                
                if ($employee->getBoss() === $boss) {
                    $subordinates = $this->buildOrganigram($member, $employee->getId());
                    $positions = [];
                    
                    foreach ($employee->getPositions() as $position){
                        $positions[] = $position->getLabel();
                    }
                    $employeeData = [
                        'id' => $employee->getId(),
                        'firstname' => $employee->getFirstname(),
                        'lastname' => $employee->getLastname(),
                        'position' => $positions,
                        'subordinates' => $subordinates, 
                        'age' => $employee->getAge(),
                        'adresse' => $employee->getAdresse(),
                        'tel' => $employee->getTel(),
                        'mail' => $employee->getMail(),
                        'cv' => $employee->getCv(),
                        'photo' => $employee->getPhoto(),
                    ];
                    $organigram[] = $employeeData;
                }
            }
        return $organigram;
    }
}
