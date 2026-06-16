<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        \App\Models\User::firstOrCreate(
            ['email' => 'alanmox441@gmail.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('M@j@liw@s@id9090'),
                'role' => 'admin',
            ]
        );

        \App\Models\User::firstOrCreate(
            ['email' => 'employer@demo.com'],
            [
                'name' => 'Demo Employer',
                'password' => bcrypt('password'),
                'role' => 'user',
            ]
        );

        \App\Models\Category::firstOrCreate(['name' => 'Information Technology']);
        \App\Models\Category::firstOrCreate(['name' => 'Finance & Accounting']);
        \App\Models\Category::firstOrCreate(['name' => 'Marketing & Sales']);
        \App\Models\Category::firstOrCreate(['name' => 'Healthcare & Medical']);
        \App\Models\Category::firstOrCreate(['name' => 'Education & Training']);
        \App\Models\Category::firstOrCreate(['name' => 'Engineering']);
        \App\Models\Category::firstOrCreate(['name' => 'Design & Creative']);
        \App\Models\Category::firstOrCreate(['name' => 'Human Resources']);

        \App\Models\JobType::firstOrCreate(['name' => 'Full Time']);
        \App\Models\JobType::firstOrCreate(['name' => 'Part Time']);
        \App\Models\JobType::firstOrCreate(['name' => 'Contract']);
        \App\Models\JobType::firstOrCreate(['name' => 'Freelance']);
        \App\Models\JobType::firstOrCreate(['name' => 'Internship']);

        if (\App\Models\Job::count() === 0) {
            $jobs = [
                ['title' => 'Senior Laravel Developer', 'category_id' => 1, 'job_type_id' => 1, 'vacancy' => 2, 'location' => 'Dar es Salaam, Tanzania', 'description' => 'We are looking for an experienced Laravel developer to join our team. You will be building enterprise-level web applications.', 'experience' => '5', 'company_name' => 'TechCorp Tanzania', 'isFeatured' => 1],
                ['title' => 'React Frontend Engineer', 'category_id' => 1, 'job_type_id' => 1, 'vacancy' => 3, 'location' => 'Remote', 'description' => 'Join our frontend team to build beautiful and performant user interfaces using React.js.', 'experience' => '3', 'company_name' => 'DataFlow Inc', 'isFeatured' => 1],
                ['title' => 'DevOps Engineer', 'category_id' => 1, 'job_type_id' => 1, 'vacancy' => 1, 'location' => 'Nairobi, Kenya', 'description' => 'Manage and improve our cloud infrastructure. Experience with AWS, Docker, and Kubernetes required.', 'experience' => '4', 'company_name' => 'CloudBase Solutions', 'isFeatured' => 1],
                ['title' => 'Financial Analyst', 'category_id' => 2, 'job_type_id' => 1, 'vacancy' => 2, 'location' => 'Dar es Salaam, Tanzania', 'description' => 'Analyze financial data and provide insights to support business decisions.', 'experience' => '3', 'company_name' => 'BrightPath Ltd', 'isFeatured' => 1],
                ['title' => 'Marketing Specialist', 'category_id' => 3, 'job_type_id' => 1, 'vacancy' => 2, 'location' => 'Remote', 'description' => 'Develop and execute marketing campaigns across digital channels.', 'experience' => '2', 'company_name' => 'GreenLeaf Digital', 'isFeatured' => 1],
                ['title' => 'UX/UI Designer', 'category_id' => 7, 'job_type_id' => 3, 'vacancy' => 1, 'location' => 'Dar es Salaam, Tanzania', 'description' => 'Design intuitive and visually appealing interfaces for web and mobile applications.', 'experience' => '3', 'company_name' => 'InnovateTech', 'isFeatured' => 0],
                ['title' => 'Full Stack Developer', 'category_id' => 1, 'job_type_id' => 1, 'vacancy' => 3, 'location' => 'Mwanza, Tanzania', 'description' => 'Build end-to-end web applications using PHP and JavaScript frameworks.', 'experience' => '4', 'company_name' => 'NexGen Software', 'isFeatured' => 0],
                ['title' => 'Network Administrator', 'category_id' => 1, 'job_type_id' => 1, 'vacancy' => 1, 'location' => 'Arusha, Tanzania', 'description' => 'Maintain and monitor network infrastructure for the organization.', 'experience' => '3', 'company_name' => 'Prime Systems', 'isFeatured' => 0],
                ['title' => 'Graphic Designer', 'category_id' => 7, 'job_type_id' => 2, 'vacancy' => 1, 'location' => 'Remote', 'description' => 'Create visual concepts for marketing materials, social media, and brand identity.', 'experience' => '2', 'company_name' => 'AlphaDev', 'isFeatured' => 0],
                ['title' => 'Sales Manager', 'category_id' => 3, 'job_type_id' => 1, 'vacancy' => 1, 'location' => 'Dar es Salaam, Tanzania', 'description' => 'Lead the sales team and drive revenue growth across the region.', 'experience' => '5', 'company_name' => 'CoreStack Technologies', 'isFeatured' => 0],
                ['title' => 'Registered Nurse', 'category_id' => 4, 'job_type_id' => 1, 'vacancy' => 5, 'location' => 'Mbeya, Tanzania', 'description' => 'Provide quality nursing care to patients in a well-equipped medical facility.', 'experience' => '2', 'company_name' => 'Agape Medical Centre', 'isFeatured' => 1],
                ['title' => 'HR Coordinator', 'category_id' => 8, 'job_type_id' => 1, 'vacancy' => 1, 'location' => 'Dodoma, Tanzania', 'description' => 'Coordinate recruitment, onboarding, and employee relations activities.', 'experience' => '2', 'company_name' => 'BrightPath Ltd', 'isFeatured' => 0],
                ['title' => 'Data Scientist', 'category_id' => 1, 'job_type_id' => 1, 'vacancy' => 1, 'location' => 'Remote', 'description' => 'Apply machine learning and statistical analysis to solve complex business problems.', 'experience' => '4', 'company_name' => 'DataFlow Inc', 'isFeatured' => 1],
                ['title' => 'Content Writer', 'category_id' => 3, 'job_type_id' => 4, 'vacancy' => 2, 'location' => 'Remote', 'description' => 'Write engaging content for blogs, websites, and social media platforms.', 'experience' => '1', 'company_name' => 'GreenLeaf Digital', 'isFeatured' => 0],
                ['title' => 'Civil Engineer', 'category_id' => 6, 'job_type_id' => 1, 'vacancy' => 2, 'location' => 'Zanzibar, Tanzania', 'description' => 'Design and supervise construction projects ensuring quality and safety standards.', 'experience' => '5', 'company_name' => 'BuildRight Ltd', 'isFeatured' => 0],
            ];

            foreach ($jobs as $job) {
                \App\Models\Job::create(array_merge($job, [
                    'user_id' => 1,
                    'status' => 1,
                    'salary' => rand(1, 3) > 1 ? '$' . rand(20, 80) . 'k - $' . rand(81, 200) . 'k' : null,
                    'benefits' => 'Health insurance, Paid time off, Remote work options',
                    'responsibility' => 'Work with the team to deliver high-quality results on time.',
                    'qualifications' => 'Bachelor degree required. Relevant experience preferred.',
                    'keywords' => $job['title'] . ', ' . $job['company_name'],
                    'company_location' => $job['location'],
                    'company_website' => 'https://example.com',
                ]));
            }
        }
    }
}
