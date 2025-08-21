<?php
namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Controllers\AnimalController;
use App\Models\AnimalModel;

class AnimalControllerTest extends TestCase
{
    public function testProcessAddAnimalSuccess(): void
    {
        // On simule le modèle
        $mockModel = $this->createMock(AnimalModel::class);
        $mockModel->method('addAnimal')->willReturn(true);

        // On injecte le modèle simulé dans le contrôleur
        $controller = new AnimalController($mockModel);

        $data = [
            'animal_nom' => 'Lion',
            'id_classe'  => 1,
            'habitat_id' => 2
        ];

        $this->assertTrue($controller->processAddAnimal($data));
    }

    public function testProcessAddAnimalFailsWithMissingData(): void
    {
        $mockModel = $this->createMock(AnimalModel::class);
        $controller = new AnimalController($mockModel);

        $data = [
            'animal_nom' => '', // manquant
            'id_classe'  => 1,
            'habitat_id' => 2
        ];

        $this->assertFalse($controller->processAddAnimal($data));
    }
}
