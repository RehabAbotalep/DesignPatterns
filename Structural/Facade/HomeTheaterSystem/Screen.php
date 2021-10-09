<?php
namespace Structural\Facade\HomeTheaterSystem;

class Screen
{
    public function up(): string
    {
        return "Theater Screen going up";
    }

    public function down(): string
    {
        return "Theater Screen going down";
    }
}