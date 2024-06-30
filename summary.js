let cNo = document.getElementById('cardNo');
cNo.addEventListener('keyup', function(e) {
    let num = cNo.value;

    let newValue = '';
    num = num.replace(/\s/g, '');
    for(var i = 0; i < num.length; i++) {
        if(i%4 == 0 && i > 0) newValue = newValue.concat(' ');
        newValue = newValue.concat(num[i]);
        cNo.value = newValue;
    }

    let cNumber = document.getElementById('c-number');
    if(num.length<16) {
        cNumber.style.border = "1px solid red";
    } else {
        cNumber.style.border = "1px solid greenyellow"
    }
});

let eDate = document.getElementById('expiredDate');
eDate.addEventListener('keyup', function(e) {
    let newInput = eDate.value;

    if(e.which !== 8) {
        var numChars = e.target.value.length;

        if (numChars == 2) {
            var thisVal = e.target.value;
            thisVal += '/';
            e.target.value = thisVal;
            console.log(thisVal.length)
        }
    }
});
