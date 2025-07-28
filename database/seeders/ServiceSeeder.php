<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $services = [
            [
                'name' => 'Web Development',
                'description' => 'Complete web development service including frontend and backend',
                'price' => 1500.00,
                'status' => 'active',
            ],
            [
                'name' => 'Mobile App Development',
                'description' => 'Native and cross-platform mobile application development',
                'price' => 2000.00,
                'status' => 'active',
            ],
            [
                'name' => 'UI/UX Design',
                'description' => 'Professional user interface and user experience design',
                'price' => 800.00,
                'status' => 'active',
            ],
            [
                'name' => 'Digital Marketing',
                'description' => 'Complete digital marketing strategy and implementation',
                'price' => 1200.00,
                'status' => 'active',
            ],
            [
                'name' => 'SEO Optimization',
                'description' => 'Search engine optimization for better online visibility',
                'price' => 600.00,
                'status' => 'inactive',
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
