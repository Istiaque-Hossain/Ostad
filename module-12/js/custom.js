const btnClick = document.getElementById("calculateBtn");
btnClick.addEventListener("click", function () {
    const weight = document.getElementById("weightInput").value;
    const height = document.getElementById("heightInput").value;
    console.log("weight:", weight, "height:", height);
    if (!isNaN(weight) && !isNaN(height)) {
        if (weight != "" && height != "") {
            const BMIcalc = weight / Math.pow(height, 2);
            showBMI(BMIcalc);
        }
    }
});

function showBMI(BMIcalc) {
    console.log("showBMI called with BMIcalc:", BMIcalc);
    const bmi = document.getElementById("bmi");
    bmi.innerText = "Your BMI is: " + BMIcalc;
    bmi.classList.remove("invisible");
}
