jQuery(document).ready(function($) {
    let generatedText = "This is a sample generated paragraph for testing typing speed and accuracy. You need to type this exactly as it is displayed.";
    let startTime, endTime;

    $('#generated-text').text(generatedText);

    $('#user-input').on('focus', function() {
        startTime = new Date();
    });

    $('#submit-btn').on('click', function() {
        endTime = new Date();
        let userInput = $('#user-input').val();
        let elapsedTime = (endTime - startTime) / 1000; // seconds
        let wordsPerMinute = (userInput.split(' ').length / elapsedTime) * 60;
        let accuracy = calculateAccuracy(generatedText, userInput);
        let errorRate = 100 - accuracy;

        $('#wpm').text(wordsPerMinute.toFixed(2));
        $('#accuracy').text(accuracy.toFixed(2) + '%');
        $('#error-rate').text(errorRate.toFixed(2) + '%');
    });

    function calculateAccuracy(original, typed) {
        let originalWords = original.split(' ');
        let typedWords = typed.split(' ');
        let correctWords = 0;

        for (let i = 0; i < originalWords.length; i++) {
            if (originalWords[i] === typedWords[i]) {
                correctWords++;
            }
        }

        return (correctWords / originalWords.length) * 100;
    }
});
