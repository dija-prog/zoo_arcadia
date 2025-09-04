<?php
use PHPUnit\Framework\TestCase;
use App\Controllers\LoginController;
use App\Models\UserModel;

class LoginControllerTest extends TestCase
{
    private $controller;
    private $mockUserModel;

    protected function setUp(): void
    {
        // Mock du UserModel pour ne pas toucher à la vraie DB
        $this->mockUserModel = $this->createMock(UserModel::class);

        // Instanciation du controller avec le mock
        $this->controller = new LoginController($this->mockUserModel);
    }

    public function testAuthenticateSuccess()
    {
        // Préparer un utilisateur fictif avec mot de passe hashé
        $user = [
            'username' => 'testuser',
            'password' => password_hash('password123', PASSWORD_DEFAULT),
            'role_id' => 1,
            'prenom' => 'Test',
            'nom' => 'User'
        ];

        // Le mock renverra cet utilisateur quand getUserByUsername est appelé
        $this->mockUserModel
            ->method('getUserByUsername')
            ->with('testuser')
            ->willReturn($user);

        // Appel de la méthode à tester
        $result = $this->controller->checkCredentials('testuser', 'password123');

        // Vérification du résultat
        $this->assertTrue($result['success']);
        $this->assertEquals(1, $result['role']);
    }

    public function testAuthenticateFailure()
    {
        // Le mock renvoie null pour un utilisateur inconnu
        $this->mockUserModel
            ->method('getUserByUsername')
            ->with('wronguser')
            ->willReturn(null);

        $result = $this->controller->checkCredentials('wronguser', 'password123');

        $this->assertFalse($result['success']);
    }

    public function testWrongPassword()
    {
        $user = [
            'username' => 'testuser',
            'password' => password_hash('password123', PASSWORD_DEFAULT),
            'role_id' => 2,
            'prenom' => 'Test',
            'nom' => 'User'
        ];

        $this->mockUserModel
            ->method('getUserByUsername')
            ->with('testuser')
            ->willReturn($user);

        $result = $this->controller->checkCredentials('testuser', 'wrongpassword');

        $this->assertFalse($result['success']);
    }
}
