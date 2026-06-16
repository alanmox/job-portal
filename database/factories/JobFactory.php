<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    public function definition()
    {
        $titles = [
            'Senior Laravel Developer', 'React Frontend Engineer', 'DevOps Engineer',
            'Full Stack Developer', 'Data Scientist', 'UX/UI Designer',
            'Product Manager', 'Marketing Specialist', 'Financial Analyst',
            'Registered Nurse', 'Graphic Designer', 'Content Writer',
            'Sales Manager', 'Customer Support Lead', 'HR Coordinator',
            'Network Administrator', 'Security Analyst', 'Project Manager',
            'Software Engineer', 'Business Analyst',
        ];

        $companies = [
            'TechCorp', 'DataFlow Inc', 'CloudBase Solutions', 'InnovateTech',
            'GreenLeaf Digital', 'Prime Systems', 'NexGen Software', 'AlphaDev',
            'BrightPath Ltd', 'CoreStack Technologies',
        ];

        return [
            'title' => $titles[array_rand($titles)],
            'user_id' => rand(1, 2),
            'job_type_id' => rand(1, 5),
            'category_id' => rand(1, 8),
            'vacancy' => rand(1, 5),
            'salary' => rand(1, 5) > 3 ? '$' . rand(30, 150) . 'k - $' . rand(151, 250) . 'k' : null,
            'location' => fake()->city . ', ' . fake()->country,
            'description' => fake()->paragraphs(3, true),
            'benefits' => fake()->sentence(8),
            'responsibility' => fake()->paragraphs(2, true),
            'qualifications' => fake()->paragraphs(2, true),
            'keywords' => implode(', ', fake()->words(5)),
            'experience' => (string)rand(1, 10),
            'company_name' => $companies[array_rand($companies)],
            'company_location' => fake()->city . ', ' . fake()->country,
            'company_website' => 'https://' . fake()->domainName,
            'status' => 1,
            'isFeatured' => 0,
        ];
    }
}
