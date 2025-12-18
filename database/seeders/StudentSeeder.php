<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $students = [
            [
                'first_name' => 'Jean',
                'last_name' => 'Dupont',
                'email' => 'jean.dupont@example.com',
                'phone' => '0123456789',
                'birth_date' => '2000-05-15',
                'address' => '123 Rue de Paris, 75001 Paris',
            ],
            [
                'first_name' => 'Marie',
                'last_name' => 'Martin',
                'email' => 'marie.martin@example.com',
                'phone' => '0987654321',
                'birth_date' => '1999-11-22',
                'address' => '456 Avenue des Champs, 69000 Lyon',
            ],
            [
                'first_name' => 'Pierre',
                'last_name' => 'Durand',
                'email' => 'pierre.durand@example.com',
                'phone' => '0678912345',
                'birth_date' => '2001-03-08',
                'address' => '789 Boulevard de la Mer, 13000 Marseille',
            ],
        ];

        foreach ($students as $student) {
            Student::create($student);
        }
    }
}