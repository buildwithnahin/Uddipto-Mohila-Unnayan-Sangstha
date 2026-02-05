<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use App\Models\AdminUser;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\TeamMember;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User
        AdminUser::create([
            'name' => 'Administrator',
            'username' => 'UMUS',
            'email' => 'uddipto.org@gmail.com',
            'password' => Hash::make('UMUS2003'),
        ]);

        // About Us
        AboutUs::create([
            'title' => 'About UMUS',
            'description' => '<p>Uddipto Mohila Unnayan Sangstha (UMUS) is a non-profit, non-political, and voluntary development organization committed to the empowerment of marginalized and disadvantaged communities, particularly women and Dalit communities in Satkhira district of Bangladesh.</p><p>Since our establishment in 2003, we have been working tirelessly to ensure gender equality, social justice, and sustainable development for the most vulnerable populations in our society.</p>',
            'mission' => '<p>Our mission is to empower marginalized women and Dalit communities through education, skill development, advocacy, and sustainable livelihood programs. We strive to create an inclusive society where every individual has equal opportunities to thrive and contribute to the community.</p>',
            'vision' => '<p>We envision a society free from discrimination, where women and marginalized communities enjoy equal rights, dignity, and opportunities for sustainable development. A just and equitable society where every voice matters.</p>',
            'history' => '<p>Uddipto Mohila Unnayan Sangstha (UMUS) was established in 2003 in Satkhira district by a group of dedicated social workers and activists who recognized the urgent need to address the challenges faced by marginalized women and Dalit communities in the region.</p><p>Over the years, UMUS has grown from a small grassroots organization to a recognized development partner, implementing various projects focused on women\'s empowerment, human rights advocacy, livelihood improvement, and community development.</p><p>Our journey has been marked by strong partnerships with communities, government agencies, and development organizations who share our vision for an inclusive and just society.</p>',
            'status' => true,
        ]);

        // Settings
        $settings = [
            ['key' => 'site_name', 'value' => 'UMUS - Uddipto Mohila Unnayan Sangstha', 'type' => 'text'],
            ['key' => 'site_tagline', 'value' => 'Empowering Women, Transforming Communities', 'type' => 'text'],
            ['key' => 'email', 'value' => 'uddipto.org@gmail.com', 'type' => 'text'],
            ['key' => 'email_secondary', 'value' => 'uddipto.jayontidas@yahoo.com', 'type' => 'text'],
            ['key' => 'phone', 'value' => '+880 1745953020', 'type' => 'text'],
            ['key' => 'address', 'value' => 'Mukttizudda College (West Side), Tala, Satkhira, Bangladesh', 'type' => 'textarea'],
            ['key' => 'facebook', 'value' => 'https://facebook.com/umus', 'type' => 'text'],
            ['key' => 'twitter', 'value' => '', 'type' => 'text'],
            ['key' => 'youtube', 'value' => '', 'type' => 'text'],
            ['key' => 'footer_text', 'value' => '© 2003-2026 UMUS. All rights reserved.', 'type' => 'text'],
            ['key' => 'meta_description', 'value' => 'UMUS (Uddipto Mohila Unnayan Sangstha) is a non-profit organization dedicated to empowering marginalized women and Dalit communities in Satkhira, Bangladesh since 2003.', 'type' => 'textarea'],
            ['key' => 'meta_keywords', 'value' => 'UMUS, NGO Bangladesh, Women Empowerment, Dalit Rights, Satkhira, Development Organization', 'type' => 'text'],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }

        // Team Members
        TeamMember::create([
            'name' => 'Jayonti Rani Das',
            'designation' => 'Executive Director',
            'email' => 'uddipto.jayontidas@yahoo.com',
            'phone' => '+880 1745953020',
            'bio' => 'Jayonti Rani Das is the founding Executive Director of UMUS. With over two decades of experience in grassroots development work, she has been instrumental in shaping the organization\'s vision and leading its mission to empower marginalized women and Dalit communities in Satkhira district.',
            'order' => 1,
            'status' => true,
        ]);

        TeamMember::create([
            'name' => 'Program Coordinator',
            'designation' => 'Program Coordinator',
            'email' => 'programs@umus.org',
            'phone' => '',
            'bio' => 'Responsible for coordinating and overseeing all program activities, ensuring effective implementation and monitoring of development initiatives.',
            'order' => 2,
            'status' => true,
        ]);

        TeamMember::create([
            'name' => 'Finance Officer',
            'designation' => 'Finance Officer',
            'email' => 'finance@umus.org',
            'phone' => '',
            'bio' => 'Manages the financial operations of the organization, ensuring transparency, accountability, and proper utilization of resources.',
            'order' => 3,
            'status' => true,
        ]);

        // Projects
        Project::create([
            'title' => 'SUChWONA - Women\'s Voice and Leadership in Bangladesh',
            'slug' => 'suchowna-wvlb-program',
            'short_description' => 'A comprehensive program focused on amplifying women\'s voices and developing leadership capabilities in marginalized communities.',
            'description' => '<p>The SUChWONA (Women\'s Voice and Leadership in Bangladesh - WVLB) Program is our flagship initiative aimed at empowering marginalized women, particularly from Dalit communities, in the Ashashuni and Tala upazilas of Satkhira district.</p><h4>Program Objectives:</h4><ul><li>Strengthen women\'s leadership and decision-making capabilities</li><li>Promote gender equality and women\'s rights</li><li>Build capacity of women-led organizations</li><li>Advocate for policy changes that benefit marginalized women</li><li>Create sustainable livelihood opportunities</li></ul><h4>Key Activities:</h4><ul><li>Leadership training and capacity building workshops</li><li>Formation and strengthening of women\'s groups</li><li>Rights awareness and advocacy campaigns</li><li>Income generating activities support</li><li>Community mobilization and networking</li></ul>',
            'donor' => 'Development Partner',
            'budget' => '94,59,952 BDT',
            'start_date' => '2024-01-01',
            'end_date' => '2026-12-31',
            'location' => 'Ashashuni & Tala Upazila, Satkhira',
            'is_featured' => true,
            'status' => true,
        ]);

        Project::create([
            'title' => 'Dalit Community Development Program',
            'slug' => 'dalit-community-development',
            'short_description' => 'A holistic development program addressing the unique challenges faced by Dalit communities.',
            'description' => '<p>This program focuses on the holistic development of Dalit communities who face multiple layers of discrimination based on caste and occupation.</p><h4>Key Components:</h4><ul><li>Education support for Dalit children</li><li>Healthcare access improvement</li><li>Skill development and vocational training</li><li>Legal aid and rights awareness</li><li>Social integration initiatives</li></ul>',
            'donor' => 'Various Partners',
            'budget' => '',
            'start_date' => '2020-01-01',
            'end_date' => null,
            'location' => 'Satkhira District',
            'is_featured' => true,
            'status' => true,
        ]);

        Project::create([
            'title' => 'Women\'s Rights and Gender Equality',
            'slug' => 'womens-rights-gender-equality',
            'short_description' => 'Promoting gender equality and protecting women\'s rights through awareness and advocacy.',
            'description' => '<p>This ongoing initiative focuses on promoting gender equality and protecting women\'s rights in our target communities.</p><h4>Activities Include:</h4><ul><li>Gender sensitization workshops</li><li>Prevention of violence against women</li><li>Support for survivors of gender-based violence</li><li>Advocacy for women\'s legal rights</li><li>Economic empowerment of women</li></ul>',
            'donor' => '',
            'budget' => '',
            'start_date' => '2010-01-01',
            'end_date' => null,
            'location' => 'Satkhira District',
            'is_featured' => false,
            'status' => true,
        ]);

        // News
        News::create([
            'title' => 'UMUS Launches New Women Leadership Program',
            'slug' => 'umus-launches-women-leadership-program',
            'short_description' => 'UMUS has initiated a new comprehensive leadership development program for women in Satkhira district.',
            'description' => '<p>We are excited to announce the launch of our new Women Leadership Program aimed at developing the leadership capabilities of marginalized women in Satkhira district.</p><p>The program will provide intensive training on leadership skills, public speaking, decision-making, and community organizing. Participants will also receive mentorship from experienced women leaders and opportunities to practice their skills in real-world settings.</p><p>This initiative is part of our ongoing commitment to empower women and create more inclusive communities where women\'s voices are heard and valued.</p>',
            'published_date' => '2026-01-15',
            'is_featured' => true,
            'status' => true,
        ]);

        News::create([
            'title' => 'Annual Community Health Camp Successfully Conducted',
            'slug' => 'annual-community-health-camp',
            'short_description' => 'UMUS organized a free health camp providing medical services to over 500 community members.',
            'description' => '<p>UMUS successfully organized its annual community health camp in Tala upazila, providing free medical services to over 500 community members from marginalized backgrounds.</p><p>The health camp offered general health checkups, eye examinations, dental services, and basic medications. Community members also received health education on preventive healthcare and nutrition.</p><p>We extend our gratitude to all the volunteer doctors, nurses, and community volunteers who made this event possible.</p>',
            'published_date' => '2025-12-10',
            'is_featured' => false,
            'status' => true,
        ]);

        News::create([
            'title' => 'Celebrating International Women\'s Day 2026',
            'slug' => 'international-womens-day-2026',
            'short_description' => 'UMUS organized a grand celebration of International Women\'s Day with various events and activities.',
            'description' => '<p>UMUS celebrated International Women\'s Day 2026 with a series of events highlighting the achievements of women in our communities and advocating for continued progress towards gender equality.</p><p>The celebration included cultural performances, inspirational speeches by women leaders, recognition of outstanding women achievers, and a community rally for women\'s rights.</p><p>Hundreds of community members, partners, and supporters joined us in celebrating the strength, resilience, and achievements of women everywhere.</p>',
            'published_date' => '2026-03-08',
            'is_featured' => true,
            'status' => true,
        ]);

        // Sliders
        Slider::create([
            'title' => 'Empowering Women, Transforming Communities',
            'description' => 'UMUS is dedicated to empowering marginalized women and Dalit communities in Satkhira, Bangladesh since 2003.',
            'image' => 'sliders/slider1.jpg',
            'button_text' => 'Learn More',
            'button_link' => '/about',
            'order' => 1,
            'status' => true,
        ]);

        Slider::create([
            'title' => 'Building a Just and Equal Society',
            'description' => 'We work towards a society where every individual enjoys equal rights, dignity, and opportunities.',
            'image' => 'sliders/slider2.jpg',
            'button_text' => 'Our Projects',
            'button_link' => '/projects',
            'order' => 2,
            'status' => true,
        ]);

        Slider::create([
            'title' => 'Join Us in Making a Difference',
            'description' => 'Partner with UMUS to create lasting impact in the lives of marginalized communities.',
            'image' => 'sliders/slider3.jpg',
            'button_text' => 'Contact Us',
            'button_link' => '/contact',
            'order' => 3,
            'status' => true,
        ]);

        // Galleries
        Gallery::create([
            'title' => 'Women Leadership Training',
            'description' => 'Participants at our women leadership training program.',
            'image' => 'gallery/training1.jpg',
            'category' => 'Training',
            'order' => 1,
            'status' => true,
        ]);

        Gallery::create([
            'title' => 'Community Meeting',
            'description' => 'Community members gathering for a development meeting.',
            'image' => 'gallery/meeting1.jpg',
            'category' => 'Community',
            'order' => 2,
            'status' => true,
        ]);

        Gallery::create([
            'title' => 'Health Camp',
            'description' => 'Free health services provided at our community health camp.',
            'image' => 'gallery/health1.jpg',
            'category' => 'Health',
            'order' => 3,
            'status' => true,
        ]);

        Gallery::create([
            'title' => 'Women\'s Day Celebration',
            'description' => 'Celebrating International Women\'s Day with our community.',
            'image' => 'gallery/womensday1.jpg',
            'category' => 'Events',
            'order' => 4,
            'status' => true,
        ]);
    }
}
