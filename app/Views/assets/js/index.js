const container = document.querySelector('#container');
const nextQuestion = document.querySelector('#nextQuestion');

window.addEventListener('load', fetchQuestion);

container.addEventListener('click', function (event){
    if(event.target.id === 'nextQuestion'){
        fetchQuestion();
    }
});
function fetchQuestion() {
    const options = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `ok=1`
    };
    fetch(`../App/Controllers/controller.php`, options)
        .then(response => response.text())
        .then(data => {
            let object = (JSON.parse(data));
            console.log(object);

            container.innerHTML = `
           <div class="header flex justify-between items-center p-4">
    <div class="logo">
        <img class="w-12 h-12" src="../App/Views/assets/img/logo.png" alt="page logo">
    </div>
    <div class="question bg-[#6b21a8] text-white font-bold text-lgk text-center w-[50%] h-12 rounded-xl flex items-center justify-center py-16 px-2">
    <h2 class="questionContent">
        ${object.questionText}
</h2>
    </div>
    <div class="next-btn primary-btn bg-blue-500 text-white p-4 rounded-lg">
        <button id="nextQuestion">Next</button>
    </div>
</div>

<div class="quiz-details flex justify-between items-center p-4">
    <div class="time-counter text-2xl font-bold">16</div>
    <div class="img">
        <img class="w-24 h-36" src="../App/Views/assets/img/logo.png" alt="main-img">
    </div>
    <div class="progress-bar flex items-center">
        <span class="answer-counter text-2xl font-bold">0</span>
        <strong class="desc ml-2">
            answers
        </strong>
    </div>
</div>

<div class="answers-items flex flex-wrap justify-between p-4">
    <div onclick="questionAnswered(${object.answerArray[0].ID})" id="answerId" class="answer-item bg-[#7c3aed] text-white font-bold text-center w-[40%] h-24 rounded-xl m-2 pt-5">
        <h3 class="answerContent">
        ${object.answerArray[0].answerText}
        </h3>
    </div>
    <div onclick="questionAnswered(${object.answerArray[1].ID})" id="answerId" class="answer-item bg-[#7c3aed] text-white font-bold text-center w-[40%] h-24 rounded-xl m-2 pt-5">
        <h3 class="answerContent">
        ${object.answerArray[1].answerText}
        </h3>
    </div>
    <div onclick="questionAnswered(${object.answerArray[2].ID})" id="answerId" class="answer-item bg-[#7c3aed] text-white font-bold text-center w-[40%] h-24 rounded-xl m-2 pt-5">
        <h3 class="answerContent">
        ${object.answerArray[2].answerText}
        </h3>
    </div>
    <div onclick="questionAnswered(${object.answerArray[3].ID})" id="answerId" class="answer-item bg-[#7c3aed] text-white font-bold text-center w-[40%] h-24 rounded-xl m-2 pt-5">
        <h3 class="answerContent">
            ${object.answerArray[3].answerText}
        </h3>
    </div>   
</div>
`;
        })
        .catch(error => console.error('Error:', error));
}

window.onbeforeunload = (event) => {
    event.preventDefault();
}
