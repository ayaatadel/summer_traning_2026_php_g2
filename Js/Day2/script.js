// /** Functions
//  *
//  * function fun_name(){code} ==> use (call , invoke)==> fun_name()
//  *
//  * declared functions ====> already exist  ==> typeof , log
//  * user defined functions
//  *
//  * declaration function  ==>function fun_name(){code}
//  *
//  * void  ==> print , use
//  * return   ==> trurn value ==> can be stored in variable
//  *
//  * parametarized
//  * not parametarized
//  *
//  * function fun_name(parameters)   // arguments
//  * fun_name : small , camel case ===> collectData , collect_data()
//  */

// //============= user defined function =====================

// // funtion not parametarized + void funtion

// // function sum()   // declare function
// // {
// //     console.log("test");

// // }

// // // call function  + invoke
// // sum()

// // // funtion not parametarized + return funtion

// // function sum()   // declare function
// // {
// //     return("test");

// // }

// // sum()
// // // print value (log) , store in variable

// // console.log(sum());

// // parametarized function
// // var n1,n2;

// // // ...x : reset params (reaset parametares ==> array store reset parametars)
// // function sum(n1,n2,...x)   // declare function
// // {
// //     console.log(n1,n2);

// //     console.log(arguments);
// //     console.log(x);

// //   console.log(n1*n2);   // undefined + undefined

// // }

// // // call function  + invoke
// // sum()

// /**
//  * undefined   ===> value
//  * Nan   : Not A Number ===> (undefined + , - ,* )
//  * Null   ==> value ===> store variable in memory with empty value
//  *
//  */

// // isNaN ===> true (not a number)  // -  && false ==> value is number

// // var name="iti"
// // var result=name *5;  // nan
// // var result=10 ;    // number

// // console.log(isNaN(result));

// // var test=null;

// // console.log(test);

// // var n1,n2;

// // ...x : reset params (reaset parametares ==> array store reset parametars)
// // function sum(n1=0,n2=0,...x)   // declare function
// // {
// //     // console.log(n1,n2);

// //     // console.log(arguments);
// //     // console.log(x);

// // //   console.log(n1*n2);   // undefined + undefined

// //  return n1+n2;
// // }

// // // call function  + invoke
// // // sum(12,13)  // n1=12 , n2=13
// // // sum()  // n1=12 , n2=13

// // var result=sum(15,16);

// // console.log(result);

// // function sum(){

// //     console.log("summation");

// // }
// // console.log(sum);  // body of function

// // sum() //     out put
// // console.log(sum());      //    out put + undefined

// // log ===> call fnction (void)  ==> return value (undefined)

// // -------------------------------
// //                                -
// //    sum      ==>                -
// //        {                       -

// //  console.log("summation");     -

// // }                              -
// //                                -
// //                                -
// // --------------------------------

// // function sum(){

// //    return("summation");

// // }
// // console.log(sum);  // body of function

// // sum() //  call funtion ==>  nothing
// // console.log(sum());      // trurn of function

// //==================== Espression funtion ===========

// // var result=function ()
// // {
// //     //    return("expression function");
// //        console.log("expression function");

// // }
// // // call
// // // result()
// // console.log( result());
// // // console.log( result);

// // =================== Anomomus Function ================
// /**
//  *
//  * function (){}
//  * function without name
//  * call back function
//  */

// // =================== callback Function ================
// /**
//  * function call another function
//  */

// // function first() {
// //   console.log("first");
// // }

// // function second() {
// //   // call back function
// //   first();
// //   console.log("second");
// // }

// // second();

// // Arrow Function    ====> call back function

// // var v_name=()=>{

// // }

// // var x=()=>{
// //     console.log("test");
// // }

// // var x=()=>"test";   // return function
// // console.log(x());

// // var x=_=>"test";   // return function + no parametars
// // console.log(x());

// // var x=(n)=>n;   // return function
// // console.log(x(17));

// //============ IIFE : Immediatly Invoked Function Expression   =============
// //============ Self Invoked Function ========================
// /**
//  * function call it self
//  */

// // (function(){
// //     console.log("hello");

// // })();

// //=========================== string (length : Number of characters , index(char at )  ==> 0) ===============
// // var text = "welcome Php track Php Summer training";
// //
// /**
//  *  - length
//         - charAt(index) ==> str(index)
//         - at(index)
//         - charCodeAt(index)
//         - indexOf ==> Returns the position of the first occurrence of a substring.
//         - lastIndexOf
//         - slice(strat , end)
//         - subString(strat , end)
//         - subStr(strat , end)
//         - toLowerCase
//         - toUpperCase
//         - includes
//         - stratWith
//         - endWith
//         - toString
//         - concat
//         - trim
//         - trimStart
//         - trimEnd
//         - padStart
//         - padEnd
//         - repeat(counter)
//         - replace('charin',"char enter")
//         - replaceAll('charin',"char enter")
//         - split

//  */

// // console.log(text.length);
// // console.log(text.charAt(10));
// // console.log(text.at(10));
// // console.log(text.charCodeAt(10)); // ascii code   ==> 0 , 1
// // // a : 97  , A : 65

// // console.log(text.indexOf("a")); // first index of this char
// // console.log(text.indexOf("Php")); // first index of this word
// // console.log(text.lastIndexOf("Php")); // first index of this word

// // console.log(text.toLowerCase());
// // console.log(text.toUpperCase());
// // console.log(text);
// // console.log(text.includes("php"));

// // var userData=prompt("Enter Your Search");
// // console.log(text.toLowerCase().includes(userData.toLowerCase()));
// // console.log(text.startsWith("welcome"));
// // console.log(text.endsWith("training"));
// // var test=text.padEnd();
// // console.log(text.endsWith("training"));

// // console.log(text.padStart(43,"***"));
// // console.log(text.padEnd(40,"***"));

// // var userData = prompt("Enter Your phone");
// // console.log(userData.trim().startsWith("010"));
// // // console.log(userData.trimStart().startsWith("010"));
// // // console.log(userData.trimEnd().startsWith("010"));

// // let allData=text.concat(" iti menoufia")

// // allData=text + " " + "iti menoufia branch"
// // console.log(allData);

// // console.log(text.repeat(2));
// // console.log(text.replace("Php" ,"PHP"));
// // console.log(text.replaceAll("Php" ,"PHP"));

// // console.log(text.slice(0,9));
// // console.log(text.substring(0,9));
// // console.log(text.substr(0,9));

// // ==================== array =========

// // var arr=["iti","php" ,34,true,[123]]
// // var names= Array("mahmoud","mohammed")

// // console.log(arr);
// // console.log(names);

// /**
//  * index   ===> strat with index 0
//  * length ===> numbers of array elemnts
//  */

// /**
//  *     * push
//        * unshift
//        * pop
//        * shift
//        * indexOf
//        * slice
//        * splice
//        * reverse
//        * concat
//        * at
//  */
// // console.log(arr[2]);
// // // update value in array ===> arr_name[index]
// // arr[2]="iti menoufia";

// // console.log(arr.length);
// // // arr[5]="summer training"

// // // console.log(arr.at(2));

// // // add element from end
// // arr.push("summer training")
// // arr.unshift("summer training")
// // // add elment on specific index   ===> arr[index]
// // arr[5]="test"
// // // remove last element from array
// // console.log(arr);
// // arr.pop()
// // // remove first element from array
// // arr.shift()
// // console.log(arr);

// // console.log(arr.indexOf("php"));

// // var res=arr.concat(names)
// // console.log(res);

// // var res=arr;   // refrence refere to same place
// // console.log(res);
// // res.push("test")
// // arr.push("hello")
// // console.log(res);
// // console.log(arr);

// // copy of valus
// // var res=[]
// //  res=[...arr,[1,2,3],...names] // copy from values
// // console.log(res);
// // res.push("test")
// // console.log(res);
// // console.log(arr);
// // arr.push("hello")
// // console.log(arr);

// // var names= Array("mahmoud","mohammed")

// // // for (let index = 0; index < names.length; index++) {
// // // console.log(names[index]);

// // // }

// //            // element of array , index , array
// // names.forEach((ele ,index,arr)=>{
// // console.log(index,ele ,arr);

// // })

// // names.forEach(element => {
// //     console.log(element);

// // });

// ======================= object   (key:value)========

// var name="test";
// console.log(this);

// var person = {
//   name: "php",
//   age: 34,
//   print() {
//     // this ===> current object
//     return ("hello", this.name);   // name of objec
//   },
// };

// // console.log(person.name);
// console.log(person.print());

// /**
//  * var ========> window  ===> object
//  * this ====> refere on window
//  * this =====> refer on current object
//  */

// // person.address="menoufia"  // add new value ===> obj_name.key=value
// person.name="iti"          // update ==>  obj_name.key=new value
// // var p=person;   // refrences refer to same place
// // console.log(p);

// var test={
//     phone:"0123894756985"
// }
// var p={...person ,...test}  // copy from values
// console.log(p);
// person.address="menoufia"

// console.log(p);

//=================== declared object ===========
/**
 * math
 * date
 */

// var date =new Date();
// console.log(date);  //Mon Aug 10 2026 11:56:39 GMT+0300
// console.log(date.getMonth()); // length of month
// console.log(date.getDate());  // get day
// console.log(date.getFullYear());  // get
// console.log(date.getHours());  // get
// console.log(date.getMinutes());  // get

console.log(Math.sqrt(4));
console.log(Math.floor(-3.1)); // -4  بتفرب للرقم الاصغر
console.log(Math.trunc(-3.1)); //-3        بتشيل الكسر
console.log(Math.abs(-4));
console.log(Math.pow(4, 2));
console.log(Math.random() * 10);
console.log(Math.trunc(Math.random() * 10));
console.log(Math.cos(90));
console.log(Math.sin(30));
console.log(Math.round(3.1));   // <.5 ==> same number , >=.5   ==> rpund up
console.log(Math.ceil(3.1));   // بتقرب للرقم الاكبر
