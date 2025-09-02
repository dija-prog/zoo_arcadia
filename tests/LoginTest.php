<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../app/controllers/LoginController.php';
require_once __DIR__ . '/../app/models/UserModel.php';

class LoginTest extends TestCase
{
    private $controller;

    protected function setUp(): void
    {
        // ⚠️ Tu peux mocker UserModel pour éviter d’appeler la vraie BDD
        $mockUserModel = $this->createMock(UserModel::class);
        $mockUserModel->method('getUserByUsername')
            ->willReturn([
                'username' => 'john',
                'password' => password_hash('secret', PASSWORD_BCRYPT),
                'role_id'  => 1,
                'prenom'   => 'John',
                'nom'      => 'Doe'
            ]);

        $this->controller = new LoginController($mockUserModel);
    }

    public function testAuthenticateSuccess()
    {
        $_POST['username'] = 'john';
        $_POST['password'] = 'secret';
        $_POST['remember'] = 'on';

        ob_start();
        $this->controller->authenticate();
        $output = ob_get_clean();

        $data = json_decode($output, true);

        $this->assertTrue($data['success']);
        $this->assertEquals(1, $data['role']);
        $this->assertArrayHasKey('username', $_SESSION);
    }

    public function testAuthenticateFailWrongPassword()
    {
        $_POST['username'] = 'john';
        $_POST['password'] = 'wrong';

        ob_start();
        $this->controller->authenticate();
        $output = ob_get_clean();

        $data = json_decode($output, true);

        $this->assertFalse($data['success']);
        $this->assertEquals('Mot de passe incorrect', $data['message']);
    }
}
