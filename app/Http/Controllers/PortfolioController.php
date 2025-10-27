<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class PortfolioController extends Controller {
    // Display all projects with filtering
    public function index(Request $request)
    {
        $projects = $this->getAllProjects();
        $categories = $this->getCategories();
        $technologies = $this->getTechnologies();

        // Filter by category if provided
        if ($request->has('category') && $request->category !== 'all') {
            $projects = array_filter($projects, function($project) use ($request) {
                return $project['category'] === $request->category;
            });
        }

        return view('portfolio', compact('projects', 'categories', 'technologies'));
    }

    // Get all projects
    private function getAllProjects()
    {
        return [
            [
                'id' => 1,
                'title' => 'Time Management Website',
                'description' => 'A full-featured time management website with streak, task scheduling, reminders, and user authentication.',
                'image' => '/images/portfolio/clockin.jpg',
                'technologies' => ['Java', 'TailwindCSS', 'MySQL'],
                'category' => 'web',
                'github_url' => '#',
                'demo_url' => '#',
                'featured' => true
            ],
            [
                'id' => 2,
                'title' => 'Smart Contract Audit Tools',
                'description' => 'A set of tools for auditing smart contracts, ensuring security and compliance.',
                'image' => '/images/portfolio/zectra.png',
                'technologies' => ['Python', 'Node.js', 'Docker'],
                'category' => 'mobile',
                'github_url' => '#',
                'demo_url' => '#',
                'featured' => true
            ],
            [
                'id' => 3,
                'title' => 'Little Monologue Multi-Platform',
                'description' => 'A multi-platform application for sharing about mental health and self-development.',
                'image' => '/images/portfolio/littlemonologue.png',
                'technologies' => ['React', 'API', 'Docker'],
                'category' => 'design',
                'github_url' => '#',
                'demo_url' => '#',
                'featured' => true
            ],
            [
                'id' => 4,
                'title' => 'Script Of The Soul',
                'description' => 'Cross-platform shopping app with real-time updates and payment integration.',
                'image' => 'https://via.placeholder.com/400x250/10b981/ffffff?text=API+System',
                'technologies' => ['Flutter', 'Dart', 'Firebase'],
                'category' => 'backend',
                'github_url' => '#',
                'demo_url' => '#',
                'featured' => false
            ],
            [
                'id' => 5,
                'title' => 'Personal Portfolio Website',
                'description' => 'Responsive portfolio website built with Laravel and TailwindCSS featuring modern animations.',
                'image' => 'https://via.placeholder.com/400x250/ef4444/ffffff?text=Portfolio+Website',
                'technologies' => ['Laravel', 'TailwindCSS', 'JavaScript'],
                'category' => 'web',
                'github_url' => '#',
                'demo_url' => '#',
                'featured' => false
            ]
        ];
    }

    // Get project categories
    private function getCategories()
    {
        return [
            ['key' => 'web', 'name' => 'Web Development', 'icon' => 'fas fa-globe'],
            ['key' => 'mobile', 'name' => 'Mobile Apps', 'icon' => 'fas fa-mobile-alt'],
            ['key' => 'design', 'name' => 'UI/UX Design', 'icon' => 'fas fa-paint-brush'],
            ['key' => 'backend', 'name' => 'Backend Systems', 'icon' => 'fas fa-server']
        ];
    }

    // Available tech
    private function getTechnologies()
    {
        return [
            ['name' => 'Laravel', 'icon' => 'fab fa-laravel', 'color' => 'text-red-500'],
            ['name' => 'React', 'icon' => 'fab fa-react', 'color' => 'text-blue-500'],
            ['name' => 'JavaScript', 'icon' => 'fab fa-js-square', 'color' => 'text-yellow-500'],
            ['name' => 'Python', 'icon' => 'fab fa-python', 'color' => 'text-green-500'],
            ['name' => 'Node.js', 'icon' => 'fab fa-node-js', 'color' => 'text-green-600'],
            ['name' => 'Docker', 'icon' => 'fab fa-docker', 'color' => 'text-blue-600']
        ];
    }

}