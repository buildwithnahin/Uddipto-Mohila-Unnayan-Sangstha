# UMUS - Uddipto Mohila Unnayan Sangstha Website

একটি সম্পূর্ণ ওয়েবসাইট উদ্দীপ্ত মহিলা উন্নয়ন সংস্থা (UMUS) এর জন্য - একটি মহিলা অধিকার এনজিও যা ২০০৩ সালে সাতক্ষীরা, বাংলাদেশে প্রতিষ্ঠিত হয়েছে।

## 🚀 প্রজেক্ট কিভাবে রান করবেন (How to Run the Project)

### প্রথমবার সেটআপ (First Time Setup)

```bash
# 1. প্রজেক্ট ডাউনলোড করুন
git clone https://github.com/buildwithnahin/Uddipto-Mohila-Unnayan-Sangstha.git
cd Uddipto-Mohila-Unnayan-Sangstha

# 2. PHP Dependencies ইনস্টল করুন
composer install

# 3. .env ফাইল তৈরি করুন
cp .env.example .env

# 4. Application Key জেনারেট করুন
php artisan key:generate

# 5. Database তৈরি করুন (SQLite)
touch database/database.sqlite

# 6. Database Migrate ও Seed করুন
php artisan migrate:fresh --seed

# 7. Storage Link তৈরি করুন
php artisan storage:link

# 8. Upload Directories তৈরি করুন
mkdir -p public/uploads/{projects,news,gallery,team,sliders,settings}
```

### প্রতিদিন কিভাবে রান করবেন (Daily Run - সবচেয়ে গুরুত্বপূর্ণ!)

**শুধু একটি কমান্ড দিয়ে পুরো প্রজেক্ট রান হবে:**

```bash
cd /home/nahin/Downloads/umus-website
php artisan serve
```

এটাই! **Admin এবং Frontend আলাদা কমান্ড দিয়ে রান করার দরকার নেই।** একই সার্ভারে দুটোই চলবে।

### ওয়েবসাইট দেখুন (Access the Website)

Server চালু করার পর:

- **Frontend (Public Site)**: http://127.0.0.1:8000
- **Admin Panel**: http://127.0.0.1:8000/admin

### Admin Login

- **Username**: `UMUS`
- **Password**: `UMUS2003`

## 📁 প্রজেক্ট স্ট্রাকচার (Project Structure)

```
umus-website/
├── app/
│   ├── Http/Controllers/
│   │   ├── Frontend Controllers (7টি)
│   │   └── Admin/ (10টি Controllers)
│   └── Models/ (9টি Models)
├── database/
│   ├── migrations/ (12টি migrations)
│   └── seeders/
├── resources/views/
│   ├── frontend/ (8টি pages)
│   └── admin/ (21টি pages)
├── routes/web.php (53টি routes)
└── public/uploads/ (Image upload folders)
```

## 🎨 ফিচারসমূহ (Features)

### Frontend (Public Pages)
1. **Home** - Hero slider, সংস্থা পরিচিতি, latest news
2. **About** - সম্পূর্ণ সংস্থা বিবরণ
3. **Projects** - সকল প্রজেক্ট এবং বিস্তারিত
4. **News** - খবর ও আপডেট
5. **Team** - টিম মেম্বার প্রোফাইল
6. **Gallery** - ছবি গ্যালারি
7. **Contact** - যোগাযোগ ফর্ম
8. **Privacy Policy** - গোপনীয়তা নীতি

### Admin Panel
1. **Dashboard** - সামারি ও statistics
2. **About Us Management** - সংস্থার তথ্য আপডেট
3. **Projects Management** - প্রজেক্ট যোগ/সম্পাদনা/মুছুন
4. **News Management** - খবর যোগ/সম্পাদনা/মুছুন
5. **Team Management** - টিম মেম্বার ম্যানেজ করুন
6. **Gallery Management** - ছবি আপলোড/মুছুন
7. **Slider Management** - হোম পেজ স্লাইডার
8. **Messages** - যোগাযোগ ফর্ম মেসেজ
9. **Settings** - সাইট সেটিংস (লোগো, সোশ্যাল মিডিয়া)
10. **Logout** - অ্যাডমিন লগআউট

## 🎨 ডিজাইন (Design)

- **Framework**: Bootstrap 5.3.2
- **Icons**: Bootstrap Icons 1.11.1
- **Fonts**: Google Fonts (Poppins, Open Sans)
- **Editor**: TinyMCE (Rich Text Editor)
- **Color Scheme**:
  - Primary: #1a5276 (Blue)
  - Secondary: #7d3c98 (Purple)
  - Accent: #f4d03f (Yellow)

## 💾 ডাটাবেস (Database)

- **Type**: SQLite
- **Tables**: 12টি (users, admin_users, about_us, projects, news, team_members, galleries, sliders, contact_messages, settings, cache, jobs)
- **Seeded Data**: সম্পূর্ণ UMUS organization data

## 🔧 Technology Stack

- **Backend**: Laravel 11
- **Database**: SQLite
- **Frontend**: Bootstrap 5 + Blade Templates
- **Authentication**: Custom Admin Guard
- **File Uploads**: Local Storage

## 📝 গুরুত্বপূর্ণ নোট (Important Notes)

1. **সার্ভার বন্ধ করতে**: টার্মিনালে `Ctrl + C` চাপুন
2. **Port পরিবর্তন করতে**: `php artisan serve --port=9000`
3. **Database রিসেট করতে**: `php artisan migrate:fresh --seed`
4. **Cache ক্লিয়ার করতে**: `php artisan cache:clear`

## 📞 Support

**Developer**: Nahin  
**Email**: nahin.codebug@gmail.com  
**Organization**: UMUS (Uddipto Mohila Unnayan Sangstha)  
**Established**: 2003, Satkhira, Bangladesh

## 📄 License

This project is developed for Uddipto Mohila Unnayan Sangstha (UMUS).

---

**সংক্ষেপে: শুধু `php artisan serve` কমান্ড দিয়ে পুরো প্রজেক্ট চালু করুন। Admin ও Frontend একসাথে চলবে! 🚀**
