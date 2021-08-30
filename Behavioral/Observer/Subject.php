<?php
namespace Behavioral\Observer;

interface Subject
{
    public function register(Observer $observer);
    public function remove(Observer $observer);
    public function notify();
}