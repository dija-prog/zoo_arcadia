<?php 
namespace App\Controllers;


use App\Models\AnimalModel;
use App\Models\UserModel;
use App\Models\ServiceModel;
use App\Models\RapportModel;
use App\Models\VeterinaireModel;
use App\Models\ViewsModel;
use PDOException;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;



class AdminController
{    
    private $userModel;
    private $animalModel;
    private $viewsModel;
    
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->viewsModel = new ViewsModel();
    }

    public function index()
    {
        session_start();
        // vérification de la session
        if (!isset($_SESSION['username']) || $_SESSION['role'] != '1') {
            header('Location:/login');
            exit;
        }
        
        //charger les models
        $userModel = new UserModel();
        $animalModel = new AnimalModel();
        $serviceModel = new ServiceModel();
        $rapportModel = new RapportModel();
        $veterinaireModel = new VeterinaireModel();
        $viewsModel = new ViewsModel();
        
        
        
        $animalId = isset($_GET['animal_id']) ? intval($_GET['animal_id']) : null;
        $serviceId = isset($_GET['service_id']) ? intval($_GET['service_id']) : null;
        $username = isset($_GET['username']) ? filter_var($_GET['username'], FILTER_SANITIZE_EMAIL) : null;

        //gestion des tri
        $order = 'DESC';
        if(isset($_GET['order'])){
            $order = $_GET['order'] === 'ASC' ? 'ASC' : 'DESC';
            
        }

        // Récupérer les données 
        
        $users = $userModel->getNonAdminUsers();
        $animals = $animalModel->getAnimals();
        $services = $serviceModel->getServices();    
        $rapports = $rapportModel->getRapports(); 
        // $requests = $rapportModel->getRapportJoinAnimal( $animalId,$order); 
        $rows = $animalModel->getAnimalsJoin();
        $req = $animalModel->deleteAnimal($animalId);
        $req = $userModel -> deleteUser($username);
        $sql = $serviceModel -> deleteService($serviceId);

        //inclure la vue avec les données 

        require_once __DIR__ . '/../views/admin.php';
    }

    public function addUserWithEmail()
    {   
    
        if ($_SERVER["REQUEST_METHOD"] === "POST")  
        {
            //Récupérer les données du formulaire
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $role_id =$_POST['role_id'];
            $username =$_POST['username'];
            $password =password_hash($_POST['password'], PASSWORD_DEFAULT);


            if ($this->userModel->addUser($nom, $prenom, $role_id, $username, $password)) {
                // Envoi d'email si l'utilisateur est ajouté avec succès
                $this->sendEmail($nom, $prenom, $username, $role_id, $password);
                header('Location: /admin#usertable');
                exit;
            } else {
                echo "Erreur lors de l'ajout de l'utilisateur.";
            }
            
        }
        require_once __DIR__ . '/../views/CRUD/addUser.php';
    }


    public function sendEmail($nom, $prenom, $username, $role_id,$password)
    {
        
            try {
                $transport = Transport::fromDsn($_ENV['MAILER_DSN']); 
                $mailer = new Mailer($transport);

                $email = (new Email())
                    ->from('aithamouk94@gmail.com')
                    ->to($username)
                    ->subject('Création de compte')
                    ->text("Bonjour $prenom $nom,\n\nVotre compte a été créé avec succès. Veuillez contacter l'administrateur pour plus d'informations.");

                $mailer->send($email);
            } catch (PDOException $e) {
                throw new \Exception("Erreur lors de l'envoi de l'e-mail : " . $e->getMessage());
            }
    
    }

    public function ShowAnimalsStatics($animal_id = null) {
        // Récupérer les statistiques
        $viewsStats = $this->viewsModel->getAllViews();
        
        // Rendre la vue avec les données
        require_once '/../views/admin.php';
    }
    public function incrementView($animal_id) {
        $result = $this->viewsModel->incrementView($animal_id);
        return json_encode(['success' => $result]);
    }


    // public function incrementAnimalView() 
    // {
    //     $animalName = $_GET['animal_name'] ?? null; // Récupérer le nom via l'URL

    //     if ($animalName) 
    //     {
    //         $animal = $this->animalModel->getAnimalByName($animalName); // Vérifier si l'animal existe
    //         if ($animal)
    //         {
    //             $this->viewsModel->incrementViews($animalName); // Incrémentation dans MongoDB
                
    //             echo "Vues de $animalName mises à jour !";
    //         } else {
    //             echo "Animal introuvable.";
    //         }
    //     } else {
    //         echo "Nom de l'animal manquant.";
    //     }
    // }

    // Affiche le tableau de bord des vues
    // public function showDashboard() 
    // {
    //     $views = $this->viewsModel->getAnimalViews(); // Récupère les données MongoDB
        
    //     if (empty($views)) 
    //     {
    //         $message = "Aucune vue disponible pour le moment.";
    //     }
    
    //     include __DIR__ . '/../views/admin.php'; // Charge la vue
    // }


}
