<?php
print("<h2>Messages</h2>");

$br = "\n";
print('<div id="Message-box">
    <form method= "post">
        <textarea name= "message" placeholder="Write a message..." required></textarea>
        <button type="submit">Send</button>
    </form>
    </div>');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $message     = htmlspecialchars($_REQUEST["message"]);
    $username    = $_SERVER['REMOTE_USER'];
    $cookie_name = $username;

    if (isset($_COOKIE[$cookie_name])) {
        $date   = date("d-m-Y H.i");
        $entry = "$date | $username | $message $br";
        $myFile = fopen("message.txt", "a");
        fwrite($myFile, $entry);
        fclose($myFile);
    }

}

$myFile = "message.txt";

if (file_exists($myFile)) {
    $rows = file($myFile, FILE_IGNORE_NEW_LINES);

    foreach (array_reverse($rows) as $row) {
        print("<div class='message'>" . htmlspecialchars($row) . "</div>");
    }
}
else{
    print("<p>No messages</p>");
}
