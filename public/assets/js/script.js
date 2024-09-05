const $ = (el) => document.querySelector(el);
const $$ = (el) => document.querySelectorAll(el);

const $a = $$("a");

$a.forEach((a) => {
  a.addEventListener("click", (e) => {
    $a.forEach((a) => {
      a.classList.remove("active");
    });

    e.classList.add("active");
  });
});
