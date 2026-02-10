// ==========================
// Vilflix Full JS Interactivity (CLEAN)
// ==========================

console.log("script loaded ✅");


// --- 1. Sticky header on scroll ---

const nav = document.querySelector("nav");
window.addEventListener("scroll", () => {
  if (!nav) return;
  if (window.scrollY > 50) {
    nav.style.background = "#141414";
    nav.style.boxShadow = "0 2px 10px rgba(0,0,0,0.5)";
  } else {
    nav.style.background = "transparent";
    nav.style.boxShadow = "none";
  }
});

// --- 2. Hero "Get Started" email validation ---
const getStartedBtn = document.querySelector(".hero-buttons button");
const emailInput = document.querySelector(".hero-buttons input");

if (getStartedBtn && emailInput) {
  getStartedBtn.addEventListener("click", () => {
    const email = emailInput.value.trim();
    if (email === "") {
      alert("Please enter your email address!");
    } else {
      alert(`Welcome to Vilflix, ${email}!`);
    }
  });
}

// --- 3. Optional: Set favicon dynamically ---
const favicon = document.querySelector("link[rel='icon']");
if (favicon) {
  favicon.href = "assets/images/vilflix-favicon.png";
}

// --- 4. FAQ toggle (your current HTML uses .faqbox + .answer) ---
const faqBoxes = document.querySelectorAll(".faqbox");
faqBoxes.forEach(box => {
  box.addEventListener("click", () => {
    box.classList.toggle("open");
  });
});

// ==========================
// MODALS (Login / Register) - NEW SYSTEM ONLY
// ==========================
function openModal(id) {
  const el = document.getElementById(id);
  if (el) el.classList.add("show");
}

function closeModal(id) {
  const el = document.getElementById(id);
  if (el) el.classList.remove("show");
}

// Open buttons in navbar
const btnOpenLogin = document.getElementById("btnOpenLogin");
if (btnOpenLogin) btnOpenLogin.addEventListener("click", () => openModal("loginModal"));

const btnOpenRegister = document.getElementById("btnOpenRegister");
if (btnOpenRegister) btnOpenRegister.addEventListener("click", () => openModal("registerModal"));

// Close buttons (X)
document.querySelectorAll(".modal-close").forEach(btn => {
  btn.addEventListener("click", () => {
    closeModal(btn.dataset.close);
  });
});

// Click outside modal-content closes modal
document.querySelectorAll(".modal").forEach(modal => {
  modal.addEventListener("click", (e) => {
    if (e.target === modal) modal.classList.remove("show");
  });
});

// Switch links inside modal
const openRegister = document.getElementById("openRegister");
if (openRegister) {
  openRegister.addEventListener("click", (e) => {
    e.preventDefault();
    closeModal("loginModal");
    openModal("registerModal");
  });
}

const openLogin = document.getElementById("openLogin");
if (openLogin) {
  openLogin.addEventListener("click", (e) => {
    e.preventDefault();
    closeModal("registerModal");
    openModal("loginModal");
  });
}

// Auto-open from URL ?modal=login or ?modal=register
const params = new URLSearchParams(window.location.search);
const modalParam = params.get("modal");
if (modalParam === "login") openModal("loginModal");
if (modalParam === "register") openModal("registerModal");

window.addEventListener("DOMContentLoaded", () => {
  console.log("DOM ready ✅");

  const btnLogin = document.getElementById("btnOpenLogin");
  const btnRegister = document.getElementById("btnOpenRegister");

  const loginModal = document.getElementById("loginModal");
  const registerModal = document.getElementById("registerModal");

  console.log("Found:", {
    btnLogin: !!btnLogin,
    btnRegister: !!btnRegister,
    loginModal: !!loginModal,
    registerModal: !!registerModal
  });

  if (btnLogin && loginModal) {
    btnLogin.addEventListener("click", () => loginModal.classList.add("show"));
  }

  if (btnRegister && registerModal) {
    btnRegister.addEventListener("click", () => registerModal.classList.add("show"));
  }
});
