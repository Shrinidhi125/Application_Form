// Reuse reveal animation
function handleReveal() {
  document.querySelectorAll(".reveal").forEach((el) => {
    const top = el.getBoundingClientRect().top;
    const windowHeight = window.innerHeight;
    if (top < windowHeight - 60) {
      el.classList.add("visible");
    }
  });
}

window.addEventListener("scroll", handleReveal);
window.addEventListener("load", handleReveal);

$(document).ready(function () {
  // Simple validation example
  $("#appForm").on("submit", function (e) {
    const name = $("#fullname").val().trim();
    const phone = $("#phone").val().trim();

    if (!name || phone.length !== 10) {
      alert("Please enter a valid name and 10-digit phone number.");
      e.preventDefault();
    }
  });

  // Live photo preview
  $("#photo").on("change", function (event) {
    const file = event.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function (e) {
      $("#photoPreview").attr("src", e.target.result).show();
    };
    reader.readAsDataURL(file);
  });
});
