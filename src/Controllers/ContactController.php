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
            $titre = trim($_POST['titre']);
            $description = trim($_POST['description']);
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        
            if (empty($titre) || empty($email) || empty($description)) {
                $message= "Le titre et le message doivent êtr remplis.";
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
        
        
                    $message= 'Email envoyé avec succès';
                } catch (\Exception $e) {
                    error_log($e->getMessage()); // log technique
                    $message = "Erreur lors de l'envoi de l'email. Veuillez réessayer.";
                }
            }else {
                $message="echo Erreur lors dans la base de données.";
            }

            require_once __DIR__ . '/../views/contact.php';
            }
    
        }

    public function handleContact() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents("php://input"), true);
        $errors = [];

        // Validation
        if (empty($data['titre'])) {
            $errors['titre'] = 'Veuillez entrer un titre.';
        }
        if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Veuillez entrer une adresse email valide.';
        }
        if (empty($data['description'])) {
            $errors['description'] = 'Veuillez entrer une description.';
        }

        if (empty($errors)) {
            // Insertion en base
            $isInserted = $this->contactModel->addContact(
                $data['titre'],
                $data['email'],
                $data['description']
            );

            if ($isInserted) {
                $response = [
                    'success' => true,
                    'message' => 'Message enregistré avec succès !'
                ];
            } else {
                $response = [
                    'success' => false,
                    'errors' => ['db' => 'Erreur lors de l’enregistrement en base de données.']
                ];
            }

        } else {
            $response = [
                'success' => false,
                'errors' => $errors
            ];
        }

        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
}

}
    
    

