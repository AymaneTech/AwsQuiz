let correctionContainer = document.querySelector("#correction-container");

let localStorageCorrection = JSON.parse(localStorage.getItem("correction"));
console.log("localStorageCorrection", localStorageCorrection);

localStorageCorrection.forEach((correction, index) => {
    let questionSection = document.createElement("div");
    questionSection.innerHTML = `
        <h2>
            Incorrect Question N°${index}
        </h2>
        <div class="question">
            <p class="questionText">${localStorageCorrection[index].wrong.answerText}</p>
        </div>
    `;
    correctionContainer.appendChild(questionSection);
});
