const form = document.getElementById("book_form");


function submit(num){
  const form = document.getElementById("form" + num);
  console.log("form"+num);
  form.submit();
}