//SWITCHES
var switchName = 0;
var switchLName = 1;
var switchEmail = 2;
var switchPass = 3;
var switchRepeatPass = 4;

var switchLoginMail = 0;
var switchLoginPass = 1;

var switchAboutYou = 0;

var switchArray = [false, false, false, false, false];

$(document).ready(function(){

    // HIDE MESSAGES
    $(".hideThis").hide();
    
    $("#login_emailR").hide();
    $("#login_passR").hide();
    $("#loginFormR").hide();

    // REGEX
    let regexNameAndLastName = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
    let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    let regexPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
    let regexAboutText = /^[A-Za-z1-9\.\,\!\?\' ]{5,200}$/;

    // REGISTER CHECKS
    let addressName = $("#name");
    let problemName = $("#nameR");
    $("#name").blur(function(){
        regexCheck(regexNameAndLastName, addressName, problemName, switchName);
    });

    let addressLName = $("#lname");
    let problemLName = $("#lnameR");
    $("#lname").blur(function(){
        regexCheck(regexNameAndLastName, addressLName, problemLName, switchLName);
    });

    let addressEmail = $("#email");
    let problemEmail = $("#emailR");
    $("#email").blur(function(){
        regexCheck(regexEmail, addressEmail, problemEmail, switchEmail);
    });

    let addressPass = $("#pass");
    let problemPass = $("#passR");
    $("#pass").blur(function(){
        regexCheck(regexPassword, addressPass, problemPass, switchPass);
    });

    let addressAboutYou = $("#aboutYou");
    let problemAboutYou = $("#aboutYouR");
    $("#aboutYou").blur(function(){
        regexCheck(regexAboutText, addressAboutYou, problemAboutYou, switchAboutYou);
    });
    
    $("#rpass").blur(function(){
        let firstPassword = $("#pass").val();
        let secondPassword = $("#rpass").val();

        if(firstPassword == secondPassword){
            $("#rpassR").hide();
            switchArray[switchRepeatPass] = true;
        }
        else{
            $("#rpassR").show();
            switchArray[switchRepeatPass] = false;
        }
    });

});

// FUNCTIONS
function regexCheck(regex, address, problem, switchNum){
    addressValue = address.val();
    
    if(regex.test(addressValue)){
        problem.hide();
        switchArray[switchNum] = true;
    }
    else{
        problem.show();
        switchArray[switchNum] = false;
    }
}

function registerFormCheck(){
    if(switchArray[0] == true && switchArray[1] == true && switchArray[2] == true && switchArray[3] == true && switchArray[4] == true){
        return true;
    }
    else{
        $("#submitR").show();
        return false;
    }
}

function loginFormCheck(){
    if(switchArray[2] == true && switchArray[3] == true){
        return true;
    }
    else{
        $("#submitR").show();
        return false;
    }
}

function speakerFormCheck(){
    if(switchArray[0] == true){
        return true;
    }
    else{
        $("#aboutYouR").show();
        return false;
    }
}