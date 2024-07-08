jQuery(document).ready(function($) {
    let timer;
    let timeLeft = 60;
    let wpmThreshold = 10;
    let generatedParagraph = $("#generated-paragraph").text().split(' ');

    function updateTimer() {
        if (timeLeft <= 0) {
            clearInterval(timer);
            $("#submit-round-2").click();
        } else {
            $("#time").text(--timeLeft);
        }
    }

    $("#submit-round-2").on("click", function() {
        clearInterval(timer);
        let userInput = $("#user-input").val().trim().split(' ');
        let correctWords = 0;

        for (let i = 0; i < userInput.length; i++) {
            if (userInput[i] === generatedParagraph[i]) {
                correctWords++;
            }
        }

        let wpm = (correctWords / 1); // since the time limit is 1 minute

        if (wpm >= wpmThreshold) {
            $("#result-message").text("Congratulations, round 3 is unlocked!");
            $("#next-round-button").show();
            // Update leaderboard logic here
            let participantName = $("#participant-name").val();
            let newRow = `<tr><td>1</td><td>${participantName}</td><td>${wpm}</td><td>${Math.round((correctWords / generatedParagraph.length) * 100)}%</td><td>Round 2</td></tr>`;
            $("#leaderboard-entries").append(newRow);
        } else {
            $("#result-message").text("Oops! You couldn't make it, Don't give up, try again!");
        }
    });

    timer = setInterval(updateTimer, 1000);
});
