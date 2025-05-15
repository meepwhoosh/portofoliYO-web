document.addEventListener('DOMContentLoaded', function() {
  // Initialize feather icons
  feather.replace();
  
  // Mobile menu toggle
  const mobileMenuButton = document.getElementById('mobile-menu-button');
  const mobileMenu = document.getElementById('mobile-menu');
  
  if (mobileMenuButton && mobileMenu) {
    mobileMenuButton.addEventListener('click', function() {
      mobileMenu.classList.toggle('hidden');
    });
  }
  
  // Like button functionality
  const likeButtons = document.querySelectorAll('.like-button');
  likeButtons.forEach(button => {
    button.addEventListener('click', function() {
      // Toggle active class
      this.classList.toggle('text-gray-600');
      this.classList.toggle('text-primary');
      
      // Find the heart icon and toggle fill
      const heartIcon = this.querySelector('i[data-feather="heart"]');
      if (heartIcon) {
        if (this.classList.contains('text-primary')) {
          heartIcon.setAttribute('fill', 'currentColor');
        } else {
          heartIcon.setAttribute('fill', 'none');
        }
        feather.replace(); // Re-render icons
      }
      
      // Update like count
      const likeCount = this.querySelector('.like-count');
      if (likeCount) {
        let count = parseInt(likeCount.textContent);
        if (this.classList.contains('text-primary')) {
          count += 1;
        } else {
          count -= 1;
        }
        likeCount.textContent = count;
      }
    });
  });
  
  // Follow button functionality
  const followButtons = document.querySelectorAll('.follow-button');
  followButtons.forEach(button => {
    button.addEventListener('click', function() {
      this.classList.toggle('bg-secondary');
      this.classList.toggle('bg-gray-200');
      this.classList.toggle('text-white');
      this.classList.toggle('text-gray-800');
      
      if (this.textContent.trim() === 'Follow') {
        this.textContent = 'Following';
      } else {
        this.textContent = 'Follow';
      }
    });
  });
  
  // Comment form functionality
  const commentForm = document.getElementById('comment-form');
  const commentsContainer = document.getElementById('comments-container');
  
  if (commentForm && commentsContainer) {
    commentForm.addEventListener('submit', function(e) {
      e.preventDefault();
      
      const commentText = document.getElementById('comment-text').value;
      if (!commentText.trim()) return;
      
      const newComment = document.createElement('div');
      newComment.className = 'flex space-x-4 mb-6';
      newComment.innerHTML = `
        <img src="https://via.placeholder.com/40" alt="Your Avatar" class="h-10 w-10 rounded-full">
        <div class="flex-1">
          <div class="bg-gray-50 rounded-lg p-4">
            <div class="flex justify-between mb-1">
              <span class="font-semibold">You</span>
              <span class="text-sm text-gray-500">Just now</span>
            </div>
            <p class="text-gray-700">${commentText}</p>
          </div>
          <div class="flex space-x-4 mt-2 text-sm text-gray-500">
            <button class="hover:text-primary">Like (0)</button>
            <button class="hover:text-primary">Reply</button>
          </div>
        </div>
      `;
      
      commentsContainer.prepend(newComment);
      document.getElementById('comment-text').value = '';
    });
  }
  
  // Category filter for explore page
  const categoryButtons = document.querySelectorAll('.category-button');
  const workItems = document.querySelectorAll('.work-item');
  
  if (categoryButtons.length && workItems.length) {
    categoryButtons.forEach(button => {
      button.addEventListener('click', function() {
        // Update active button
        categoryButtons.forEach(btn => btn.classList.remove('bg-primary', 'text-white'));
        this.classList.add('bg-primary', 'text-white');
        
        const category = this.getAttribute('data-category');
        
        // Show/hide works based on category
        workItems.forEach(item => {
          if (category === 'all') {
            item.style.display = 'block';
          } else if (item.getAttribute('data-category') === category) {
            item.style.display = 'block';
          } else {
            item.style.display = 'none';
          }
        });
      });
    });
  }
  
  // Tags input functionality for upload page
  const tagInput = document.getElementById('tags');
  const tagsContainer = document.getElementById('tags-container');
  
  if (tagInput && tagsContainer) {
    const tags = [];
    
    tagInput.addEventListener('keydown', function(e) {
      if (e.key === 'Enter' && this.value.trim() !== '') {
        e.preventDefault();
        const tag = this.value.trim();
        
        if (!tags.includes(tag)) {
          tags.push(tag);
          const tagElement = document.createElement('div');
          tagElement.className = 'px-3 py-1 bg-soft-blue rounded-full text-sm flex items-center';
          tagElement.innerHTML = `
            <span>${tag}</span>
            <button type="button" class="ml-2 remove-tag">
              <i data-feather="x" class="text-gray-600 h-3 w-3"></i>
            </button>
          `;
          
          tagsContainer.appendChild(tagElement);
          feather.replace();
          
          // Add event listener to remove tag
          const removeButton = tagElement.querySelector('.remove-tag');
          removeButton.addEventListener('click', function() {
            const index = tags.indexOf(tag);
            if (index > -1) {
              tags.splice(index, 1);
            }
            tagElement.remove();
          });
        }
        
        this.value = '';
      }
    });
  }
  
  // File upload preview
  const fileInput = document.getElementById('file-input');
  const previewContainer = document.getElementById('file-previews');
  
  if (fileInput && previewContainer) {
    fileInput.addEventListener('change', function(e) {
      const files = e.target.files;
      
      // Create preview for each file
      for (let i = 0; i < files.length; i++) {
        const file = files[i];
        const reader = new FileReader();
        
        reader.onload = function(e) {
          const preview = document.createElement('div');
          preview.className = 'relative aspect-video bg-gray-100 rounded-lg overflow-hidden';
          
          // For images
          if (file.type.startsWith('image/')) {
            preview.innerHTML = `
              <img src="${e.target.result}" alt="Preview" class="w-full h-full object-cover">
              <button type="button" class="absolute top-2 right-2 bg-white rounded-full p-1 shadow-md hover:bg-gray-100 remove-file">
                <i data-feather="x" class="h-4 w-4"></i>
              </button>
            `;
          } 
          // For videos
          else if (file.type.startsWith('video/')) {
            preview.innerHTML = `
              <video src="${e.target.result}" class="w-full h-full object-cover"></video>
              <button type="button" class="absolute top-2 right-2 bg-white rounded-full p-1 shadow-md hover:bg-gray-100 remove-file">
                <i data-feather="x" class="h-4 w-4"></i>
              </button>
            `;
          }
          
          previewContainer.appendChild(preview);
          feather.replace();
          
          // Add event listener to remove button
          const removeButton = preview.querySelector('.remove-file');
          removeButton.addEventListener('click', function() {
            preview.remove();
            // Note: This doesn't actually remove the file from the input
            // In a real app you would need to clear and recreate the input
          });
        };
        
        reader.readAsDataURL(file);
      }
    });
  }

  // Profile tab switching functionality
  const tabButtons = document.querySelectorAll('.tab-button');
  const tabContents = document.querySelectorAll('.tab-content');
  
  if (tabButtons.length && tabContents.length) {
    tabButtons.forEach(button => {
      button.addEventListener('click', function() {
        const tab = this.getAttribute('data-tab');
        
        // Update active button
        tabButtons.forEach(btn => {
          btn.classList.remove('border-primary', 'text-primary');
          btn.classList.add('text-gray-500', 'hover:text-gray-700');
        });
        this.classList.remove('text-gray-500', 'hover:text-gray-700');
        this.classList.add('border-primary', 'text-primary');
        
        // Show active tab content
        tabContents.forEach(content => {
          if (content.getAttribute('data-tab') === tab) {
            content.classList.remove('hidden');
          } else {
            content.classList.add('hidden');
          }
        });
      });
    });
  }
});
