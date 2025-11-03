// Toggle WhatsApp Chat Box
function toggleChat() {
    const chatBox = document.getElementById("chatBox");
    if (chatBox.style.display === "block") {
      chatBox.style.display = "none";
    } else {
      chatBox.style.display = "block";
    }
  }
  
  // Handle Enquiry Form Submission (Optional enhancement)
  document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("enquiryForm");
    form.addEventListener("submit", function (event) {
      event.preventDefault();
  
      // Gather form data
      const formData = new FormData(form);
      const entries = Object.fromEntries(formData.entries());
  
      // Log the data to console or send to backend (if applicable)
      console.log("Form Submitted:", entries);
  
      // Simulate successful message
      alert("Thank you for your enquiry! We will contact you shortly.");
   
  // Wait for the DOM to load
  document.getElementById('enquiryForm').addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent actual form submission

    // Collect form field values
    const product = document.querySelector('input[name="product"]').value.trim();
    const name = document.querySelector('input[name="name"]').value.trim();
    const email = document.querySelector('input[name="email"]').value.trim();
    const country = document.querySelector('select[name="country"]').value.trim();
    const phone = document.querySelector('input[name="phone"]').value.trim();
    const message = document.querySelector('textarea[name="message"]').value.trim();

    // Basic validation
    if (!product || !name || !email || !country || !phone || !message) {
      alert("Please fill out all fields.");
      return;
    }

    if (!validateEmail(email)) {
      alert("Please enter a valid email address.");
      return;
    }

    if (!/^\+?[0-9]{7,15}$/.test(phone)) {
      alert("Please enter a valid phone number.");
      return;
    }

    // All good
    alert("Thank you, " + name + "! Your enquiry has been submitted.");
    document.getElementById('enquiryForm').reset(); // Clear form
  });

  // Helper function to validate email
  function validateEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
  }
      // Reset form
      form.reset();
    });
  });
  
// Scroll to top button (optional feature)
const scrollToTopBtn = document.createElement('button');
scrollToTopBtn.innerText = '↑ Top';
scrollToTopBtn.id = 'scrollToTop';
scrollToTopBtn.style.position = 'fixed';
scrollToTopBtn.style.bottom = '30px';
scrollToTopBtn.style.right = '30px';
scrollToTopBtn.style.padding = '10px 15px';
scrollToTopBtn.style.backgroundColor = '#007c91';
scrollToTopBtn.style.color = '#fff';
scrollToTopBtn.style.border = 'none';
scrollToTopBtn.style.borderRadius = '5px';
scrollToTopBtn.style.display = 'flax';
scrollToTopBtn.style.cursor = 'pointer';
document.body.appendChild(scrollToTopBtn);

// Show/hide scroll-to-top button
window.addEventListener('scroll', () => {
  if (window.scrollY > 200) {
    scrollToTopBtn.style.display = 'block';
  } else {
    scrollToTopBtn.style.display = 'none';
  }
});

// Scroll to top on click
scrollToTopBtn.addEventListener('click', () => {
  window.scrollTo({ top: 0, behavior: 'smooth' });
});

// Smooth scroll for internal nav links
document.querySelectorAll('a[href^="#"]').forEach(link => {
  link.addEventListener('click', function (e) {
    e.preventDefault();
    const targetId = this.getAttribute('href').slice(1);
    const targetSection = document.getElementById(targetId);
    if (targetSection) {
      targetSection.scrollIntoView({ behavior: 'smooth' });
    }
  
})});
//videos

  document.querySelectorAll('.video-item').forEach(item => {
    item.addEventListener('click', function () {
      const videoUrl = this.getAttribute('data-video');
      this.innerHTML = `
        <iframe width="100%" height="200" 
          src="${videoUrl}?autoplay=1&rel=0&showinfo=0" 
          frameborder="0" 
          allow="autoplay; encrypted-media" 
          allowfullscreen>
        </iframe>`;
    });
  });
//whatsapp
function toggleWhatsAppChat() {
  const box = document.getElementById("whatsappChatBox");
  box.style.display = box.style.display === "flex" ? "none" : "flex";
}
document.getElementById("searchIcon").addEventListener("click", function () {
  const query = document.getElementById("searchInput").value;
  if (query.trim() !== "") {
    alert("Searching for: " + query);
    // Optional: redirect to search page
    // window.location.href = "/search?q=" + encodeURIComponent(query);
  }
});

