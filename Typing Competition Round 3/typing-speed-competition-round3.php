<?php
/*
Plugin Name: Typing Speed Competition Round 3
Description: A typing speed competition plugin for Round 3 with live leaderboard.
Version: 1.0
Author: Umar Shaheen
*/

function typing_competition_enqueue_scripts_round3() {
    wp_enqueue_style('typing-competition-style-round3', plugins_url('css/style.css', __FILE__));
    wp_enqueue_script('typing-competition-script-round3', plugins_url('js/script.js', __FILE__), array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'typing_competition_enqueue_scripts_round3');

function typing_competition_shortcode_round3() {
    ob_start(); ?>
    <div class="typing-competition-container">
        <h1>Typing Speed Competition - Round 3</h1>
        <div id="round-3">
            <p><strong>Criteria:</strong> Type the following paragraph within 1 minute. A minimum typing speed of 20 words per minute (WPM) is required to win the competition and unlock the certificate. Successful participants will be awarded the Diamond Badge and proceed to get the certificate.</p>
            <p id="generated-paragraph">This is a sample system generated paragraph for the typing competition. Participants must type this paragraph exactly as it is within the allotted time to win the competition. Accuracy and speed are both essential to win the competition and earn the certificate.</p>
            <form id="round-3-form">
                <textarea id="user-input" rows="5" placeholder="Start typing here..."></textarea>
                <div id="timer">Time left: <span id="time">60</span> seconds</div>
                <button type="button" id="submit-round-3">Submit</button>
            </form>
        </div>
        <div id="result-message"></div>
        <div id="certificate-button" style="display:none;">
            <button type="button" id="get-certificate">Get Certificate</button>
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
add_shortcode('typing_competition_round3', 'typing_competition_shortcode_round3');
?>
