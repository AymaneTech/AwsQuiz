const container = document.querySelector('#container');
const nextQuestionButton = document.querySelector('#nextQuestion');

window.addEventListener('load', fetchQuestion);

nextQuestionButton.addEventListener('click', fetchQuestion);

function fetchQuestion() {
    const options = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'ok=1'
    };

    fetch('../App/Controllers/controller.php', options)
        .then(handleResponse)
        .then(displayQuestion)
        .catch(handleError);
}

function handleResponse(response) {
    if (!response.ok) {
        throw new Error(`HTTP error! Status: ${response.status}`);
    }
    return response.text();
}

function displayQuestion(data) {
    if (data) {
        const object = JSON.parse(data);
        console.log(object);
        container.innerHTML = "";
        if (object.status && object.status === 'game_over') {
            checkScore(object.score);
            container.innerHTML = `
            <div class="text-center text-xl bg-green-300">
                <h1 class="title">Hey ${object.pseudoName}</h1>
                <h3>${checkScore(object.score)}</h3>
                <div class="score"> <h3>${object.score}</h3> </div>
               <div class="buttons">
                    <button id="correction">See Correction</button>
                    <button id="restart">Restart Game</button>
                </div> 
            </div>`;
        } else {
            container.innerHTML = `
           <div class="header flex justify-between items-center p-4">
                <div></div>
                <div class="question bg-[#F4CE14] text-white font-bold text-lgk text-center w-[50%] h-12 rounded-xl flex items-center justify-center py-16 px-2">
                    <h2 class="questionContent">${object.questionText}</h2>
                </div>
                <div class="bg-[#45474B] text-white p-8 rounded-xl text-white">
                    <strong id="timer">20</strong>
                </div>
           </div>
           <div class="quiz-details flex justify-between items-center p-4 text-white">
               <div class="time-counter bg-[#45474B] rounded-lg p-4 text-2xl font-bold">${object.counter}/10</div>
                <div class="progress-bar bg-[#45474B] rounded-lg p-4 flex items-center">
                    <span class="answer-counter text-2xl font-bold">0</span>
                    <strong class="desc ml-2">answers</strong>
                </div>
           </div>
            <div class="answers-items flex flex-wrap justify-between p-4">
    <div onclick="questionAnswered(${object.answerArray[0].ID}, ${object.questionID}, 0)" id="answerId" class="answer-item bg-[#495E57] text-white font-bold text-center w-[40%] h-24 rounded-xl m-2 pt-5 hover:bg-red-400 hover:transition-transform hover:transform hover:scale-105 hover:shadow-lg">
        <h3 class="answerContent">
        ${object.answerArray[0].answerText}
        </h3>
    </div>
    <div onclick="questionAnswered(${object.answerArray[1].ID}, ${object.questionID}, 1)" id="answerId" class="answer-item bg-[#495E57] text-white font-bold text-center w-[40%] h-24 rounded-xl m-2 pt-5 hover:bg-red-400 hover:transition-transform hover:transform hover:scale-105 hover:shadow-lg">
        <h3 class="answerContent">
        ${object.answerArray[1].answerText}
        </h3>
    </div>
    <div onclick="questionAnswered(${object.answerArray[2].ID}, ${object.questionID}, 2)" id="answerId" class="answer-item bg-[#495E57] text-white font-bold text-center w-[40%] h-24 rounded-xl m-2 pt-5 hover:bg-red-400 hover:transition-transform hover:transform hover:scale-105 hover:shadow-lg">
        <h3 class="answerContent">
        ${object.answerArray[2].answerText}
        </h3>
    </div>
    <div onclick="questionAnswered(${object.answerArray[3].ID}, ${object.questionID}, 3)" id="answerId" class="answer-item bg-[#495E57] text-white font-bold text-center w-[40%] h-24 rounded-xl m-2 pt-5 hover:bg-red-400 hover:transition-transform hover:transform hover:scale-105 hover:shadow-lg">
        <h3 class="answerContent">
            ${object.answerArray[3].answerText}
        </h3>
    </div>
</div>
        `;
            timing();
        }
        document.querySelector("#restart").addEventListener("click", fetchQuestion);
    }
}

function handleError(error) {
    console.error('Error asahbi ');
}
function checkScore (score){
    if (score <= 20){
        return "OOps Next time You will Win!!"
    }else if (score <= 50){
        return "nice work, do better next time";
    }else if (score <= 80){
        return "good work, you're the best";
    }else if (score <= 90){
        return "batal, mhyeb";
    }

}
