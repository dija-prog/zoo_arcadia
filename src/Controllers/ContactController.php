<?php
namespace App\Controllers;

use App\Models\ContactModel;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;

class ContactController
{
    private $contactModel;

    public function __construct()
    {
        $this->contactModel = new ContactModel();
    }

    //Aficher le formulaire de contact 
    public function showForm()
    {
        require_once __DIR__ . '/../views/contact.php';
    }
    //gérer l'envoie du formualire 
    public function contactForm()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $titre = htmlspecialchars($_POST['titre']);
            $description = htmlspecialchars($_POST['description']);
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        
            if (empty($titre) || empty($email) || empty($description)) {
                echo "Le titre et le message doivent êtr remplis.";
                require_once __DIR__ . '/../views/contact.php';
                return;
            }

            // Ajouter dans la base de données
            $isInserted = $this->contactModel->addContact($titre,$email,$description);
            if($isInserted){
                //envoie de l'email
                try {
                    $transport = Transport::fromDsn($_ENV['MAILER_DSN']);
                    $mailer = new Mailer($transport);
        
                    $email = (new Email())
                        ->from($email)
                        ->to('aithamouk94@gmail.com')
                        ->subject('Nouvelle demande de contact:' . $titre)
                        ->text($description);
        
                    $mailer->send($email);
        
        
                    echo 'Email envoyé avec succès';
                } catch (\Exception $e) {
                    echo 'Erreur lors de l\'envoie de l\'email:', $e->getMessage();
                    echo 'code d\'erreur:' . $e->getCode();
                }
            }else {
                echo "Erreur lors dans la base de données.";
            }

            require_once __DIR__ . '/../views/contact.php';
            }
    
        }

    public function handleContact() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"), true);
            $errors = [];

            // Validation du titre
            if (empty($data['titre'])) {
                $errors['titre'] = 'Veuillez entrer un titre.';
            }

            // Validation de l'email
            if (empty($data['email'])||!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Veuillez entrer une adresse email valide.';
            }

            // Validation de la descriptio
            if (empty($data['description'])) {
                $errors['description'] = 'Veuillez entrer une description.';
            }

            // Si aucune erreur, traiter le formulaire
            if (empty($errors)) {
                // Traitement du formulaire (enregistrement en base de données, etc.)
                $response = [
                    'success' => true,
                    'message' => 'Message envoyé avec succès !'
                ];
            } else {
                // Renvoyer les erreurs
                $response = [
                    'success' => false,
                    'errors' => $errors
                ];
            }

            // Renvoyer la réponse en JSON
            header('Content-Type: application/json');
            echo json_encode($response);
            exit;
        }
    }
}
    
    

