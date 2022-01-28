<?php
namespace App\DataFixtures;

use App\Entity\Couleur;
use App\Entity\Departement;
use App\Entity\Identification;
use App\Entity\Poils;
use App\Entity\Sexe;
use App\Entity\Statut;
use App\Entity\Taille;
use App\Entity\TypeAnimal;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private UserPasswordEncoderInterface $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        //-------------------------------------------
        //USER
        //-------------------------------------------

        $user1 = new User();
        $user1->setEmail("admin@test.fr");
        $user1->setPseudo("admin");
        $user1->setNom("degerine");
        $user1->setPrenom("monique");
        $user1->setTelephone("0853478254");
        $user1->setRoles(["ROLE_ADMIN"]);
        $plainPassword = "123456";
        $encoded = $this->encoder->encodePassword($user1, $plainPassword);
        $user1->setPassword($encoded);
        $manager->persist($user1);


        //-------------------------------------------
        //IDENTIFICATION
        //-------------------------------------------

        $identification1 = new identification();
        $identification1->setLibelle('Tatouage');
        $manager->persist($identification1);

        $identification2 = new identification();
        $identification2->setLibelle('Puce Electronique');
        $manager->persist($identification2);

        $identification3 = new identification();
        $identification3->setLibelle('Je ne sais pas');
        $manager->persist($identification3);

        $identification4 = new identification();
        $identification4->setLibelle('Aucune');
        $manager->persist($identification4);

        //-------------------------------------------
        //POILS
        //-------------------------------------------

        $poils1 = new poils();
        $poils1->setLibelle('Courts');
        $manager->persist($poils1);

        $poils2 = new poils();
        $poils2->setLibelle('Long');
        $manager->persist($poils2);

        $poils3 = new poils();
        $poils3->setLibelle('Mi-longs');
        $manager->persist($poils3);

        $poils4 = new poils();
        $poils4->setLibelle('Raides');
        $manager->persist($poils4);

        $poils5 = new poils();
        $poils5->setLibelle('Frisés');
        $manager->persist($poils5);

        $poils6 = new poils();
        $poils6->setLibelle('Aucun');
        $manager->persist($poils6);


        //-------------------------------------------
        //COULEUR
        //-------------------------------------------

        $couleur1 = new couleur();
        $couleur1->setLibelle('Blanc');
        $manager->persist($couleur1);

        $couleur2 = new couleur();
        $couleur2->setLibelle('Noir');
        $manager->persist($couleur2);

        $couleur3 = new couleur();
        $couleur3->setLibelle('Marron');
        $manager->persist($couleur3);

        $couleur4 = new couleur();
        $couleur4->setLibelle('Gris');
        $manager->persist($couleur4);

        $couleur5 = new couleur();
        $couleur5->setLibelle('Beige');
        $manager->persist($couleur5);

        $couleur6 = new couleur();
        $couleur6->setLibelle('Tricolor');
        $manager->persist($couleur6);


        //-------------------------------------------
        //SEXE
        //-------------------------------------------

        $sexe1 = new Sexe();
        $sexe1->setLibelle('Femelle');
        $manager->persist($sexe1);

        $sexe2 = new Sexe();
        $sexe2->setLibelle('Male');
        $manager->persist($sexe2);

        $sexe3 = new Sexe();
        $sexe3->setLibelle('Je ne sais pas');
        $manager->persist($sexe3);

        //-------------------------------------------
        //STATUT
        //-------------------------------------------

        $statut1 = new statut();
        $statut1->setLibelle('Perdu');
        $manager->persist($statut1);

        $statut2 = new statut();
        $statut2->setLibelle('Trouvé');
        $manager->persist($statut2);

        $statut3 = new statut();
        $statut3->setLibelle('Aperçu');
        $manager->persist($statut3);

        //-------------------------------------------
        //TAILLE
        //-------------------------------------------

        $taille1 = new taille();
        $taille1->setLibelle('Petit');
        $manager->persist($taille1);

        $taille2 = new taille();
        $taille2->setLibelle('Moyen');
        $manager->persist($taille2);

        $taille3 = new taille();
        $taille3->setLibelle('Grand');
        $manager->persist($taille3);

        //-------------------------------------------
        //TYPE ANIMAL
        //-------------------------------------------

        $typeAnimal1 = new typeAnimal();
        $typeAnimal1->setLibelle('Chien');
        $manager->persist($typeAnimal1);

        $typeAnimal2 = new typeAnimal();
        $typeAnimal2->setLibelle('Chat');
        $manager->persist($typeAnimal2);

        $typeAnimal3 = new typeAnimal();
        $typeAnimal3->setLibelle('Lapin');
        $manager->persist($typeAnimal3);

        $typeAnimal4 = new typeAnimal();
        $typeAnimal4->setLibelle('Tortue');
        $manager->persist($typeAnimal4);

        $typeAnimal5 = new typeAnimal();
        $typeAnimal5->setLibelle('Cochon d inde');
        $manager->persist($typeAnimal5);

        $typeAnimal6 = new typeAnimal();
        $typeAnimal6->setLibelle('Rongeur');
        $manager->persist($typeAnimal6);

        $typeAnimal7 = new typeAnimal();
        $typeAnimal7->setLibelle('Poule');
        $manager->persist($typeAnimal7);

        $typeAnimal8 = new typeAnimal();
        $typeAnimal8->setLibelle('Coq');
        $manager->persist($typeAnimal8);

        $typeAnimal9 = new typeAnimal();
        $typeAnimal9->setLibelle('Canard');
        $manager->persist($typeAnimal9);

        $typeAnimal10 = new typeAnimal();
        $typeAnimal10->setLibelle('Agneau');
        $manager->persist($typeAnimal10);

        $typeAnimal11 = new typeAnimal();
        $typeAnimal11->setLibelle('Mouton');
        $manager->persist($typeAnimal11);

        $typeAnimal12 = new typeAnimal();
        $typeAnimal12->setLibelle('Bouc');
        $manager->persist($typeAnimal12);

        $typeAnimal13 = new typeAnimal();
        $typeAnimal13->setLibelle('Chevre');
        $manager->persist($typeAnimal13);

        $typeAnimal14 = new typeAnimal();
        $typeAnimal14->setLibelle('Cheval');
        $manager->persist($typeAnimal14);

        $typeAnimal15 = new typeAnimal();
        $typeAnimal15->setLibelle('Poney');
        $manager->persist($typeAnimal15);

        $typeAnimal16 = new typeAnimal();
        $typeAnimal16->setLibelle('Vache');
        $manager->persist($typeAnimal16);

        $typeAnimal17 = new typeAnimal();
        $typeAnimal17->setLibelle('Taureau');
        $manager->persist($typeAnimal17);

        $typeAnimal18 = new typeAnimal();
        $typeAnimal18->setLibelle('Oiseau');
        $manager->persist($typeAnimal18);

        $typeAnimal19 = new typeAnimal();
        $typeAnimal19->setLibelle('Reptile');
        $manager->persist($typeAnimal19);


        $manager->flush();

    }
}

