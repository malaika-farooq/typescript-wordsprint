jQuery(document).ready(function($) {
    let timer;
    let timeLeft = 60;
    let wpmThreshold = 2;
    let generatedParagraph = $("#generated-paragraph").text().split(' ');

    function updateTimer() {
        if (timeLeft <= 0) {
            clearInterval(timer);
            $("#submit-round-1").click();
        } else {
            $("#time").text(--timeLeft);
        }
    }

    $("#start-round-1").on("click", function() {
        $("#participant-form").hide();
        $("#round-1").show();
        timer = setInterval(updateTimer, 1000);
    });

    $("#submit-round-1").on("click", function() {
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
            $("#result-message").text("Congratulations, round 2 is unlocked!");
            $("#next-round-button").show();
            // Update leaderboard logic here
            let participantName = $("#participant-name").val();
            let newRow = `<tr><td>1</td><td>${participantName}</td><td>${wpm}</td><td>${Math.round((correctWords / generatedParagraph.length) * 100)}%</td><td>Round 1</td></tr>`;
            $("#leaderboard-entries-round1").append(newRow);
        } else {
            $("#result-message").text("Oops! You couldn't make it, Don't give up, try again!");
        }
    });
});
