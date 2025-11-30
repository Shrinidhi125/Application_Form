// Smooth scroll reveal
function revealForm() {
  document.querySelectorAll(".appear").forEach((el) => {
    if (el.getBoundingClientRect().top < window.innerHeight - 50) {
      el.classList.add("visible");
    }
  });
}

window.addEventListener("scroll", revealForm);
window.addEventListener("load", revealForm);
