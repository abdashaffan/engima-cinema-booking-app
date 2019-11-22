const form = document.getElementById("book_form");
const book_btn = document.getElementById("book-submit-btn");

book_btn.addEventListener("click", function() {
  form.submit();
});
