const footerLower = document.querySelector('.right_side_container_ft');
const rightMd = document.querySelector('.right_side_cont_md');
const size_choser = document.querySelector('.size_chooser_')
const size_choserrr = document.querySelector('.size_chooser_').children
const add_cart = document.querySelector('.add_to_cart__')
const square__size_el = document.querySelectorAll('.square__size_el')
const choser_width = document.querySelectorAll('.choser_width__')
const mainPrice = document.querySelector('.right_side_container_title')
let switcherWidth = false  
let jsonObj = {}

function updateWindowSize() {
    const width = window.innerWidth;
    const height = window.innerHeight;
    console.log(`Width: ${width}px, Height: ${height}px`);

    if (footerLower) {
        if (width <= 1170) {
            footerLower.style.display = "none";
            rightMd.style.display = "block";
        } else if (width > 1170) {
            footerLower.style.display = "flex";
            rightMd.style.display = "none";
        }
    }
}

window.addEventListener('resize', updateWindowSize);

updateWindowSize();

const title_shop = document.querySelectorAll(".md");
const hidn = document.querySelectorAll('.containerContentmd');
const symbolMd = document.querySelectorAll('.symbolMd');


title_shop.forEach((element, index) => {
    element.addEventListener("click", (e) => {
        console.log(index)

        if (symbolMd[index].innerText == "+") {
            symbolMd[index].innerText = "-";
            hidn[index].style.display = "flex";
            hidn[index].style.flexDirection = "column";
        } else {
            symbolMd[index].innerText = "+";
            hidn[index].style.display = "none";
        }
    });
});



// square__size_el.forEach((element,index)=>{
//     element.addEventListener('click' , (e)=>{
//         const lenSize = size_choserrr.length
//         for(let i =0; i < lenSize; i++){
//             size_choserrr[i].style.background = "#FCF9F4"
//         }
//         let bgChange = e.target
//         add_cart.innerHTML = `Select Your Width !`;
//         add_cart.href = "#"
//         // add_cart.href = "cart.html"
//         add_cart.style.background = "#E1E1DD"
//         add_cart.style.color = "#656563"
//         switcherWidth = false
//         if (bgChange) {
//             jsonObj["size"] = bgChange.innerHTML
//             // console.log(jsonObj)
//             bgChange.style.background = "#C2C2C0";
//             choser_width.forEach((ele,index)=>{
//                 ele.style.background = "#FCF9F4 "
//                 choser_width[0].addEventListener('click' , (e)=>{
//                     choser_width[1].style.background = "#FCF9F4"
//                     let bgChange = e.target
//                     bgChange.style.background = "#C2C2C0"
//                     switcherWidth = true
//                     if(switcherWidth)
//                         add_cart.innerHTML = `<i class="fa fa-shopping-cart"></i> Add To Cart - ${mainPrice.innerHTML}`;
//                         // add_cart.href = "cart.html"
//                         add_cart.style.background = "#314838"
//                         add_cart.style.color="white"
//                         add_cart.href = "https://fitnewketo.com/click"
//                         jsonObj["width"] = "D-AVERAGE"

        
//                 })

//                 choser_width[1].addEventListener('click' , (e)=>{
//                     choser_width[0].style.background = "#FCF9F4"
//                     let bgChange = e.target
//                     bgChange.style.background = "#C2C2C0"
//                     switcherWidth = true
//                     if(switcherWidth)
//                         add_cart.innerHTML = `<i class="fa fa-shopping-cart"></i> Add To Cart - ${mainPrice.innerHTML}`;
//                         // add_cart.href = "cart.html"
//                         add_cart.style.background = "#314838"
//                         add_cart.style.color="white"
//                         add_cart.href = "https://fitnewketo.com/click"
//                         jsonObj["width"] = "EE-WIDE"

//                 })
//             })
//         }
//     })
    
// })


/* carousel */

// const carousel = document.querySelector('.carousel-inner');
// const items = document.querySelectorAll('.carousel-item');
// const prev = document.querySelector('.carousel-control-prev');
// const next = document.querySelector('.carousel-control-next');
// let index = 0;

// function showItem(index) {
//     carousel.style.transform = `translateX(${-index * 100}%)`;
// }

// prev.addEventListener('click', () => {
//     index = (index > 0) ? index - 1 : items.length - 1;
//     showItem(index);
// });

// next.addEventListener('click', () => {
//     index = (index < items.length - 1) ? index + 1 : 0;
//     showItem(index);
// });


// const sub_cont_selector = document.querySelectorAll('.sub_cont_img_color')
// const color_light = document.querySelector('.ligh_details')
// const getImage = document.querySelectorAll(".imagerVar")
// const getImageMb = document.querySelectorAll(".imagerVar_mb")


//     sub_cont_selector[0].addEventListener('click', (e)=>{
//         sub_cont_selector[0].style.borderColor = "lightskyblue"  
//         sub_cont_selector[1].style.borderColor = "#FCF9F4" 
//         color_light.innerText = "CHOCOLATE" 
//         jsonObj["color"] = color_light.innerText
        
//         getImage.forEach((element,index)=>{
//             element.src = `assets/${index+1}_${color_light.innerText.toLowerCase()}.webp`
//             console.log(index)
//         })

//         if(getImageMb) {
//             getImageMb.forEach((el1,in1)=>{
//                 el1.src = `assets/${in1+1}_${color_light.innerText.toLowerCase()}.webp`
//                 console.log(in1)
//             })
//         }



//     })
//     sub_cont_selector[1].addEventListener('click', (e)=>{
//         sub_cont_selector[1].style.borderColor = "lightskyblue"  
//         sub_cont_selector[0].style.borderColor = "#FCF9F4"  
//         color_light.innerText = "BLACK" 
//         jsonObj["color"] = color_light;
        
//         // for(let j = 0; j<getImage.length;j++) {

//         // }
//         getImage.forEach((element,index)=>{
//             element.src = `assets/${index+1}_${color_light.innerText.toLowerCase()}.webp`
//             console.log(index)
//         })

//         if(window.innerWidth < 1217) {
//             getImageMb.forEach((element,index)=>{
//                 element.src = `assets/${index+1}_${color_light.innerText.toLowerCase()}.webp`
//                 console.log(index)
//             }
//         )}
//     })


// const colorer = document.querySelector('.colorr')
// const widther = document.querySelector('.widthr')
// const sizer = document.querySelector('.sizer')


// add_cart.addEventListener('click', () => {
//     // Stocker les données de jsonObj dans localStorage
//     localStorage.setItem('cartData', JSON.stringify(jsonObj));
//     // Rediriger vers cart.html
//     // window.location.href = "cart.html";
// });

