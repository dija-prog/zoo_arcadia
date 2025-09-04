<?php
use PHPUnit\Framework\TestCase;
use App\Controllers\LoginController;
use App\Models\UserModel;

class LoginControllerIntegrationTest extends TestCase
{
    private $controller;
    private $mockUserModel;

    protected function setUp(): void
    {
        // Simulation du UserModel avec un utilisateur fictif
        $this->mockUserModel = $this->createMock(UserModel::class);
        $this->controller = new LoginController($this->mockUserModel);

        // Nettoyer superglobales avant chaque test
        $_POST = [];
        $_SESSION = [];
        $_COOKIE = [];
        setcookie('username', '', time() - 3600, "/");
    }

    public function testAuthenticateWithValidCredentialsAndRememberMe()
    {
        // Utilisateur fictif en DB
        $user = [
            'username' => 'testuser',
            'password' => password_hash('password123', PASSWORD_DEFAULT),
            'role_id' => 1,
            'prenom' => 'Jean',
            'nom' => 'Dupont'
        ];

        // Le mock renvoie cet utilisateur
        $this->mockUserModel
            ->method('getUserByUsername')
            ->willReturn($user);

        // Simulation d’un POST (formulaire rempli)
        $_POST['valider'] = true;
        $_POST['username'] = 'testuser';
        $_POST['password'] = 'password123';
        $_POST['remember'] = true;

        // On "attrape" les headers envoyés (redirections)
        $this->expectOutputRegex('/.*/'); // évite l’erreur de sortie vide
        try {
            $this->controller->authenticate();
        } catch (\Exception $e) {
            // On ignore l’exception liée à `exit` dans le code
        }

        // Vérifie la session
        $this->assertEquals('testuser', $_SESSION['username']);
        $this->assertEquals(1, $_SESSION['role']);

        // Vérifie que le cookie remember est bien défini
        $this->assertEquals('testuser', $_COOKIE['username']);
    }

    public function testAuthenticateWithWrongPassword()
    {
        $user = [
            'username' => 'testuser',
            'password' => password_hash('password123', PASSWORD_DEFAULT),
            'role_id' => 2,
            'prenom' => 'Alice',
            'nom' => 'Martin'
        ];

        $this->mockUserModel
            ->method('getUserByUsername')
            ->willReturn($user);

        $_POST['valider'] = true;
        $_POST['username'] = 'testuser';
        $_POST['password'] = 'wrongpassword';

        ob_start();
        $this->controller->authenticate();
        $output = ob_get_clean();

        // Vérifie que l’erreur "Mot de passe incorrect." est affichée
        $this->assertStringContainsString("Mot de passe incorrect", $output);
    }

    public function testAuthenticateWithUnknownUser()
    {
        $this->mockUserModel
            ->method('getUserByUsername')
            ->willReturn(null);

        $_POST['valider'] = true;
        $_POST['username'] = 'ghost';
        $_POST['password'] = 'whatever';

        ob_start();
        $this->controller->authenticate();
        $output = ob_get_clean();

        $this->assertStringContainsString("Utilisateur non trouvé", $output);
    }
}
