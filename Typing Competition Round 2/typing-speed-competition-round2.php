<?php
/*
Plugin Name: Typing Speed Competition Round 2
Description: A typing speed competition plugin for Round 2 with live leaderboard.
Version: 1.0
Author: Umar Shaheen
*/

function typing_competition_enqueue_scripts_round2() {
    wp_enqueue_style('typing-competition-style-round2', plugins_url('css/style.css', __FILE__));
    wp_enqueue_script('typing-competition-script-round2', plugins_url('js/script.js', __FILE__), array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'typing_competition_enqueue_scripts_round2');

function typing_competition_shortcode_round2() {
    ob_start(); ?>
    <div class="typing-competition-container">
        <h1>Typing Speed Competition - Round 2</h1>
        <div id="round-2">
            <p><strong>Criteria:</strong> Type the following paragraph within 1 minute. A minimum typing speed of 10 words per minute (WPM) is required to advance. Successful participants will be awarded the Gold Badge and proceed to Round 3.</p>
            <p id="generated-paragraph">This is a sample system generated paragraph for the typing competition. Participants must type this paragraph exactly as it is within the allotted time to proceed to the next round. Accuracy and speed are both essential to win the competition and move forward.</p>
            <form id="round-2-form">
                <textarea id="user-input" rows="5" placeholder="Start typing here..."></textarea>
                <div id="timer">Time left: <span id="time">60</span> seconds</div>
                <button type="button" id="submit-round-2">Submit</button>
            </form>
        </div>
        <div id="result-message"></div>
        <div id="next-round-button" style="display:none;">
            <button type="button" id="start-round-3">Participate in Round 3</button>
        </div>
        <div id="leaderboard">
            <h2>Live Leaderboard</h2>
            <table>
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Name</th>
                        <th>Typing Speed (WPM)</th>
                        <th>Accuracy</th>
                        <th>Progress</th>
                    </tr>
                </thead>
                <tbody id="leaderboard-entries">
                    <!-- Leaderboard entries will be populated here -->
                </tbody>
            </table>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('typing_competition_round2', 'typing_competition_shortcode_round2');
?>
