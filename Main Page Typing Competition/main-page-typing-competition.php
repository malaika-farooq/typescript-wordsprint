<?php
/*
Plugin Name: Main Page Typing Competition
Description: A typing competition plugin with multiple rounds and live leaderboard.
Version: 1.0
Author: Umar Shaheen
*/

function typing_competition_shortcode() {
    ob_start();
    ?>
    <style>
        .typing-competition-container {
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 10px;
            color: #333;
            font-family: Arial, sans-serif;
        }
        .typing-competition-rules {
            background-color: #ff4d4d;
            padding: 20px;
            border-radius: 10px;
            color: white;
            margin-bottom: 20px;
        }
        .typing-competition-button {
            background-color: #cc0000;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .typing-competition-button:hover {
            background-color: #b30000;
        }
    </style>
    <div class="typing-competition-container">
        <h2>Typing Speed Competition</h2>
        <div class="typing-competition-rules">
            <h3>Rules and Criteria:</h3>
            <p><strong>Round 1:</strong> Participants must type a randomly generated paragraph of approximately 100 words within 1 minute. To advance, a minimum typing speed of 2 words per minute (WPM) is required. Successful participants will be awarded the Silver Badge and proceed to Round 2.</p>
            <p><strong>Round 2:</strong> Participants type another 100-word paragraph in 1 minute. A minimum speed of 5 WPM is needed to advance. Participants achieving this will be awarded the Gold Badge and move on to Round 3. Those who don't qualify will retain their Silver Badge.</p>
            <p><strong>Round 3:</strong> Participants type the final 100-word paragraph within 1 minute. A speed of 7 WPM or higher is required to win the competition and earn the Diamond Badge. Participants who do not meet this criterion will be awarded the Gold Badge.</p>
            <p><strong>Time Limits:</strong> Each round has a strict 1-minute time limit, with a timer displayed on the screen to help participants track their progress.</p>
            <p><strong>Leaderboard:</strong> A live leaderboard will display participants' ranks, typing speeds, accuracy rates, and progress through the rounds, offering a real-time competitive experience.</p>
        </div>
        <button class="typing-competition-button" onclick="startCompetition()">Start Competition</button>
    </div>
    <div id="round1" style="margin-top: 50px;">
        <!-- Content for Round 1 goes here -->
    </div>
    <script>
        function startCompetition() {
            document.getElementById('round1').scrollIntoView({ behavior: 'smooth' });
        }
    </script>
    <?php
    return ob_get_clean();
}

add_shortcode('typing_competition', 'typing_competition_shortcode');
?>
