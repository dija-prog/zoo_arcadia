<?php
use PHPUnit\Framework\TestCase;
use App\Controllers\LoginController;
use App\Models\UserModel;

class LoginTest extends TestCase
{
    private $controller;

    protected function setUp(): void
    {
        $mockUserModel = $this->createMock(UserModel::class);
        $mockUserModel->method('getUserByUsername')
            ->willReturn([
                'username' => 'john',
                'password' => password_hash('secret', PASSWORD_BCRYPT),
                'role_id'  => 1
            ]);

        $this->controller = new LoginController($mockUserModel);
    }

    public function testCheckCredentialsSuccess()
    {
        $result = $this->controller->checkCredentials('john', 'secret');
        $this->assertTrue($result['success']);
        $this->assertEquals(1, $result['role']);
    }

    public function testCheckCredentialsFail()
    {
        $result = $this->controller->checkCredentials('john', 'wrong');
        $this->assertFalse($result['success']);
    }
}
