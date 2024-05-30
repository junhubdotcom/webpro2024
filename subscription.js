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
    const koreaSnack = ["images/bento.jpg","images/bento.jpg","images/bento.jpg"];
    const japanSnack = ["images/bento.jpg","images/bento.jpg","images/bento.jpg"];
    const thailandSnack = ["images/bento.jpg","images/bento.jpg","images/bento.jpg"];

    if(snackCountry == "korea"){
        document.getElementById('img1').src = koreaSnack[0];
        document.getElementById('img2').src = koreaSnack[1];
        document.getElementById('img3').src = koreaSnack[2];
    }


    else if(snackCountry == "japan"){
        document.getElementById('img1').src = japanSnack[0];
        document.getElementById('img2').src = japanSnack[1];
        document.getElementById('img3').src = japanSnack[2];
    }

    else if(snackCountry == "thailand"){
        document.getElementById('img1').src = thailandSnack[0];
        document.getElementById('img2').src = thailandSnack[1];
        document.getElementById('img3').src = thailandSnack[2];
    }


}

