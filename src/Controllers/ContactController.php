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

    //Afiicher le formulaire de contact 
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
    }

?>