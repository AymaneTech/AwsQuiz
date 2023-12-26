let correctionContainer = document.querySelector("#elements-parent");
let localStorageCorrection = JSON.parse(localStorage.getItem("correction"));

correctionContainer.innerHTML = "";
localStorageCorrection.forEach((correction, index) => {

    let questionSection = document.createElement("div");
    questionSection.classList.add("leading-7");
    questionSection.innerHTML = `
        <h2 class="mb-4 font-medium text-xl text-purple-700"> 
            Incorrect Question N°${index}
        </h2>
        <div class="question">
            <p class="questionText">
                <span class="title font-bold">Question: </span>
                ${localStorageCorrection[index][0]["questionText"]}?
            </p>
            <p class="questionDescription">
                <span class="title font-bold">Correct Answer: </span>
                ${localStorageCorrection[index][1]["answerText"]}?
            </p>
            <p class="questionDescription">
                <span class="title font-bold">Description: </span>
                ${localStorageCorrection[index][1]["answerDescription"]}?
            </p>
            
        </div>
    `;
    correctionContainer.appendChild(questionSection);
});
