<?php
namespace Behavioral\TemplateMethod;

namespace Behavioral\TemplateMethod;


class Tea extends CaffeineBeverage
{

    public function brew(): string
    {
        return "Steeping the tea";
    }

    public function addCondiments(): string
    {
        return "Adding lemon";
    }
}