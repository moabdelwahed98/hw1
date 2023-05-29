
const slider = document.querySelector(".burger");
const nav = document.querySelector("nav ul");
if(slider)
{
    slider.addEventListener("click", ()=> {
    nav.classList.add("navactive");
    })
}
const closeSlider = document.querySelector(".close");
if(closeSlider)
{
    closeSlider.addEventListener("click", ()=> {
    nav.classList.remove("navactive");
    })
}

if(JSON.parse(localStorage.getItem("data")).length){
    console.log(document.querySelectorAll(".existence"));
    document.querySelectorAll(".existence").forEach(elem => {elem.classList.add("existence2");});
}
console.log(JSON.parse(localStorage.getItem("data")).length);
// **********************************************************************