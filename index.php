<?php
date_default_timezone_set("Asia/Manila");

$boyfriend = "Love";

$messages = ["You are my favorite notification every day"];
$randomMessage = $messages[array_rand($messages)];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Happy Valentine's Day ❤️</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('lavey.jpg') no-repeat center center fixed;background-size: cover;
            font-family: 'Poppins', sans-serif;
            text-align: center;
            color: white;
            overflow: hidden;
            position: relative;
        }
        body::before {
    content: "";
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(255, 105, 180, 0.30); /* Pink with 30% opacity */
    z-index: 0;
}
        /* Make sure content stays above overlay */
        .container, #lovePopup {position: relative;z-index: 1;}
        .container { margin-top: 280px; }
        h1 { font-size: 50px; animation: glow 2s infinite alternate; }
        p { font-size: 22px; }
        .heart {
            position: absolute;
            color: pink;
            font-size: 20px;
            animation: float 6s linear infinite;
        }
        @keyframes float {
            0% { transform: translateY(100vh); opacity: 1; }
            100% { transform: translateY(-10vh); opacity: 0; }
        }
        @keyframes glow {
            from { text-shadow: 0 0 10px #fff; }
            to { text-shadow: 0 0 30px #ffdde1; }
        }
        button {
            padding: 12px 25px;
            font-size: 18px;
            border: none;
            border-radius: 30px;
            background-color: white;
            color: #ff4d6d;
            cursor: pointer;
            margin-top: 20px;
            transition: 0.3s;
        }
        button:hover {
            background-color: #ffe6ec;
            transform: scale(1.05);
        }
        #lovePopup {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.7);
    display: flex;
    justify-content: center;
    align-items: center;
    animation: fadeIn 0.8s ease;
}

.loveContent {
    background: #fff6d2;
    color: #e1b91b;
    padding: 40px;
    border-radius: 20px;
    text-align: center;
    width: 80%;
    max-width: 500px;
    animation: popUp 0.6s ease;
}

.loveContent h2 {
    margin-bottom: 15px;
}

.loveContent button {
    background: #ff4d6d;
    color: white;
    margin-top: 15px;
}

@keyframes popUp {
    from { transform: scale(0.5); opacity: 0; }
    to { transform: scale(1); opacity: 1; }
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}
    </style>
</head>
<body>

<div class="container">
    <h1>Happy Valentine's Day, <?php echo $boyfriend; ?>! ❤️</h1>
    <p><?php echo $randomMessage; ?></p>

    <button onclick="showLove()">
    💌
</button>

<div id="lovePopup" style="display:none;">
    <div class="loveContent">
        <h2>To My Yellow,</h2>
        <p id="loveMessage"></p>
        <button onclick="window.location.href='memories.php'">📷</button>
    </div>
</div>

<!-- Background Music -->
<audio id="bgMusic" loop>
    <source src="invisible_string.mp3" type="audio/mpeg">
</audio>

<script>
// Try autoplay on page load
window.addEventListener("load", function() {
    let music = document.getElementById("bgMusic");
    music.play().catch(() => {
        console.log("Autoplay blocked. Waiting for user interaction.");
    });
});

// Play music when user interacts (backup solution)
document.addEventListener("click", function() {
    let music = document.getElementById("bgMusic");
    music.play();
}, { once: true });

// Surprise button
function showLove() {

    let messages = ["My greatest plot twist, my safe place, my (happiness?), my home. You are my answered prayer and my greatest blessing. I love you and I am so grateful to have you in my life.          Happy Valentine's Day, Love!",];

    let random = messages[Math.floor(Math.random() * messages.length)];
    document.getElementById("loveMessage").innerHTML = random;

    document.getElementById("lovePopup").style.display = "flex";

    // Heart explosion
    for (let i = 0; i < 50; i++) {
        let heart = document.createElement("div");
        heart.innerHTML = "❤️";
        heart.style.position = "fixed";
        heart.style.left = Math.random() * 100 + "vw";
        heart.style.top = Math.random() * 100 + "vh";
        heart.style.fontSize = "20px";
        heart.style.animation = "float 3s linear forwards";
        document.body.appendChild(heart);

        setTimeout(() => heart.remove(), 3000);
    }
}

function closeLove() {
    document.getElementById("lovePopup").style.display = "none";
}
</script>

</body>
</html>
