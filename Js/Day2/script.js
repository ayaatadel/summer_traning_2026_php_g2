/** Functions
 * 
 * function fun_name(){code} ==> use (call , invoke)==> fun_name()
 * 
 * declared functions ====> already exist  ==> typeof , log
 * user defined functions
 * 
 * declaration function  ==>function fun_name(){code} 
 * 
 * void  ==> print , use  
 * return   ==> trurn value ==> can be stored in variable
 * 
 * parametarized 
 * not parametarized 
 * 
 * function fun_name(parameters)   // arguments
 * fun_name : small , camel case ===> collectData , collect_data()
 */

//============= user defined function =====================

// funtion not parametarized + void funtion    

// function sum()   // declare function 
// {
//     console.log("test");
 
// }

// // call function  + invoke   
// sum()




// // funtion not parametarized + return funtion    


// function sum()   // declare function 
// {
//     return("test");
 
// }


// sum()  
// // print value (log) , store in variable

// console.log(sum());



// parametarized function
// var n1,n2; 

// // ...x : reset params (reaset parametares ==> array store reset parametars)
// function sum(n1,n2,...x)   // declare function 
// {
//     console.log(n1,n2);
    
//     console.log(arguments);
//     console.log(x);
    
    
//   console.log(n1*n2);   // undefined + undefined 
  
 
// }

// // call function  + invoke   
// sum()







/**
 * undefined   ===> value
 * Nan   : Not A Number ===> (undefined + , - ,* )
 * Null   ==> value ===> store variable in memory with empty value
 * 
 */


// isNaN ===> true (not a number)  // -  && false ==> value is number


// var name="iti"
// var result=name *5;  // nan
// var result=10 ;    // number

// console.log(isNaN(result));


// var test=null;

// console.log(test);




// var n1,n2; 

// ...x : reset params (reaset parametares ==> array store reset parametars)
// function sum(n1=0,n2=0,...x)   // declare function 
// {
//     // console.log(n1,n2);
    
//     // console.log(arguments);
//     // console.log(x);
    
    
// //   console.log(n1*n2);   // undefined + undefined 
  
//  return n1+n2;
// }

// // call function  + invoke   
// // sum(12,13)  // n1=12 , n2=13
// // sum()  // n1=12 , n2=13

// var result=sum(15,16);

// console.log(result);




// function sum(){

//     console.log("summation");
    
// }
// console.log(sum);  // body of function 

// sum() //     out put
// console.log(sum());      //    out put + undefined


// log ===> call fnction (void)  ==> return value (undefined)
 





// -------------------------------
//                                -
//    sum      ==>                -
//        {                       -

//  console.log("summation");     -
    
// }                              -
//                                -
//                                -
// --------------------------------                               




// function sum(){

//    return("summation");
    
// }
// console.log(sum);  // body of function 

// sum() //  call funtion ==>  nothing
// console.log(sum());      // trurn of function









//==================== Espression funtion ===========

// var result=function ()   
// {
//     //    return("expression function");
//        console.log("expression function");
       
// }
// // call  
// // result()
// console.log( result());
// // console.log( result);




// =================== Anomomus Function ================
/**
 * 
 * function (){}
 * function without name
 * call back function
 */



// =================== callback Function ================
/**
 * function call another function
 */

function first() {
    console.log("first");
}


function second()   // call back function
{
    first();
    console.log("second");
}


second();


// Arrow Function    ====> call back function

// var v_name=()=>{

// }

// var x=()=>{
//     console.log("test");  
// }


// var x=()=>"test";   // return function
// console.log(x());


// var x=_=>"test";   // return function + no parametars
// console.log(x());


// var x=(n)=>n;   // return function
// console.log(x(17));


//============ IIFE : Immediatly Invoked Function Expression   =============
//============ Self Invoked Function ========================
/**
 * function call it self
 */


(function(){
    console.log("hello");
    
})();