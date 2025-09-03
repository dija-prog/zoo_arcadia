<?php

namespace App\Controllers;

use App\Models\UserModel;

class LoginController
{
    private $userModel;

    //  Injection de dépendance : on peut passer un mock pour les tests unitaires
    public function __construct(UserModel $userModel = null)
    {
        $this->userModel = $userModel ?: new UserModel();
    }

    public function authenticate()
    {
        session_start();

        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        // Récupération de l'utilisateur via UserModel (mock ou vrai)
        $user = $this->userModel->getUserByUsername($username);

        if (!$user) {
            echo json_encode(['success' => false, 'message' => 'Utilisateur non trouvé']);
            return;
        }

        if (!password_verify($password, $user['password'])) {
            echo json_encode(['success' => false, 'message' => 'Mot de passe incorrect']);
            return;
        }

        // Authentification réussie
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role_id'];

        echo json_encode(['success' => true, 'role' => $user['role_id']]);
    }
}

// use PHPUnit\Framework\TestCase;

// use App\Controllers\LoginController;
// use App\Models\UserModel;


// class LoginTest extends TestCase
// {
//     private $controller;

//     protected function setUp(): void
//     {
//         // ⚠️ Tu peux mocker UserModel pour éviter d’appeler la vraie BDD
//         $mockUserModel = $this->createMock(UserModel::class);
//         $mockUserModel->method('getUserByUsername')
//             ->willReturn([
//                 'username' => 'john',
//                 'password' => password_hash('secret', PASSWORD_BCRYPT),
//                 'role_id'  => 1,
//                 'prenom'   => 'John',
//                 'nom'      => 'Doe'
//             ]);

//         $this->controller = new LoginController($mockUserModel);
//     }

//     public function testAuthenticateSuccess()
//     {
//         $_POST['username'] = 'john';
//         $_POST['password'] = 'secret';
//         $_POST['remember'] = 'on';

//         ob_start();
//         $this->controller->authenticate();
//         $output = ob_get_clean();

//         $data = json_decode($output, true);

//         $this->assertTrue($data['success']);
//         $this->assertEquals(1, $data['role']);
//         $this->assertArrayHasKey('username', $_SESSION);
//     }

//     public function testAuthenticateFailWrongPassword()
//     {
//         $_POST['username'] = 'john';
//         $_POST['password'] = 'wrong';

//         ob_start();
//         $this->controller->authenticate();
//         $output = ob_get_clean();

//         $data = json_decode($output, true);

//         $this->assertFalse($data['success']);
//         $this->assertEquals('Mot de passe incorrect', $data['message']);
//     }
// } -->



