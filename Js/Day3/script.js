/**
 * functions : 
 *    -- Decleration Function
 *    -- Expression Function
 *    -- Anonous function
 *    -- Arrow Function
 *    -- call back Function
 *    
 * 
*    * constructor function 
*    * generator function 
*    * Async Function 
*    * high order function ----> call back function 


 */

//  high order function ----> call back function

// var result = function () {
//   console.log("result");
// };

// Call back function
// function can be called by another function
// function can be take as a parameter in funtion
// function can be returned by another function

// function sayHello() {
//   console.log("hello" );
// }

// function great(callback) {
//   // callback ==> parameter
//   sayHello();
//   callback(); // callback call ===> function
// }
// console.log(sayHello);

// great(sayHello); // sayHello : call back function ==> pass as a paremeter to another function

// callback take parameter

// function sayHello(name) {
//   console.log("hello" , name);
// }

// function great(callback,name) {
//   // callback ==> parameter
//   sayHello("mohammed");
//   callback(name); // callback call ===> function
// }
// console.log(sayHello);

// great(sayHello,"mohammed");

// // function sayHello() {
// //   console.log("hello" );
// // }

// function great(callback) {
//   // callback ==> parameter
// //   sayHello();
// console.log(callback);

//   callback(); // callback call ===> function
// }

// great(sayHello)  // paramete ==> call
// great(function()   // anonoums function
// {
//     console.log("hello");

// });

// callback=function()
// {
//     console.log("hello");

// };

// pass as arrow function

// function sayHello() {
//   console.log("hello" );
// }

// function great(callback, name) {
//   // callback ==> parameter
// //   sayHello();
// console.log(callback);

//   callback(name); // callback call ===> function
// }

// // great((name)=>{
// //     console.log("hello" , name);

// // },"test")

// great(function(name)   // anonoums function
// {
//     console.log("hello",name);

// },"iti");

// ================= Example ==========

// function calculate(a,b,operation)
// {
//     return operation(a,b)
// }

// function add(a,b)
// {
//     return a+b;
// }

// function mul(a,b)
// {
//     return a*b;
// }

// var result=calculate(1,2,function (a,b)
// {
//     return a+b;
// });
// var result=calculate(1,2,function (a,b)
// {
//     return a*b;
// });

// var result=calculate(6,2,add);
// var result=calculate(1,2,mul);
// console.log(result);

//----------------------- Array apis ------------
//    -- foreach
//    -- map
//    -- filter
//    -- find
//    -- some
//    -- Every
//    --- reduce  ========> search

// var names = ["mohammed", "mahmoud", "abd alrahman"];

// // for (var index=0;index<names.length;index++) {

// //    console.log(index);
// // }

// names.forEach((ele, index, arr) => {
//   console.log(index);
//   console.log(ele);
//   console.log(arr);
// });

// function data(elemnt,index,arr)
// {
//     console.log(elemnt, index , arr);

// }

// for (var index=0;index<names.length;index++) {

//   data(names[index], index, names);
// }

// products = [
//   {
//     id: 1,
//     name: "product 1",
//     price: 2000,
//   },
//   {
//     id: 2,
//     name: "product 2",
//     price: 3000,
//   },
//   {
//     id: 2,
//     name: "product 2",
//     price: 4000,
//   },
// ];
// products.forEach(function(ele , index,arr){
// // console.log(ele["name"]  );
// console.log(ele.id );

// })

//======================== map : reurn arr[elemnets]
/**
 * condition ==> any emelemt not match condition => return array and value of this element will be undefine
 */

// return value
// var result=products.map((ele,index,arr)=>{
// // console.log(ele);
// // console.log(index);
// // console.log(arr);
// // if(ele.price>3000)  // ["undefined",undefined]
// // if(ele.price>2000)  // [undefined,{}]
// if(ele.price>1000)  // [{},{}]
// {
//     return ele;
//     // [undefined , {}]

// }

// })

// ===================== filter
// var result=products.filter((ele,index,arr)=>{
// // console.log(ele);
// // console.log(index);
// // console.log(arr);
// // if(ele.price>3000)  // []
// if(ele.price>2000)  // [{}]
// // if(ele.price>1000)  // [{},{}]
// {
//     return ele;
//     // [undefined , {}]

// }

// })
// console.log(result);

//========================= find

// var result=products.find((ele,index,arr)=>{
// // console.log(ele);
// // console.log(index);
// // console.log(arr);

// return ele.price>1000;

// })
// var result=products.find((ele,index,arr)=>{
// // console.log(ele);
// // console.log(index);
// // console.log(arr);

// // return ele.price>2000; // return first elemnt match condition
// return ele.price>8000; // undefined

// })

// var products=[2000,3000,4000]
// var result=products.find((ele,index,arr)=>{
// // console.log(ele);
// // console.log(index);
// // console.log(arr);

// return ele.price>1000;

// })

// var result=products.some((ele,index,arr)=>{
// // console.log(ele);
// // console.log(index);
// // console.log(arr);

// return ele.price>2000;  // true

// })

// var result=products.every((ele,index,arr)=>{
// // console.log(ele);
// // console.log(index);
// // console.log(arr);

// return ele.price>=2000;  // true

// })
// if(result){
//     console.log("high price");

// }
// console.log(result);

/**         array apis
 * foreach : loop on array not retun
 * map : loop on array and return array with same length of array
 * filter : loop on array and return array with  elemnt match condition
 *
 * find : search on element : return first element match condition
 * ------ undefined : all elemnts not match condition
 * some : true : at least one element match condition
 * some : false : all elements  not match condition
 * every : true : all elements match condition
 * some : false :  at least one element   not match condition
 */

// High Order Function ==> HOF : function that call back function

/**
 * filter
 * map
 * reduce
 * find
 * foreach
 */

//========= Synchronus && Asynchronous functions =====
/**
 * Synchronus  : function exectute line by line
 * Asynchronous Function : time
 *  (setTimeOut , setInterval) => callback function --> time
 *
 *
 * setTimeOut : execute code on time after time end
 * setInterval : repete exectue every time
 */
// function first()
// {
//     console.log("first");

// }
// function print()
// {
//     first();
//     console.log("hello");

// }
// print()

// var interval=setInterval(()=>{
//     console.log("track php");

// },1000)

// setTimeout(() => {
//    clearInterval(interval)
// }, 1000);

// destructuring in array & object

// var arr=["iti","menoufia","php"]

// var branch=arr[0]
// var track=arr[1]

// var branch , track;
// // [branch,track]=arr;
// [,branch,track]=arr;

// console.log(branch,track);

var person = {
  name: "hosssam",
  age: 18,
  address: "cairo",
};

// var userName=person.name;
// var userAge=person.age;

//var pro_name=object

var name = person.name;
var age = person.age;

// var{name:firstName,age:userAge}=person
// var{name:firstName,age:userAge,address:userAddress}={
//     name:"hosssam",
//     age:18,
//     address:"cairo"
// };

//    // obj_key:newVariable
// var{name,age}=person

// console.log(name , age);

// var {name:username,age:userage}=person
// console.log(username , userage);

/** destructuring in object
 *
 *   obj_key:newVaiable
 * var{name:username,age:userage}=objName
 *
 * syntax sugar
 * var{name:name,age:age}=objName
 * var{name,age}=objName
 */

// var person={
//     name:"iti",
//     track:"php",
//     address:"menoufia",
//    print (){
//        console.log("hello");

//     }
// }

// var{name,track,address,print:func}=person;
// console.log(name);
// console.log(track);
// console.log(address);

// console.log(func());

//=================================
//  - Object
//    -- object.assign()
//    -- object.keys
//    -- object.entries
//    -- object.values

var person = {
  name: "iti",
  track: "php",
  address: "menoufia",
  print() {
    console.log("hello");
  },
};

var test = {};
// test=person;
// test={...person}
// console.log(test);

// Object.assign(test,person)  //
// console.log(Object);

// test.phone="12345"
// console.log(test);
// console.log(person);

// console.log(Object.keys(test));
// console.log(Object.values(test));
// console.log(Object.entries(test));
/**
 * 
0
: 
(2) ['name', 'iti']
1
: 
(2) ['track', 'php']
2
: 
(2) ['address', 'menoufia']
3
: 
(2) ['print', ƒ]
4
: 
(2) ['phone', '12345']
 */

// api ==> [{ name:"" , age:""}}
// name age
// values

// var person = {
//   name: "iti",
//   track: "php",
//   address: "menoufia",
// };
// let colums = Object.keys(person);

// document.writeln(`
    
    
//     <table border="1">

//     <thead>
//     <td>
//     ${colums[0]}
//     </td>
//     <td>
//     ${colums[1]}
//     </td>
//     <td>
//     ${colums[2]}
//     </td>
//     </thead>

//     <tbody>
//     <tr>
//     <td>
//     ${person.name}
//     </td>
    
//     <td>
//      ${person.track}
//     </td>
//     <td>
//       ${person["address"]}
//     </td>

//     </tr>
//     </tbody>
//     </table>
    
    
    
//     `);




//============= hoisting =======


// x=undefined , y=undefined
// console.log(x);
// var x,y;
// x=5;
// y=10;

// print()
// function print()
// {
//     console.log("hello");
    
// }


/**
 * support hoisting : 
 * function ======> function decleration
 * function fun_name(){}
 */

// result()
// var result=function ()
// {
//     console.log("hello");
    
// }

/**
 * declare 
 * var x;
 * assignment 
 * x=12;
 * 
 * x=17; ==> reasignment
 */

// console.log(x);  // hoisting

// var x=5;  
// x="hello";
// console.log(x);
// var x="user name" // redecleration
// console.log(x);
// console.log(y); // Cannot access 'y' before initialization

// let y=10;   //========>  
// y=15;
// // let y=14;
// // console.log(y); // error : 'y' has already been declared

// console.log(PI); // // Cannot access 'y' before initialization

// const PI=3.14;





/**
 *                    var            let(must use)                 const
 * reAssignmet         accept           accept                 not accept
 * redecleration       accept           not accept             not accept
 * Hoisting             accept           not accept             not accept
 */


