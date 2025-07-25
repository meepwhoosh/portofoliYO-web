<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Explore Works - PortofolioYO!</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/styles.css">
  <script src="https://unpkg.com/feather-icons"></script>
</head>
<body class="bg-page-background text-page-text">
  <!-- Navbar -->
  <nav class="bg-white shadow-sm py-4 px-6 flex justify-between items-center sticky top-0 z-50">
    <div class="flex items-center">
      <a href="index.php" class="text-2xl font-bold text-primary">PortofoliYO<span class="text-yellow-400">!</span></a>
    </div>
<div class="hidden md:flex space-x-6">
      <div class="flex-1 flex justify-center items-center space-x-6">
        <a href="dashboard.php" class="text-page-text hover:text-primary font-medium">
          Explore
        </a>
        <a href="creators-site.php" class="text-page-text hover:text-primary font-medium">
          Creators
        </a>
      </div>
    <div class="flex items-center space-x-4">
      <button class="p-2 rounded-full hover:bg-gray-100">
        <i data-feather="search" class="text-gray-600 h-5 w-5"></i>
      </button>
      <!-- Notification Icon -->
      <button class="p-2 rounded-full hover:bg-gray-100 relative">
        <i data-feather="bell" class="text-gray-600 h-5 w-5"></i>
        <span class="absolute top-1 right-1 inline-block w-2 h-2 bg-red-500 rounded-full"></span>
      </button>
      <a href="upload-site.php" class="px-4 py-2 bg-primary text-white rounded-md hover:bg-primary/90">Upload Work</a>
      <div class="w-8 h-8 rounded-full overflow-hidden border border-gray-300">
        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User" class="w-full h-full object-cover">
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
    <section class="relative overflow-hidden pt-10 pb-16">
      <!-- Decorative blobs -->
      <div
        class="blob-shape w-64 h-64 bg-soft-pink top-10 left-10 animate-float"
      ></div>
      <div
        class="blob-shape w-80 h-80 bg-soft-yellow bottom-10 right-10 animate-float"
        style="animation-delay: 1s"
      ></div>
      <div
        class="blob-shape w-40 h-40 bg-soft-blue top-40 right-40 animate-float"
        style="animation-delay: 2s"
      ></div>

  <!-- Main content -->
  <div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold mb-6 text-center">Explore Amazing <span class="text-primary font-black">Creative Portfolio</span></h1>

    <!-- Search & Filter -->
    <section class="py-12">
      <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto relative">
          <input type="text" placeholder="Search for projects, creators, or skills..." class="w-full px-6 py-4 border border-white-200 rounded-full shadow-sm bg-white-100 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
          <button class="absolute right-3 top-3 bg-primary text-white p-2 rounded-full hover:bg-primary/90 flex items-center justify-center">
            <i data-feather="search" class="h-5 w-5"></i>
          </button>
          </button>
        </div>
      </div>
    </section>

    <div class="flex justify-center space-x-4 mb-8 min-w-max">
      <div class="flex space-x-4 mb-8 min-w-max">
        <button class="category-button px-4 py-2 rounded-full bg-primary text-white" data-category="all">
          All Categories
        </button>
        <button class="category-button px-4 py-2 rounded-full bg-gray-100" data-category="graphic-design">
          Graphic Design
        </button>
        <button class="category-button px-4 py-2 rounded-full bg-gray-100" data-category="web-design">
          Web Design
        </button>
        <button class="category-button px-4 py-2 rounded-full bg-gray-100" data-category="video">
          Video
        </button>
        <button class="category-button px-4 py-2 rounded-full bg-gray-100" data-category="advertising">
          Advertising
        </button>
        <button class="category-button px-4 py-2 rounded-full bg-gray-100" data-category="illustration">
          Illustration
        </button>
      </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
      <!-- Work item 1 -->
      <div class="work-item" data-category="graphic-design">
      <a href="work-detail.php" class="retro-card hover:shadow-lg block">
        <div class="aspect-video bg-gray-200 rounded-lg mb-4 overflow-hidden">
        <img 
          src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80" 
          alt="Modern Logo Design" 
          class="w-full h-full object-cover"
        >
        </div>
        <h3 class="font-bold text-lg mb-1 hover:text-primary">Modern Logo Design</h3>
        <p class="text-sm text-gray-500 mb-3">Graphic Design</p>
        <div class="flex justify-between items-center">
        <div class="flex items-center">
          <img 
          src="https://randomuser.me/api/portraits/men/32.jpg" 
          alt="Alex Chen" 
          class="h-6 w-6 rounded-full mr-2"
          >
          <span class="text-sm">Alex Chen</span>
        </div>
        <div class="flex items-center">
          <i data-feather="heart" class="h-4 w-4 text-gray-400 mr-1 hover:text-red-500"></i>
          <span class="text-sm">124</span>
        </div>
        </div>
      </a>
      </div>

      <!-- Work item 2 -->
      <div class="work-item" data-category="web-design">
      <a href="work-detail.php" class="retro-card hover:shadow-lg block">
        <div class="aspect-video bg-gray-200 rounded-lg mb-4 overflow-hidden">
        <img 
          src="https://images.unsplash.com/photo-1461749280684-dccba630e2f6?auto=format&fit=crop&w=600&q=80" 
          alt="Website Redesign" 
          class="w-full h-full object-cover"
        >
        </div>
        <h3 class="font-bold text-lg mb-1 hover:text-primary">Website Redesign</h3>
        <p class="text-sm text-gray-500 mb-3">Web Design</p>
        <div class="flex justify-between items-center">
        <div class="flex items-center">
          <img 
          src="https://randomuser.me/api/portraits/women/44.jpg" 
          alt="Emily Wong" 
          class="h-6 w-6 rounded-full mr-2"
          >
          <span class="text-sm">Emily Wong</span>
        </div>
        <div class="flex items-center">
          <i data-feather="heart" class="h-4 w-4 text-gray-400 mr-1 hover:text-red-500"></i>
          <span class="text-sm">98</span>
        </div>
        </div>
      </a>
      </div>

      <!-- Work item 3 -->
      <div class="work-item" data-category="illustration">
      <a href="work-detail.php" class="retro-card hover:shadow-lg block">
        <div class="aspect-video bg-gray-200 rounded-lg mb-4 overflow-hidden">
        <img 
          src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=format&fit=crop&w=600&q=80" 
          alt="Fantasy Illustration" 
          class="w-full h-full object-cover"
        >
        </div>
        <h3 class="font-bold text-lg mb-1 hover:text-primary">Fantasy Illustration</h3>
        <p class="text-sm text-gray-500 mb-3">Illustration</p>
        <div class="flex justify-between items-center">
        <div class="flex items-center">
          <img 
          src="https://randomuser.me/api/portraits/men/65.jpg" 
          alt="Marcus Lee" 
          class="h-6 w-6 rounded-full mr-2"
          >
          <span class="text-sm">Marcus Lee</span>
        </div>
        <div class="flex items-center">
          <i data-feather="heart" class="h-4 w-4 text-gray-400 mr-1"></i>
          <span class="text-sm">156</span>
        </div>
        </div>
      </a>
      </div>

      <!-- Work item 4 -->
      <div class="work-item" data-category="video">
      <a href="work-detail.php" class="retro-card hover:shadow-lg block">
        <div class="aspect-video bg-gray-200 rounded-lg mb-4 overflow-hidden">
        <img 
          src="https://images.unsplash.com/photo-1465101046530-73398c7f28ca?auto=format&fit=crop&w=600&q=80" 
          alt="Product Animation" 
          class="w-full h-full object-cover"
        >
        </div>
        <h3 class="font-bold text-lg mb-1 hover:text-primary">Product Animation</h3>
        <p class="text-sm text-gray-500 mb-3">Video</p>
        <div class="flex justify-between items-center">
        <div class="flex items-center">
          <img 
          src="https://randomuser.me/api/portraits/women/68.jpg" 
          alt="Sophia Barnes" 
          class="h-6 w-6 rounded-full mr-2"
          >
          <span class="text-sm">Sophia Barnes</span>
        </div>
        <div class="flex items-center">
          <i data-feather="heart" class="h-4 w-4 text-gray-400 mr-1"></i>
          <span class="text-sm">82</span>
        </div>
        </div>
      </a>
      </div>

      <!-- Work item 5 -->
      <div class="work-item" data-category="advertising">
      <a href="work-detail.php" class="retro-card hover:shadow-lg block">
        <div class="aspect-video bg-gray-200 rounded-lg mb-4 overflow-hidden">
        <img 
          src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=600&q=80" 
          alt="Social Media Campaign" 
          class="w-full h-full object-cover"
        >
        </div>
        <h3 class="font-bold text-lg mb-1 hover:text-primary">Social Media Campaign</h3>
        <p class="text-sm text-gray-500 mb-3">Advertising</p>
        <div class="flex justify-between items-center">
        <div class="flex items-center">
          <img 
          src="https://randomuser.me/api/portraits/men/23.jpg" 
          alt="David Kim" 
          class="h-6 w-6 rounded-full mr-2"
          >
          <span class="text-sm">David Kim</span>
        </div>
        <div class="flex items-center">
          <i data-feather="heart" class="h-4 w-4 text-gray-400 mr-1"></i>
          <span class="text-sm">213</span>
        </div>
        </div>
      </a>
      </div>

      <!-- Work item 6 -->
      <div class="work-item" data-category="graphic-design">
      <a href="work-detail.php" class="retro-card hover:shadow-lg block">
        <div class="aspect-video bg-gray-200 rounded-lg mb-4 overflow-hidden">
        <img 
          src="https://images.unsplash.com/photo-1465101046530-73398c7f28ca?auto=format&fit=crop&w=600&q=80" 
          alt="Brand Identity System" 
          class="w-full h-full object-cover"
        >
        </div>
        <h3 class="font-bold text-lg mb-1 hover:text-primary">Brand Identity System</h3>
        <p class="text-sm text-gray-500 mb-3">Graphic Design</p>
        <div class="flex justify-between items-center">
        <div class="flex items-center">
          <img 
          src="https://randomuser.me/api/portraits/men/32.jpg" 
          alt="Alex Chen" 
          class="h-6 w-6 rounded-full mr-2">
          <span class="text-sm">Alex Chen</span>
        </div>
        <div class="flex items-center">
          <i data-feather="heart" class="h-4 w-4 text-gray-400 mr-1"></i>
          <span class="text-sm">156</span>
        </div>
        </div>
      </a>
      </div>

      <!-- Work item 7 -->
      <div class="work-item" data-category="web-design">
      <a href="work-detail.php" class="retro-card hover:shadow-lg block">
        <div class="aspect-video bg-gray-200 rounded-lg mb-4 overflow-hidden">
        <img 
          src="https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=600&q=80" 
          alt="Mobile App UI" 
          class="w-full h-full object-cover">
        </div>
        <h3 class="font-bold text-lg mb-1 hover:text-primary">Mobile App UI Design</h3>
        <p class="text-sm text-gray-500 mb-3">Web Design</p>
        <div class="flex justify-between items-center">
        <div class="flex items-center">
          <img 
          src="https://randomuser.me/api/portraits/women/44.jpg" 
          alt="Emily Wong" 
          class="h-6 w-6 rounded-full mr-2"
          >
          <span class="text-sm">Emily Wong</span>
        </div>
        <div class="flex items-center">
          <i data-feather="heart" class="h-4 w-4 text-gray-400 mr-1"></i>
          <span class="text-sm">97</span>
        </div>
        </div>
      </a>
      </div>

      <!-- Work item 8 -->
      <div class="work-item" data-category="illustration">
      <a href="work-detail.php" class="retro-card hover:shadow-lg block">
        <div class="aspect-video bg-gray-200 rounded-lg mb-4 overflow-hidden">
        <img 
          src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=format&fit=crop&w=600&q=80" 
          alt="Character Design" 
          class="w-full h-full object-cover"
        >
        </div>
        <h3 class="font-bold text-lg mb-1 hover:text-primary">Character Design</h3>
        <p class="text-sm text-gray-500 mb-3">Illustration</p>
        <div class="flex justify-between items-center">
        <div class="flex items-center">
          <img 
          src="https://randomuser.me/api/portraits/men/65.jpg" 
          alt="Marcus Lee" 
          class="h-6 w-6 rounded-full mr-2"
          >
          <span class="text-sm">Marcus Lee</span>
        </div>
        <div class="flex items-center">
          <i data-feather="heart" class="h-4 w-4 text-gray-400 mr-1"></i>
          <span class="text-sm">142</span>
        </div>
        </div>
      </a>
      </div>
    </div>

    <!-- Pagination -->
    <div class="mt-12 flex justify-center">
      <div class="flex space-x-2">
        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-200 text-gray-700 hover:bg-gray-300">
          <i data-feather="chevron-left" class="h-5 w-5"></i>
        </a>
        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-primary text-white">
          1
        </a>
        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-200 text-gray-700 hover:bg-gray-300">
          2
        </a>
        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-200 text-gray-700 hover:bg-gray-300">
          3
        </a>
        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-200 text-gray-700 hover:bg-gray-300">
          <i data-feather="chevron-right" class="h-5 w-5"></i>
        </a>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-gray-900 text-white py-12 mt-12">
    <div class="container mx-auto px-4">
      <div class="flex flex-col md:flex-row justify-between">
        <div class="mb-8 md:mb-0">
          <div class="flex items-center">
            <span class="font-bold text-xl text-white">
                Portofolio<span class="text-primary">YO</span><span class="text-yellow-400">!</span>
              </span>
          </div>
          <p class="mt-4 max-w-xs text-gray-400">
            The creative portfolio platform that helps you showcase your best work and connect with clients worldwide.
          </p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-3 gap-8">
          <div>
            <h4 class="font-bold text-lg mb-4">Platform</h4>
            <ul class="space-y-2">
              <li><a href="#" class="text-gray-400 hover:text-white">How it works</a></li>
              <li><a href="#" class="text-gray-400 hover:text-white">Features</a></li>
              <li><a href="#" class="text-gray-400 hover:text-white">Pricing</a></li>
              <li><a href="#" class="text-gray-400 hover:text-white">FAQ</a></li>
            </ul>
          </div>
          
          <div>
            <h4 class="font-bold text-lg mb-4">Company</h4>
            <ul class="space-y-2">
              <li><a href="#" class="text-gray-400 hover:text-white">About Us</a></li>
              <li><a href="#" class="text-gray-400 hover:text-white">Blog</a></li>
              <li><a href="#" class="text-gray-400 hover:text-white">Careers</a></li>
              <li><a href="#" class="text-gray-400 hover:text-white">Contact</a></li>
            </ul>
          </div>
          
          <div>
            <h4 class="font-bold text-lg mb-4">Legal</h4>
            <ul class="space-y-2">
              <li><a href="#" class="text-gray-400 hover:text-white">Privacy Policy</a></li>
              <li><a href="#" class="text-gray-400 hover:text-white">Terms of Service</a></li>
              <li><a href="#" class="text-gray-400 hover:text-white">Cookie Policy</a></li>
            </ul>
          </div>
        </div>
      </div>
      
      <div class="border-t border-gray-800 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center">
        <p class="text-gray-400">© 2025 PortofolioYO! All rights reserved.</p>
        <div class="mt-4 md:mt-0 flex space-x-4">
          <a href="#" class="text-gray-400 hover:text-white">
            <i data-feather="facebook" class="h-6 w-6"></i>
          </a>
          <a href="#" class="text-gray-400 hover:text-white">
            <i data-feather="instagram" class="h-6 w-6"></i>
          </a>
          <a href="#" class="text-gray-400 hover:text-white">
            <i data-feather="twitter" class="h-6 w-6"></i>
          </a>
        </div>
      </div>
    </div>
  </footer>

  <script src="javascript/script.js"></script>
</body>
</html>
