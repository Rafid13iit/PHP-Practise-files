const form = document.querySelector('form');

form.addEventListener('submit', function(event){
    event.preventDefault();

    const userId = form.elements['userId'].value;
    const pass = form.elements['passId'].value;
    const name = form.elements['name'].value;
    const address = form.elements['address'].value;
    const country = form.elements['country'].value;
    const email = form.elements['email'].value;
    let sex;
    const languages = [];

    console.log(userId);
    const sexRadios = form.elements['sex'];
    for (const radio of sexRadios) {
        if (radio.checked) {
            sex = radio.value;
            break;
        }
    }
    const languageCheckboxes = form.querySelectorAll('input[name="en"], input[name="nonen"]');
    languageCheckboxes.forEach(checkbox => {
        if (checkbox.checked) {
            languages.push(checkbox.value);
        }
    });

    if(userId.trim() == ''||pass.trim()==''||name.trim()==''||address.trim()==''||country=='Default'||sex.trim()==""||languages.length==0){
        alert("Enter all values.");
        return;
    }

    if(pass.length < 8 || !/\d/.test(pass)){
        alert("Password must be at least 8 characters long and contain at least one digit");
        return;
    }

    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        alert("Please enter a valid email address");
        return false;
    }

    form.submit();

})