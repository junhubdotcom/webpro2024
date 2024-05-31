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
    const koreaSnack = ["images/honeybutterchip.jpg",
    "https://d1i4t8bqe7zgj6.cloudfront.net/06-15-2018/t_1529082833396_name_20180615_choco_still2.jpg",
    "https://assets.bonappetit.com/photos/5ea982c8b5410100081e3482/master/pass/HR-packaged-Shin-ramen.jpg",
    "images/bananamilk.jpg",
    "https://images.summitmedia-digital.com/spotph/images/2020/07/23/pepero-640-1595478915.jpg"];

    const japanSnack = ["https://i0.wp.com/sporked.com/wp-content/uploads/2022/09/BEST-POCKY-RANKING_DANNY-PALUMBO_SPORKED_HEADER.jpg",
    "https://cdn.vox-cdn.com/thumbor/t0Fjexl2fwMFBU-XUbcRYis0Zho=/0x0:7594x4272/1200x0/filters:focal(0x0:7594x4272):no_upscale()/cdn.vox-cdn.com/uploads/chorus_asset/file/23376503/EA_141_Japanese_Chips_Potato_sticks21999.jpg",
    "https://www.tastingtable.com/img/gallery/classic-homemade-mochi-recipe/intro-1658962349.jpg",
    "https://i.ytimg.com/vi/efrPoKocJzE/maxresdefault.jpg",
    "https://cdn.shopify.com/s/files/1/0713/9790/0584/files/pretz-flavors-regular-flavors.jpg?v=1691380365"];

    const thailandSnack = ["https://i0.wp.com/sporked.com/wp-content/uploads/2022/05/5-THAI-LAYS-FLAVORS-YOU-CAN-BUY-ONLINE_DANNY-PALUMBO_SPORKED_HEADER.jpg",
    "https://food.fnr.sndimg.com/content/dam/images/food/products/2023/2/13/rx_big-roll-grilled-seaweed-snacks-by-tao-kae-noi.jpeg.rend.hgtvcom.1280.720.suffix/1676323709546.jpeg",
    "https://media.nationthailand.com/uploads/images/md/2022/01/DYTkVmGE3f7EM1LcBZnv.webp",
    "https://i0.wp.com/packagingoftheworld.com/wp-content/uploads/2024/01/3D_Boontree_3Pouch_SpoonHand.png?fit=2400%2C1350&ssl=1",
    "images/bento.jpg","images/Kohkae.jpg"];

    if(snackCountry == "korea"){
        document.getElementById('img1').src = koreaSnack[0];
        document.getElementById('img2').src = koreaSnack[1];
        document.getElementById('img3').src = koreaSnack[2];
        document.getElementById('img4').src = koreaSnack[3];
        document.getElementById('img5').src = koreaSnack[4];
        
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
        
    }


    else if(snackCountry == "japan"){
        document.getElementById('img1').src = japanSnack[0];
        document.getElementById('img2').src = japanSnack[1];
        document.getElementById('img3').src = japanSnack[2];
        document.getElementById('img4').src = japanSnack[3];
        document.getElementById('img5').src = japanSnack[4];
        
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
        
    }

    else if(snackCountry == "thailand"){
        document.getElementById('img1').src = thailandSnack[0];
        document.getElementById('img2').src = thailandSnack[1];
        document.getElementById('img3').src = thailandSnack[2];
        document.getElementById('img4').src = thailandSnack[3];
        document.getElementById('img5').src = thailandSnack[4];
       
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
        
    }
}

function selectCountry(element, country) {
    // Remove 'selected' class from all elements
    document.querySelectorAll('.sub-country-list').forEach(el => {
        el.classList.remove('selected');
    });

    // Add 'selected' class to the clicked element
    element.classList.add('selected');

    // Scroll to the country availability section
    displayCarousel(country);
    document.querySelector('.country-availability-list p').scrollIntoView({ behavior: 'smooth', block: 'center' });

    // Optionally, set the country in the select box or perform other actions
    //document.getElementById('country').value = country;
}

// function scrollToAvailability(country) {
//     displayCarousel(country);
//     document.querySelector('.country-availability-list p').scrollIntoView({ behavior: 'smooth', block: 'center' });
// }

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

