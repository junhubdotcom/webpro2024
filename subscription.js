// document.addEventListener("DOMContentLoaded", function() {
//     const subPlanLists = document.querySelectorAll('.sub-plan-list');
//     const totalPriceDisplay = document.getElementById('total-price-display');
//     const saver = document.getElementById('saver');

//     subPlanLists.forEach(plan => {
//         plan.addEventListener('click', function() {
//             subPlanLists.forEach(p => p.classList.remove('active'));
//             this.classList.add('active');

//             const planTitle = this.querySelector('.sub-plan-title').textContent.trim();

//             if (planTitle === '12 Month Plan') {
//                 totalPriceDisplay.textContent = 'RM360';
//             } else if (planTitle === '6 Month Plan') {
//                 totalPriceDisplay.textContent = 'RM186';
//             } else if (planTitle === '3 Month Plan') {
//                 totalPriceDisplay.textContent = 'RM96';
//             } else if (planTitle === 'Monthly Plan') {
//                 totalPriceDisplay.textContent = 'RM35';
//             }
//         });
//     });
// });


function selectPlan(totalPrice, saveAmount, clickedPlan) {

const subPlanLists = document.querySelectorAll('.sub-plan-list');
const totalPriceDisplay = document.getElementById('total-price-display');
const saver = document.getElementById('saver');


subPlanLists.forEach(container=>{
    container.classList.remove('clicked');
});

clickedPlan.classList.add('clicked');

    totalPriceDisplay.textContent = 'RM' + totalPrice;
    saver.textContent = 'RM' + saveAmount;
}

function displayCarousel(snackCountry){
    const koreaSnack = ["images/bento.jpg","images/bento.jpg","images/bento.jpg","images/bento.jpg","images/bento.jpg","images/bento.jpg"];
    const japanSnack = ["images/bento.jpg","images/bento.jpg","images/bento.jpg","images/bento.jpg","images/bento.jpg","images/bento.jpg"];
    const thailandSnack = ["images/bento.jpg","images/bento.jpg","images/bento.jpg","images/bento.jpg","images/bento.jpg","images/bento.jpg"];
    

    if(snackCountry == "korea"){
        document.getElementById('img1').src = koreaSnack[0];
        document.getElementById('img2').src = koreaSnack[1];
        document.getElementById('img3').src = koreaSnack[2];
        document.getElementById('img4').src = koreaSnack[3];
        document.getElementById('img5').src = koreaSnack[4];
        document.getElementById('img6').src = koreaSnack[5];
        document.getElementById('snackName1').innerHTML = "Kitkat: ";
        document.getElementById('snackDesc1').innerHTML = "Joeying";
        document.getElementById('snackName2').innerHTML = "Kitkat: ";
        document.getElementById('snackDesc2').innerHTML = "Joeying";
        document.getElementById('snackName3').innerHTML = "Kitkat: ";
        document.getElementById('snackDesc3').innerHTML = "Joeying";
        document.getElementById('snackName4').innerHTML = "Kitkat: ";
        document.getElementById('snackDesc4').innerHTML = "Joeying";
        document.getElementById('snackName5').innerHTML = "Kitkat: ";
        document.getElementById('snackDesc5').innerHTML = "Joeying";
        document.getElementById('snackName6').innerHTML = "Kitkat: ";
        document.getElementById('snackDesc6').innerHTML = "Joeying";

        
    }


    else if(snackCountry == "japan"){
        document.getElementById('img1').src = japanSnack[0];
        document.getElementById('img2').src = japanSnack[1];
        document.getElementById('img3').src = japanSnack[2];
        document.getElementById('img4').src = japanSnack[3];
        document.getElementById('img5').src = japanSnack[4];
        document.getElementById('img6').src = japanSnack[5];
        document.getElementById('snackName1').innerHTML = "Kitkat: ";
        document.getElementById('snackDesc1').innerHTML = "Joeying";
        document.getElementById('snackName2').innerHTML = "Kitkat: ";
        document.getElementById('snackDesc2').innerHTML = "Joeying";
        document.getElementById('snackName3').innerHTML = "Kitkat: ";
        document.getElementById('snackDesc3').innerHTML = "Joeying";
        document.getElementById('snackName4').innerHTML = "Kitkat: ";
        document.getElementById('snackDesc4').innerHTML = "Joeying";
        document.getElementById('snackName5').innerHTML = "Kitkat: ";
        document.getElementById('snackDesc5').innerHTML = "Joeying";
        document.getElementById('snackName6').innerHTML = "Kitkat: ";
        document.getElementById('snackDesc6').innerHTML = "Joeying";
    }

    else if(snackCountry == "thailand"){
        document.getElementById('img1').src = thailandSnack[0];
        document.getElementById('img2').src = thailandSnack[1];
        document.getElementById('img3').src = thailandSnack[2];
        document.getElementById('img4').src = thailandSnack[3];
        document.getElementById('img5').src = thailandSnack[4];
        document.getElementById('img6').src = thailandSnack[5];
        document.getElementById('snackName1').innerHTML = "Kitkat: ";
        document.getElementById('snackDesc1').innerHTML = "Joeying";
        document.getElementById('snackName2').innerHTML = "Kitkat: ";
        document.getElementById('snackDesc2').innerHTML = "Joeying";
        document.getElementById('snackName3').innerHTML = "Kitkat: ";
        document.getElementById('snackDesc3').innerHTML = "Joeying";
        document.getElementById('snackName4').innerHTML = "Kitkat: ";
        document.getElementById('snackDesc4').innerHTML = "Joeying";
        document.getElementById('snackName5').innerHTML = "Kitkat: ";
        document.getElementById('snackDesc5').innerHTML = "Joeying";
        document.getElementById('snackName6').innerHTML = "Kitkat: ";
        document.getElementById('snackDesc6').innerHTML = "Joeying";
        
    }
}

function scrollToAvailability(country) {
    displayCarousel(country);
    document.querySelector('.country-availability-list p').scrollIntoView({ behavior: 'smooth', block: 'center' });
}

function checkAvailability() {
    var country = document.getElementById("country").value;
    var availableCountries = ["usa", "uk", "canada", "china", "france", "japan", "malaysia", "singapore"]; // List of available countries for delivery

    // Display an alert message
    alert("Checking availability for " + country.toUpperCase() + "...");

    // Delay the display of the result
    setTimeout(function () {
        if (availableCountries.includes(country)) {
            document.getElementById("availabilityMessage").innerText = "Delivery is available to " + country.toUpperCase() + ".";
            document.getElementById("availabilityMessage").classList.remove("not-available"); // Remove not-available class if present
        } else {
            document.getElementById("availabilityMessage").innerText = "Sorry, delivery is not available to " + country.toUpperCase() + ".";
            document.getElementById("availabilityMessage").classList.add("not-available"); // Add not-available class
        }

        // Scroll to the availability message
        document.getElementById("availabilityMessage").scrollIntoView({ behavior: 'smooth', block: 'center' });
    }, 100); // Delay in milliseconds (100ms)
}

