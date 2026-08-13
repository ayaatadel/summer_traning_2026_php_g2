/**
 * DOM
 * document ==> html
 *   --DOM tree   ===> node
 *    -- documt ---> html
 *
 * select ---> id , name , tagName , class , querySelector ,querySelectorALL
 *   == global selectors
 *     ---title
 *     --- body
 *     --- forms
 *     ---
 *
 * BOM
 */
// DOM : Document Object Model

// console.log(document);

// let text = document.getElementById("text");
// text.innerHTML="<p> html </p>"
// text.textContent="<p> html </p>"
// document.title="JS Day5"
// console.log(document.title);

// console.log(document.forms[0]);
// console.log(document.body);

// console.log(document.images[0]);

// =============== style
/**
 * elemnt.style.proName="value"
 * elemnt.style.cssText=``
 *  */

//    text.style.textAlign="center"
//    text.style.cssText=`
// background-color: rgb(197, 197, 197);
// text-align: center;

//    `

//    === class

// text.classList.add("textColor","text-content");
// // text.classList.remove("text-content");
// // text.classList.toggle("text-content");
// console.log(text.classList.contains("text-content"));

// === attributes
/**
 * ========== add attribute
 *       --elemnt.attr_name=value
 *       --elemnt.setAttribute("attr_name",value)
 * getAttrinute
 * setAttrinute
 * removeAttrinute
 */

// let imgs=document.images;

// // imgs[0].src="../Day4/imgs/js_Engine.png"
// imgs[0].setAttribute("src","../Day4/imgs/js_Engine.png")
// imgs[0].width=200
// imgs[0].height=200

// imgs[0].removeAttribute("alt")

// console.log(imgs[0].getAttribute("src"));

//-------------------- Create Element ------------------

var products=[
    {
     price:"20$",
     name:"product1"
    }, {
     price:"20$",
     name:"product2"
    },
     {
     price:"20$",
     name:"product3"
    }
]
var container=document.createElement("div")
container.classList.add("container")

function createProduct(product)
{
    console.log(product);

let card=document.createElement("div")
card.classList.add("card")

let cardImage=document.createElement("img")
cardImage.classList.add("imag")
cardImage.src="../Day4/imgs/js_Engine.png"

let cardButton=document.createElement("button")
cardButton.innerText="Add To Cart"

let name=document.createElement("p")
name.innerText=product.name

let price=document.createElement("p")
price.innerText=product.price

card.append(cardImage,name,price,cardButton)
container.appendChild(card)
document.body.appendChild(container)
}

products.forEach((product)=>{
// console.log(e);
createProduct(product)

})

// ================================   Event =================
/**
 * onEvent
 * addEventListener
 */

// let btn=document.getElementById("btn")
// btn.onclick=print;

// function print()
// {
//     console.log("start event");

// }

// btn.onclick=()=>{
// console.log("click");
// }

// let btn = document.getElementById("btn");
// let inputData = document.getElementById("u-input");
// let pgText = document.getElementById("text");
// // btn.addEventListener("click", (e) => {
// //   // console.log(e);
// //   // console.log(e.target);
// //   // console.log(inputData.value);
// //   pgText.innerText = inputData.value;

// //   console.log("start event");
// // });
// // btn.addEventListener('click',()=>{
// //     console.log("click");
// // })

// inputData.addEventListener("keydown", (e) => {
//   // console.log(e);
//   // console.log(e.target);
//   // console.log(inputData.value);
// //   pgText.innerText = inputData.value;
// //   console.log(inputData.value);
// e.preventDefault();
//   console.log(e.key);
//   console.log(e.code);

// //   console.log("start event");
// });

//
// ====>

//   let btn=  document.getElementById("btn")
//     btn.remove()

//================== BOM : Browser object model

// var win;
// let btnOpen = document.getElementById("btn-open");
// let btnClose = document.getElementById("btn-close");
// let btnResizeTO = document.getElementById("btn-resize");
// let btnResizeBy = document.getElementById("btn-resizeBy");
// let btnMoveTo = document.getElementById("btn-moveTo");
// let btnMoveBy = document.getElementById("btn-moveBy");
// let btnFocus=document.getElementById('focus')
// btnOpen.addEventListener("click", () => {
//   win = window.open("./about.html", "_blank", "width=500;height=500");
// });

// btnClose.addEventListener("click", () => {
//   win.close();
// });
// btnFocus.addEventListener("click", () => {
//   win.focus();
// });
// btnResizeTO.addEventListener("click", () => {
//   win.focus();
//   win.resizeTo(100, 100);
// });
// btnResizeBy.addEventListener("click", () => {
//   win.focus();
//   win.resizeBy(200, 200);
// });

// btnMoveTo.addEventListener("click", () => {
//   win.focus();
//   win.moveTo(200, 200);
// });

// btnMoveBy.addEventListener("click", () => {
//   win.focus();
//   win.moveBy(200, 200);
// });

// Ajax : asynchronous java Script and XML  : json   ===> {"key":"value"}

// =======> xml http request  ======> XMLHTTPREQUEST
/**
 * REQUEST : get data , add data  ,delete data , update
 *
 */

let xhr = new XMLHttpRequest();

try {
  xhr.open("GET", "https://dummyjson.com/products");
//   xhr.open("GET", "https://jsonplaceholder.typicode.com/users");
  var test = xhr.send();
  console.log(test);

  xhr.onreadystatechange = () => {
    // console.log(xhr.response);
    if (xhr.readyState == 4) // request sent
    {
      if (xhr.status == 200) // data already exist
      {
        let result = JSON.parse(xhr.response);  // session
        console.log(typeof result);

        console.log(result);
      }
    }
  };
} catch (error) {

    console.log("error with code");
    
}
