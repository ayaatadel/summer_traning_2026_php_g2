//  var bttn=document.getElementById("btn")
//  bttn.addEventListener('click',()=>{
//     console.log("hello");

//  })

/**
 * comment
 * single line (//)
 * multi line
 */
// var name="mahmoud"
// var age =26
// var success = true

// // check data type ===> typeof

// console.log(typeof(name));
// console.log(typeof(age));
// console.log(typeof(success));

// /**
//  * string
//  * number
//  * boolean
//  * oject
//  * undefined
//  */

// name="hossam"
// console.log(name);

// var _name="jgkjg";
// var $name="jgkjg";

// //---------------------- rules in naming variable
// // only use ( _ , $)
// // small
// // firstName (camel case)
// // first_name
// // vaiable name must be expressive

// // you mustn't use any reseved key word (var , log , function , let ,const)

// // constant variable must be all chatacters are capital ==> const PI=3.14

// /**
//  * operators
//  *
//  * mathematical operators
//  * logical operators
//  * comparison operators
//  *
//  */

// /**  mathematical operators + , - , * , \ , %
//   */

// var num1=7;
// var num2=5;

// console.log(num1+num2);// 12
// console.log(num1*num2);//35
// console.log(num1/num2);//1.2
// console.log(num1%num2);//.2        2

/**
 * 7 / 5  = 1  * 5 = 5 ===> 7-5 =2
 * 10/3   = 3 *3 =9   ===> 10-9 =1
 */

/**  logical operators  (and , or , not )    ===> more than one condition  (4>5)&& (5<6)
 *
 * and  && ===> give true if all conditions are true
 * true && true  = true
 * true && false  = false
 * false && false  = false
 * false && true  = false
 *
 * Or ||  ===> give true if any one of conditions is true
 * true || true  = true
 * true || false  = true
 * false || false  = false
 * false || true  = true
 *
 *
 * Not ! ===> true ===> false   , false ==> true
 * ! true = false
 * ! false= true
 */

/***
 * comparison operator (< , > , <= , >= , != ,== , !== , ===)
 *
 *
 * ==  ^^  ===
 *
 * (== )----------? value
 * (===)----------? value and data type
 * !=  ----------? value
 * !==  ----------? value and data type
 */

// console.log(5=='5');  // true  ==> value (5)==value('5')
// console.log(5==='5');  // false ==> ( value (5)==value('5')) && (typeof(5)==typeof('5')) ==>(true && fale) ==> false
// console.log(5!=='5');  // true ==> !( value (5)==value('5')) && (typeof(5)==typeof('5')) ==>!(true && fale) ==> !false =true
// console.log(5!='5');  // false  ==>  !(value (5)==value('5')) ==> !true = false

/**
 * increment and decrement operator
 * ++
 * --
 */

// var n=5;
// // pre and post increment
// console.log(n++);  // 5   ------> 6
// console.log(++n);  //  7     ===> 7
// console.log(n--); // 7     ---------> 6
// console.log(--n); // 5  ---------> 5

/**
 * conditions
 * if  ===> if else ===> if ifslse else         , ternary operator
 * switch case
 */

// var n1=0;

// // if(n1>0)
// // {
// //     console.log("positive");

// // }
// // console.log("after condition");
// // if(n1<0)
// // {
// //     console.log("positive");

// // }else{

// //     console.log('negative');
// // }

// if(n1>0)
// {
//     console.log("positive");

// }else if(n1<0){

//     console.log('negative');
// }else{
//      console.log('zero');
// }

// var garde = 77;

// switch (garde) {
//   case 90:  // if(grade ==90)
//     console.log("grade A");

//     break;
//   case 80:
//     console.log("grade B");
//     break;
//   case 70:
//     console.log("grade C");
//     break;
//   case 60:
//     console.log("grade D");
//     break;
//   case 50:
//     console.log("grade f");
//     break;
//   default:
//      console.log('fail');
//     break;
// }
// console.log("tssssssssssssssssssssssssssssst");


/***
 * break   ==> stop  this step
 * continue ==> skip this step and go forward
 */



/********** ternary operator 
 * if(){}else{}
 * ()?true:false
 */

// var n=-5;
// (n>0)?console.log("positive"):console.log("negative");
// // if(){}elseif(){}else{}
// (n>0)?console.log("positive"):(n<0)?console.log("negative"):console.log("equal zero");


// looping 
/**
 * for
 * while
 * do while
 * ------------------------------------------------
 * foreach
 * map
 * filter
 * reduce
 */



// print numbers from 1 to 5
/**
 * Don't repeat your self
 */


// console.log(1);
// console.log(2);
// console.log(3);
// console.log(4);
// console.log(5);


// for (start; condition; increment , decrement) {
//    code
    
// }
// start , condition (true)--> code    ====> increment , decrement 
// //                        <=============== condition
// // false  stop  
// for(var i=1;i<=5;i++)
// {
//     console.log(i);
    
// }

/**
 * for(){}   // infinity loop
 * 
 */

// start

// while(condition)
// {
        //   code
        // increment , decrement
// }


// var i=1;
// while(i<=5)
// {
//     console.log(i);
//     i++;
    
// }


/**
 * while(true){} // infinity loop
 */


// start
// do{
         //   code
        // increment , decrement  
// }while(condition);
// var i=-1;
// do{
//   console.log(i);  // -1
//   i++;
  
// }while(i<=5);


// for(var i=1;i<=5;i++)
// {
//     if(i==3)
//         {
//         // continue;
//         break;

//     }else{

//         console.log(i);
//     }
        
//     // break;
    
// }

// console.log("after");



/********* 
 * 
 * alert 
 * prompt  =========> string
 */

// alert("hello")


// var name=prompt("enter your name");
// // // var age=+prompt("enter your age");
// // // var age=Number(prompt("enter your age"));
// var age=parseInt(prompt("enter your age"));
// console.log(name);
// console.log(typeof(age));


// document.writeln(name)
// document.writeln(age)
// document.writeln("ّ<h1 style='text-align:center ; color:red'> Day1 Js</h1>");
// document.writeln(`name : <p style='color:red'> ${name}</p>`);
// document.writeln(`age : <p style='color:red'> ${age}</p>`);
// document.writeln(age)



// var result=confirm("are you student");
// if(result)  // if true
// {
//     document.writeln("student")
    
// }else{
//     document.writeln("graduated")
// }



/**
 * truthy values  : any number except 0 , true , [1,2]  , " " ,  []
 * falsy values : undefined , null , 0 , false , "" ,
 */

// if("   ")  // if true
// {
//     console.log("true");
    
    
// }else{
//    console.log("false");
   
// }

