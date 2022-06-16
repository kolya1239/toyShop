import Splide from "@splidejs/splide";

let splide = document.querySelector(".splide");
if(splide !== null){
    splide = new Splide('.splide', {
        type: 'loop',
        perPage: 6,
        focus: 'center',
    });

    splide.mount();
}
