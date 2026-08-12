

// let person={
//     // properities , methods 
//     name:"iti",
//     address:"menoufia",
//     email:"iti@gmail.com",
//     print()
//     {
//         console.log(this); // this refer on current object (person)
//         console.log("hello");
//         console.log(this.name,this.address,this.email);   
        
//     }
// } 

// var employee={
// password:"123456789",
// id:1,
// register(x){
//         // undefined , undefined ==> 
//             /**
//              * name 
//              * email 
//              * ------------> person ===> this
//              * this ===> refere person
//              * 
//              * 
//              *  */      
//     console.log(this.name,this.email,x);
    
// }

// }

// person.print()
// employee.register();

// -------- call
// employee.register.call(person,"test")
// obj_name.key 



//------------- apply -----
// employee.register.apply(person,["test"])


//-------------- bind 
// console.log(employee.register.bind(person,"test"));




// employee.register.bind(person,"test")()







// change object of this 
/**
 * call   ===> change caller (chnage current object of this) + run
 * 
 * 
 * 
 * apply ==> call + parametars take parameters in array
 * 
 * 
 * 
 * bind : change caller + return body of function 
 * 
 * user will call it when he want to use it 
 * 
 * 
 * 
 * 
 *  
*/


// let person={
//     // properities , methods 
//     name:"iti",
//     address:"menoufia",
//     email:"iti@gmail.com",
//     print()
//     {
//         console.log(this); // this refer on current object (person)
//         console.log("hello");
//         console.log(this.name,this.address,this.email);   
        
//     }
// } 

// edit 
// person.address="cairo"


// Object.freeze(person)
// Object.seal(person)
// person.address="cairo"
// person.id=1
// console.log(person);

/**
 * freeze :  prevent user to update or add new properity to object
 * 
 * 
 * seal : let user to update but prevent user to add new properity
 */


//=============================

/**
 * function constructor
 * create more than object with same strucre ==> new 
 * this --> refer on new object
 * implictly return ===> 
 */


function User(name,email, address){
    // user : name , email , address
this.name=name;
this.address=address;
this.email=email;

}

// new 
var user1=new User("mohammed","mohammed@gmail.com","cairo")
var user2=new User("mohmoud","mahmoud@gmail.com","cairo")
user1.print=function()
{
    console.log("hello");
    
}
user1.id=5;
console.log(user1,user2);
