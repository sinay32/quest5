
let fly = document.querySelector(".flyJet");
document.addEventListener("DOMContentLoaded", function ()
    {
        fly.classList.toggle("letsFly");
        setTimeout(()=>
    {
        fly.classList.toggle("flyJet");
    }, 200);
    });
