<?php

namespace App\Controller;

use App\Repository\MaintenanceRepository;
use App\Repository\SuiviRepository;
use App\Repository\VehiculeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AnalyseController extends AbstractController
{
    #[Route('/analyse', name: 'app_analyse')]
    public function index( VehiculeRepository $vehicule,MaintenanceRepository $maintenance,SuiviRepository $suiviRep): Response
    {
        $totalVehicule =  $vehicule->count([]);
        $suivis = $suiviRep->findAll();
         $entretienProche = 0;
        $entretienDepasse = 0;

    foreach ($suivis as $suivi) {

        $ecart = $suivi->getProchainEntretien() - $suivi->getKilometrageActuel();

        if ($ecart < 0) {
            $entretienDepasse++;
        }

        if ($ecart >= 0 && $ecart <= 500) {
            $entretienProche++;
        }
    }


        $topPannes = $maintenance
        ->createQueryBuilder('m')
        ->select('v.id, v.immatriculation, v.marque, COUNT(m.id) as nbPannes')
        ->join('m.vehicule', 'v')
        ->groupBy('v.id')
        ->orderBy('nbPannes', 'DESC')
        ->setMaxResults(10)
        ->getQuery()
        ->getResult();


        // Coût maintenance
        $coutsMaintenance = $maintenance
            ->createQueryBuilder('m')
            ->select('v.immatriculation, SUM(m.cout) as total')
            ->join('m.vehicule', 'v')
            ->groupBy('v.id')
            ->getQuery()
            ->getResult();
        
        // Calcul du pourcentage pour les barres
    $max = 0;

    foreach ($coutsMaintenance as $item) {
        if ($item['total'] > $max) {
            $max = $item['total'];
        }
    }

    foreach ($coutsMaintenance as &$item) {
        $item['pourcentage'] = $max > 0
            ? ($item['total'] * 100 / $max)
            : 0;
    }


        return $this->render('analyse/index.html.twig', [
            'controller_name' => 'AnalyseController',
            'totalVehicules'=> $totalVehicule,
            'vehiculesDisponibles' =>1,
            'entretienProche' =>  $entretienProche,
            'entretienDepasse' => $entretienDepasse,
            'suivis' => $suivis,
            'coutsMaintenance' => $coutsMaintenance,
            'topPannes' => $topPannes,
        ]);
    }
}
