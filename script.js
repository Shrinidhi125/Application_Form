function reveal() {
  document.querySelectorAll(".appear").forEach((el) => {
    if (el.getBoundingClientRect().top < window.innerHeight - 50) {
      el.classList.add("visible");
    }
  });
}
window.addEventListener("scroll", reveal);
window.addEventListener("load", reveal);
