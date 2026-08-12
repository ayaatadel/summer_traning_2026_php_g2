// // let person={
// //     // properities , methods
// //     name:"iti",
// //     address:"menoufia",
// //     email:"iti@gmail.com",
// //     print()
// //     {
// //         console.log(this); // this refer on current object (person)
// //         console.log("hello");
// //         console.log(this.name,this.address,this.email);

// //     }
// // }

// // var employee={
// // password:"123456789",
// // id:1,
// // register(x){
// //         // undefined , undefined ==>
// //             /**
// //              * name
// //              * email
// //              * ------------> person ===> this
// //              * this ===> refere person
// //              *
// //              *
// //              *  */
// //     console.log(this.name,this.email,x);

// // }

// // }

// // person.print()
// // employee.register();

// // -------- call
// // employee.register.call(person,"test")
// // obj_name.key

// //------------- apply -----
// // employee.register.apply(person,["test"])

// //-------------- bind
// // console.log(employee.register.bind(person,"test"));

// // employee.register.bind(person,"test")()

// // change object of this
// /**
//  * call   ===> change caller (chnage current object of this) + run
//  *
//  *
//  *
//  * apply ==> call + parametars take parameters in array
//  *
//  *
//  *
//  * bind : change caller + return body of function
//  *
//  * user will call it when he want to use it
//  *
//  *
//  *
//  *
//  *
// */

// // let person={
// //     // properities , methods
// //     name:"iti",
// //     address:"menoufia",
// //     email:"iti@gmail.com",
// //     print()
// //     {
// //         console.log(this); // this refer on current object (person)
// //         console.log("hello");
// //         console.log(this.name,this.address,this.email);

// //     }
// // }

// // edit
// // person.address="cairo"

// // Object.freeze(person)
// // Object.seal(person)
// // person.address="cairo"
// // person.id=1
// // console.log(person);

// /**
//  * freeze :  prevent user to update or add new properity to object
//  *
//  *
//  * seal : let user to update but prevent user to add new properity
//  */

// //=============================

// /**
//  * function constructor
//  * create more than object with same strucre ==> new
//  * this --> refer on new object
//  * implictly return ===>
//  */

// // function User(name,email, address){
// //     // user : name , email , address
// // this.name=name;
// // this.address=address;
// // this.email=email;

// // }

// // // new
// // var user1=new User("mohammed","mohammed@gmail.com","cairo")
// // var user2=new User("mohmoud","mahmoud@gmail.com","cairo")
// // user1.print=function()
// // {
// //     console.log("hello");

// // }
// // user1.id=5;
// // console.log(user1,user2);

// //=================== JS Engine (execute code) ===============
// /**
//  * chrome : v8
//  * edge: v8
//  * Node.js:V8
//  * Firefox : spiderMonkey
//  * safari:JavaScriptCore
//  *
//  *
//  * -------------- Js Engine
//  *  Memory Heap  ===> object
//  * Call Stack  ==> function  ===>
//  *
//  *
//  * === Call Stack =========
//  *
//  * global Execution : Global Variables
//  *  execution context : define  function execution context
//  * ==== use variable not in function but in execution ==> use that in execution
//  *
//  *  after function finshed it will be deleted from execution context
//  */
// // console.log(x);

// // var x=10;
// // function print()
// // {
// //     var y=17
// //     var x=10;   // new variable in function
// //     console.log("hello");
// //     first();
// //     console.log(x);
// //     console.log(y);
// // }
// // function first()
// // {
// //     console.log("first");
// //     console.log(x);

// // }
// // function second()
// // {
// //      x=13;
// //     console.log("second");
// //     console.log(x);
// // }
// // var x=5;
// // print();
// // second();
// // console.log(x);

// /////============================  ASynchronous function

// /**
//  * setTimeOut
//  * setInterval
//  */
// print : func
// function print() {
//   setTimeout(() => {
//     console.log("first");
//     console.log(x);
//   }, 2000);
//   setTimeout(() => {
//     var x = 5;
//     console.log("second");
//     console.log(x);
//   }, 1000);
// }
// function test() {
//   setTimeout(() => {
//     x = 12;
//   }, 1000);
// }
// var x = 10;
// console.log(x); //undefined-> 10  -> (12 second 5 first   12
// test();
// print();

// let result=setTimeout(() => {
//     console.log("time function");
//   // 1000ms --> 1 second
// }, 1000);
// console.log( result);

// print();

//================ Js Runtime : environment that run js code ===
/**
 * jsEngine  ==> call Stack ==> global execution (global variables) , execution context (function execution context)
 * Js APIs   ==> Dom + Timers (Asynchrouns function until time finshed)
 * Callback Queue (time function that finshed time in Js APIs)
 * Event loop  (check if Js Execution context is Empty or not)
 *
 */

// =============== DOM   ==========
/**
 * DOM : Document Object Model
 *
 *
 * ====> html : control   ===>create , update , delete , style , action
 *
 * select :
 *  id
 * name  : tag name
 * name : attribute on elemnt
 * class
 * querySelector  : one element 
 * qurySelector all : node list
 */

let head = document.getElementById("head");
console.log(head);
head.innerText="js"
head.innerHTML=`<span> HTML BY JS<span>`

let container = document.getElementsByClassName("content");
// console.log(container[0]); // HTML Collection ===> array (element)
// /**
//  * select elements by index
//  */

// // let text=document.getElementsByTagName("p")
// let text = document.getElementsByName("pg"); // node list ==> array [elments]
// // console.log(text[0]);
// console.log(text);

// let spanContent = document.querySelector("#textSpan");
// console.log(spanContent);

// let test = document.querySelectorAll(".content"); 
// console.log(test);

/**
 * content of elemnt
 *======== html , text

 <span>  test (text) </span>: html
 */
// container[0].innerHTML=`
// <span id="textSpan" style='color:red'>text</span>
// <p id="textSpan" style='color:red'>fdf,mfgnadfj,hgjhdfajghjkdfhjkhj</p>
// `
// container[0].innerText=`
// <span id="textSpan" style='color:red'>text</span>
// <p id="textSpan" style='color:red'>fdf,mfgnadfj,hgjhdfajghjkdfhjkhj</p>
// `
