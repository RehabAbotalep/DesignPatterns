<?php
namespace Behavioral\TemplateMethod;

abstract class CaffeineBeverage
{
    private array $recipeSteps;

    final public function prepareRecipe(): string
    {
        $this->recipeSteps[] = $this->boilWater();
        $this->recipeSteps[] = $this->brew();
        $this->recipeSteps[] = $this->pourInCup();
        $this->recipeSteps[] = $this->addCondiments();
        return implode(" ", $this->recipeSteps);
    }

    public function boilWater(): string
    {
        return "Boiling water";
    }

    public function pourInCup(): string
    {
        return "Pouring in cup";
    }

    abstract public function brew();
    abstract public function addCondiments();
}