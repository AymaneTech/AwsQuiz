let correctionContainer = document.querySelector("#elements-parent");
let localStorageCorrection = JSON.parse(localStorage.getItem("correction"));

correctionContainer.innerHTML = "";
localStorageCorrection.forEach((correction, index) => {

    let questionSection = document.createElement("div");
    questionSection.classList.add("leading-7");
    questionSection.innerHTML = `
        <div class="question max-w-2xl bg-white shadow-2xl p-8 shadow-2xl rounded-xl flex flex-col gap-4 hover:transform hover:scale-105 transition-all delay-75">
        <h2 class="mb-4 font-medium text-2xl text-purple-700"> 
            Incorrect Question N°${index+1}
        </h2>
            <p class="text-xl questionText">
                <span class="title font-bold text-purple-900">Question: </span>
                ${localStorageCorrection[index][0]["questionText"]}?
            </p>
            <p class="questionDescription">
                <span class="title font-bold text-xl text-purple-900">Correct Answer: </span>
                ${localStorageCorrection[index][1]["answerText"]}?
            </p>
            <p class="questionDescription font-mono">
                <span class="title font-bold text-xl text-purple-900">Description: </span>
                ${localStorageCorrection[index][1]["answerDescription"]}?
            </p>
            
        </div>
    `;
    correctionContainer.appendChild(questionSection);
});
