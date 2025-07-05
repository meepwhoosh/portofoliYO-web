<?php

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(0);

session_start();
include 'php/config.php';

// Pastikan user sudah login
/* Tidak perlu proses login, kode ini dibiarkan kosong */
// Jika sudah login, jangan redirect ke login lagi

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user_id = $_SESSION['user_id'];
  $title = $_POST['title'];
  $description = $_POST['description'];
  $category = $_POST['category'];
  $tags = isset($_POST['tags']) ? $_POST['tags'] : '';
  $visibility = isset($_POST['visibility']) ? $_POST['visibility'] : 'public';
  $allow_comments = isset($_POST['allow_comments']) ? 1 : 0;
  $allow_hire = isset($_POST['allow_hire']) ? 1 : 0;

  // --- Proses Upload File ---
  $target_dir = "uploads/";
  $file_url = '';
  if (isset($_FILES["file-input"]) && $_FILES["file-input"]["error"][0] == 0) {
    $file_name = basename($_FILES["file-input"]["name"][0]);
    $target_file = $target_dir . time() . '_' . $file_name;
    if (move_uploaded_file($_FILES["file-input"]["tmp_name"][0], $target_file)) {
      $file_url = $target_file;
    } else {
      $error = "Maaf, terjadi error saat mengupload file.";
    }
  } else {
    $error = "File tidak ditemukan atau terjadi error.";
  }

  if (empty($error)) {
    $stmt = $conn->prepare("INSERT INTO works (user_id, title, description, file_url, category, visibility, allow_comments, allow_hire) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssii", $user_id, $title, $description, $file_url, $category, $visibility, $allow_comments, $allow_hire);

    if ($stmt->execute()) {
      $work_id = $stmt->insert_id;
      // Handle tags (versi sederhana)
      if (!empty($tags)) {
        $tagsArr = array_map('trim', explode(',', $tags));
        foreach ($tagsArr as $tag) {
          if ($tag == '') continue;
          // Insert tag jika belum ada
          $tag_stmt = $conn->prepare("INSERT IGNORE INTO tags (name) VALUES (?)");
          $tag_stmt->bind_param("s", $tag);
          $tag_stmt->execute();
          $tag_stmt->close();

          // Ambil id tag
          $tag_id_result = $conn->query("SELECT id FROM tags WHERE name='" . $conn->real_escape_string($tag) . "' LIMIT 1");
          if ($tag_id_result && $tag_id_result->num_rows > 0) {
            $tag_row = $tag_id_result->fetch_assoc();
            $tag_id = $tag_row['id'];
            // Insert ke work_tags
            $wt_stmt = $conn->prepare("INSERT INTO work_tags (work_id, tag_id) VALUES (?, ?)");
            $wt_stmt->bind_param("ii", $work_id, $tag_id);
            $wt_stmt->execute();
            $wt_stmt->close();
          }
        }
      }
      header("Location: work-detail.php?id=" . $work_id);
      exit();
    } else {
      $error = "Error saat menyimpan ke database: " . $stmt->error;
    }
    $stmt->close();
  }
  $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Work - PortofolioYO!</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/styles.css">
  <script src="https://unpkg.com/feather-icons"></script>
</head>
<body class="bg-page-background text-page-text">
  <!-- Navbar -->
  <!-- ...navbar code tetap... -->

 <!-- Hero Section -->
  <section class="relative overflow-hidden">
    <!-- Decorative blobs -->
    <!-- ...blob code tetap... -->

  <!-- Main content -->
  <div class="container mx-auto px-4 py-8">
  <a
    href="index.php"
    class="flex items-center text-page-text hover:text-primary mb-8">
    <i data-feather="arrow-left" class="mr-2" size="18"></i>
    <span class="font-bold">Back to home</span>
  </a>
  <div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-lg">
    <h1 class="text-3xl font-bold mb-2">Upload Your Work</h1>
    <p class="text-gray-600 mb-8">
    Share your creative work with the PortofolioYO! community and potential clients.
    </p>
    <?php if (!empty($error)): ?>
    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded"><?php echo $error; ?></div>
    <?php endif; ?>
    <form id="upload-form" action="php/upload.php" method="POST" enctype="multipart/form-data" class="space-y-8">
    <!-- Upload area -->
    <div class="space-y-4">
      <label class="block text-sm font-medium text-gray-700 mb-1">
      Upload Images/Files <span class="text-primary">*</span>
      </label>
      <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center">
      <div class="mx-auto w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
        <i data-feather="upload" class="text-indigo-600" style="width:32px;height:32px"></i>
      </div>
      <h3 class="text-lg font-medium text-gray-900 mb-1">Drag and drop files here</h3>
      <p class="text-sm text-gray-500 mb-4">or</p>
      <label class="inline-block px-4 py-2 bg-primary text-white rounded-md hover:bg-primary/90 cursor-pointer">
        Browse Files
        <input
        type="file"
        id="file-input"
        name="file-input[]"
        accept="image/*,video/*"
        class="hidden"
        multiple
        required
        />
      </label>
      <p class="mt-2 text-xs text-gray-500">Supports JPG, PNG, GIF, MP4 up to 5MB</p>
      <div id="file-previews" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mt-6"></div>
      </div>
    </div>
    <!-- Project details -->
    <div class="space-y-6">
      <div>
      <label for="title" class="block text-sm font-medium text-gray-700 mb-1">
        Title <span class="text-primary">*</span>
      </label>
      <input
        id="title"
        name="title"
        type="text"
        class="block w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
        placeholder="Give your work a title"
        required
      />
      </div>
      <div>
      <label for="description" class="block text-sm font-medium text-gray-700 mb-1">
        Description
      </label>
      <textarea
        id="description"
        name="description"
        rows="5"
        class="block w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
        placeholder="Tell us about your work, your process, and the story behind it..."
      ></textarea>
      </div>
      <div>
      <label for="category" class="block text-sm font-medium text-gray-700 mb-1">
        Category <span class="text-primary">*</span>
      </label>
      <select
        id="category"
        name="category"
        class="block w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
        required
      >
        <option value="">Select a category</option>
        <option value="graphic-design">Graphic Design</option>
        <option value="web-design">Web Design</option>
        <option value="video">Video</option>
        <option value="advertising">Advertising</option>
        <option value="illustration">Illustration</option>
        <option value="photography">Photography</option>
        <option value="animation">Animation</option>
        <option value="typography">Typography</option>
        <option value="other">Other</option>
      </select>
      </div>
      <div>
      <label for="tags" class="block text-sm font-medium text-gray-700 mb-1">
        Tags
      </label>
      <div id="tags-container" class="flex flex-wrap gap-2 mb-2">
        <!-- Tags will be added here by JavaScript -->
      </div>
      <div class="relative">
        <input
        id="tags"
        type="text"
        class="block w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
        placeholder="Add tags (press Enter or comma)"
        />
        <button type="button" id="add-tag-btn" class="absolute right-3 top-3 text-primary hover:text-primary/80">
        <i data-feather="plus"></i>
        </button>
      </div>
      <input type="hidden" name="tags" id="tags-hidden" />
      <p class="mt-1 text-xs text-gray-500">Press enter or comma to add tags</p>
      </div>
      <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">Visibility</label>
      <div class="space-y-2">
        <div class="flex items-center">
        <input id="visibility-public" name="visibility" type="radio" value="public" checked class="focus:ring-primary h-4 w-4 text-primary border-gray-300">
        <label for="visibility-public" class="ml-3 block text-sm font-medium text-gray-700">
          Public (Visible to everyone)
        </label>
        </div>
        <div class="flex items-center">
        <input id="visibility-private" name="visibility" type="radio" value="private" class="focus:ring-primary h-4 w-4 text-primary border-gray-300">
        <label for="visibility-private" class="ml-3 block text-sm font-medium text-gray-700">
          Private (Only visible to you)
        </label>
        </div>
      </div>
      </div>
      <div class="flex items-start">
      <div class="flex items-center h-5">
        <input id="allow-comments" name="allow_comments" type="checkbox" checked class="focus:ring-primary h-4 w-4 text-primary border-gray-300 rounded">
      </div>
      <div class="ml-3 text-sm">
        <label for="allow-comments" class="font-medium text-gray-700">Allow comments</label>
        <p class="text-gray-500">Let others comment on your work</p>
      </div>
      </div>
      <div class="flex items-start">
      <div class="flex items-center h-5">
        <input id="allow-hire" name="allow_hire" type="checkbox" checked class="focus:ring-primary h-4 w-4 text-primary border-gray-300 rounded">
      </div>
      <div class="ml-3 text-sm">
        <label for="allow-hire" class="font-medium text-gray-700">Available for hire</label>
        <p class="text-gray-500">Show that you're available for freelance work</p>
      </div>
      </div>
    </div>
    <div class="pt-4 border-t border-gray-200 flex justify-end space-x-4">
      <a
      href="index.php"
      class="retro-button bg-gray-200 text-gray-800 hover:bg-gray-300">
      Cancel
      </a>
      <button
      type="button"
      class="retro-button bg-gray-200 text-gray-800 hover:bg-gray-300"
      id="save-draft"
      >
      Save as Draft
      </button>
      <button
      type="submit"
      class="retro-button bg-primary text-white"
      id="upload-button"
      >
      Publish Work
      </button>
    </div>
    </form>
  </div>
  </div>
  </section>

  <!-- Footer -->
  <!-- ...footer code tetap... -->

  <script src="javascript/script.js"></script>
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    feather.replace();

    // Tag input logic: simpan tags ke input hidden sebelum submit
    const tagsInput = document.getElementById('tags');
    const tagsContainer = document.getElementById('tags-container');
    const tagsHidden = document.getElementById('tags-hidden');
    let tags = [];

    function renderTags() {
    tagsContainer.innerHTML = '';
    tags.forEach((tag, idx) => {
      const span = document.createElement('span');
      span.className = 'bg-primary text-white px-2 py-1 rounded flex items-center';
      span.textContent = tag;
      const removeBtn = document.createElement('button');
      removeBtn.type = 'button';
      removeBtn.className = 'ml-2 text-xs';
      removeBtn.innerHTML = '&times;';
      removeBtn.onclick = () => {
      tags.splice(idx, 1);
      renderTags();
      };
      span.appendChild(removeBtn);
      tagsContainer.appendChild(span);
    });
    tagsHidden.value = tags.join(',');
    }

    tagsInput.addEventListener('keydown', function(e) {
    if (e.key === 'Enter' || e.key === ',') {
      e.preventDefault();
      const value = tagsInput.value.trim();
      if (value && !tags.includes(value)) {
      tags.push(value);
      renderTags();
      }
      tagsInput.value = '';
    }
    });

    document.getElementById('add-tag-btn').addEventListener('click', function() {
    const value = tagsInput.value.trim();
    if (value && !tags.includes(value)) {
      tags.push(value);
      renderTags();
    }
    tagsInput.value = '';
    });

    // Pastikan tags dikirim saat submit
    document.getElementById('upload-form').addEventListener('submit', function() {
    tagsHidden.value = tags.join(',');
    });
  });
  </script>
</body>
</html>
