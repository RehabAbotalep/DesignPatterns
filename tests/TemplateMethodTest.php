<?php

use Behavioral\TemplateMethod\Coffee;
use Behavioral\TemplateMethod\Tea;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../vendor/autoload.php';

class TemplateMethodTest extends TestCase
{
    public function testTeaRecipeAlgorithm()
    {
        $tea = new Tea();
        $teaRecipe = $tea->prepareRecipe();
        self::assertStringContainsString("Steeping the tea", $teaRecipe);
        self::assertStringContainsString("Adding lemon", $teaRecipe);
        self::assertStringNotContainsString("Adding sugar and milk", $teaRecipe);
        self::assertStringNotContainsString("Dripping Coffee through filter", $teaRecipe);
    }

    public function testCoffeeRecipeAlgorithm()
    {
        $coffee = new Coffee();
        $coffeeRecipe = $coffee->prepareRecipe();
        self::assertStringContainsString("Dripping Coffee through filter", $coffeeRecipe);
        self::assertStringContainsString("Adding sugar and milk", $coffeeRecipe);
        self::assertStringNotContainsString("Adding lemon", $coffeeRecipe);
        self::assertStringNotContainsString("Steeping the tea", $coffeeRecipe);

    }
}