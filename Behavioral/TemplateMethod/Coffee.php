<?php
namespace Behavioral\TemplateMethod;

namespace Behavioral\TemplateMethod;


class Coffee extends CaffeineBeverage
{

    public function brew(): string
    {
        return "Dripping Coffee through filter";
    }

    public function addCondiments(): string
    {
        return "Adding sugar and milk";
    }
}