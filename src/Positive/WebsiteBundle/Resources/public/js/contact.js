function validateForm() {
    var errors = [];

    var elem = document.forms["contactform"]["contact[name]"];
    if (elem.value.length < 3) {
        elem.className = elem.className + "incorrect";
        errors.push("Name");
    }
    elem = document.forms["contactform"]["contact[email]"];
    if (!elem.value.match(/^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/)) {
        elem.className = elem.className + "incorrect";
        errors.push("Email");
    }

    elem = document.forms["contactform"]["contact[subject]"];
    if (elem.value.length < 3) {
        elem.className = elem.className + "incorrect";
        errors.push("Subject");
    }

    elem = document.forms["contactform"]["contact[body]"];
    if (elem.value.length < 3) {
        elem.className = elem.className + "incorrect";
        errors.push("Body");
    }
    if (errors.length == 0) {
        return true;
    } else {
        console.log($('.form-message').text());
        $('.form-message').text(getErrorMessage(errors));
        return false;
    }
}

function getErrorMessage(array) {
    var message = "Please provide us with correct info for the following fields: ";
    for(var i=0; i<array.length; i++) {
        if (i == array.length -1 ) {
            message += array[i] + ".";
        } else {
            message += array[i] + ", ";
        }
    }
    return message;
}