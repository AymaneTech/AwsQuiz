const container = document.querySelector('#container');
const seeCorrection = document.querySelector('#seeCorrection');
fetchQuestion();

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
        .catch((error) => {
            console.log(error);
        });
}

function handleResponse(response) {
    if (!response.ok) {
        throw new Error(`sending request error! Status: ${response.status}`);
    }
    return response.text();
}

function displayQuestion(data) {
    if (data) {
        const object = JSON.parse(data);
        console.log(object)
        container.innerHTML = "";
        if (object.status && object.status === 'game_over') {
            container.innerHTML = `
             <div class="text-center m-auto flex flex-col align-center justify-center text-xl ">
        <div class="content m-auto flex flex-col align-start gap-16 bg-[#fff] shadow-xl	rounded-xl px-32 py-12">
            <h1 class="mb-2 mt-0 text-5xl font-medium leading-tight text-primary">Hey 
            <span class="font-bold text-[#a21caf]">${object.info.pseudoName}</span></h1>
            <p>${checkScore(object.info.points)}</p>
            <div class="score">
                <h2 class="text-[#a21caf] font-bold">Score: <span class="text-[#000] ">${object.info.points}</span></h2>
            </div>
            <div class="incorrectAnswers">
                <h2 class="text-[#a21caf] font-bold">Correct Answers: <span class="text-[#000] ">${10 - correctionArray.length}</span></h2>
            </div>
            <div class="correctAnswers">
                <h2 class="text-[#a21caf] font-bold">Incorrect Answers: <span class="text-[#000] ">${correctionArray.length}</span></h2>
            </div>
            <div class="buttons flex gap-8">
                <a id="seeCorrection" href="./correction.php" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">See Correction</a>
                <button id="restart" type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Restart Game</button>
            </div>
        </div>
    </div>`;
        } else {
            console.log(object);
            container.innerHTML = `
           <div class="header flex justify-center items-center p-4">
                <div class="question bg-purple-700 text-white text-xl  text-center w-[60%] h-12 rounded-xl flex items-center justify-center py-16 px-16">
                    <h2 class="questionContent">${object.questionText}</h2>
                </div>
           </div>
           <div class="quiz-details flex justify-between items-center p-4 text-white">
               <div class="time-counter bg-[#45474B] rounded-lg p-4 text-2xl font-bold">${object.counter}/10</div>
                <div class="bg-[#45474B] text-white p-8 rounded-xl text-white">
                    <strong id="timer">20</strong>
                </div>
           </div>
            <div class="answers-items flex flex-wrap justify-between p-4">
    <div onclick="questionAnswered(${object.answerArray[0].ID}, ${object.questionID}, 0)" id="answerId" class="answer-item text-xl bg-white text-[#222] font-semibold text-center w-[40%] h-24 rounded-xl m-2 px-4 pt-5 hover:bg-purple-700 hover:text-white hover:transition-transform hover:transform hover:scale-105 shadow-xl duration:300 ease-in-out">
        <h3 class="answerContent">
        ${object.answerArray[0].answerText}
        </h3>
    </div>
    <div onclick="questionAnswered(${object.answerArray[1].ID}, ${object.questionID}, 1)" id="answerId" class="answer-item text-xl bg-white text-[#222] font-semibold text-center w-[40%] h-24 rounded-xl m-2 px-4 pt-5 hover:bg-purple-700 hover:text-white hover:transition-transform hover:transform hover:scale-105 shadow-xl duration:300 ease-in-out">
        <h3 class="answerContent">
        ${object.answerArray[1].answerText}
        </h3>
    </div>
    <div onclick="questionAnswered(${object.answerArray[2].ID}, ${object.questionID}, 2)" id="answerId" class="answer-item text-xl bg-white text-[#222] font-semibold text-center w-[40%] h-24 rounded-xl m-2 px-4 pt-5 hover:bg-purple-700 hover:text-white hover:transition-transform hover:transform hover:scale-105 shadow-xl duration:300 ease-in-out">
        <h3 class="answerContent">
        ${object.answerArray[2].answerText}
        </h3>
    </div>
    <div onclick="questionAnswered(${object.answerArray[3].ID}, ${object.questionID}, 3)" id="answerId" class="answer-item text-xl bg-white text-[#222] font-semibold text-center w-[40%] h-24 rounded-xl m-2 px-4 pt-5 hover:bg-purple-700 hover:text-white hover:transition-transform hover:transform hover:scale-105 shadow-xl duration:300 ease-in-out">
        <h3 class="answerContent">
            ${object.answerArray[3].answerText}
        </h3>
    </div>
</div>
        `;
            timing();
        }
        document.querySelector("#restart")?.addEventListener("click", ()=>{
            correctionArray = [];
            localStorage.removeItem("correction");
            fetchQuestion();
        });
    }
}

function handleError(error) {
    console.error('Error asahbi '.error);
}
function checkScore(score) {
    if (score <= 20) {
        return "OOps Next time You will Win!!"
    } else if (score <= 50) {
        return "nice work, do better next time";
    } else if (score <= 80) {
        return "good work, you're the best";
    } else if (score <= 90) {
        return "batal, mhyeb";
    }

}

