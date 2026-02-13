<?php
date_default_timezone_set("Asia/Manila");

$photos = [
    "4B98CF1C-3338-496B-9975-AF00D2D70F19.jpg",
    "87CFD174-3CF3-41AE-AFEE-AA8DF726BFE8.jpg",
    "279D6FE6-0A4B-41C8-83D9-2839EACEAE74.jpg",
    "565CC153-8DF9-4BA5-9568-584201A9B47C.jpg",
    "514978.jpg",
    "IMG_0012.JPG",
    "IMG_0487.JPG",
    "IMG_0957.JPG",
    "IMG_1437.JPG",
    "IMG_1928.JPG",
    "IMG_1942.JPG",
    "IMG_2244.JPG",
    "IMG_2244(1).JPG",
    "IMG_8024.JPG",
    "IMG_8092.JPG",
    "IMG_8209.JPG",
    "IMG_8233.JPG",
    "IMG_8235.JPG",
    "IMG_8273.JPG",
    "IMG_8284.JPG",
    "IMG_8287.JPG",
    "IMG_8295.JPG",
    "IMG_8344.JPG",
    "IMG_8448.JPG",
    "IMG_8578.JPG",
    "IMG_8581.JPG",
    "IMG_8621.JPG",
    "IMG_8727.JPG",
    "IMG_8728.JPG",
    "IMG_8763.JPG",
    "IMG_8766.JPG",
    "IMG_8824.JPG",
    "IMG_9166.JPG",
    "2d41ce27-6982-49bd-af6d-9248fdfddf79.jpg",
    "2eebd124-1316-4e1a-bdc4-1b700485fe7a.jpg",
    "3d2ca4e0-7813-4d42-a188-de0927a91313.jpg",
    "8bf6eaf6-73c3-4fff-bbe9-6a050b8754c4.jpg",
    "8e65a970-5cf7-46fb-a0b9-9bee3f425a73.jpg",
    "9ba19762-06e8-44ec-b744-bc3949725a4e.jpg",
    "9fd49b83-0708-4ed0-83a1-3684316cdb74.jpg",
    "35d09112-bc6d-4208-bb32-4f91aa01504d.jpg",
    "96f100aa-f8fe-421b-8191-ef27575a9e36.jpg",
    "0985dc83-3481-4178-87e3-ecb0a611fe12.jpg",
    "62497b77-944a-499e-946a-369469ef8a02.jpg",
    "a815b9ac-28ba-46e4-b0b7-4dd5426d26b1.jpg",
    "b1b289bb-9d90-41ba-ba96-97f87c3d7bca.jpg",
    "b1fa0df4-107c-4367-ad4a-b3ff9b936eb9.jpg",
    "b92bac41-57b9-44fb-8527-3eebd5c50a2c.jpg",
    "d3d1bacc-6d0f-4d2e-ae0d-22ebd2967415.jpg"
];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Our Memories 💕</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            background-size: cover;
            background-position: center;
            transition: background-image 1s ease-in-out;
        }

        /* Pink overlay */
        body::before {
            content: "";
            position: fixed;
            width: 100%;
            height: 100%;
            background: rgba(255,105,180,0.18);
            z-index: 0;
        }

        .slideshow-container {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1;
        }

        .slide {
            position: absolute;
            opacity: 0;
            transition: opacity 1s ease-in-out;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
        }

        .active {
            opacity: 1;
        }

        /* Polaroid Frame */
        .polaroid {
            background: white;
            padding: 15px 15px 50px 15px;
            border-radius: 6px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.4);
            transition: transform 0.5s ease;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .polaroid img {
            max-width: 350px;
            max-height: 60vh;
            object-fit: contain;
            display: block;
            border-radius: 4px;
        }

        /* Floating hearts */
        .heart {
            position: absolute;
            color: pink;
            font-size: 18px;
            animation: float 8s linear infinite;
            z-index: 2;
        }

        @keyframes float {
            0% { transform: translateY(100vh); opacity: 1; }
            100% { transform: translateY(-10vh); opacity: 0; }
        }
    </style>
</head>
<body>

<div class="slideshow-container">
    <?php foreach($photos as $index => $photo): ?>
        <div class="slide <?php echo $index === 0 ? 'active' : ''; ?>">
            <div class="polaroid">
                <img src="<?php echo $photo; ?>" alt="Memory">
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- Background Music -->
<audio id="bgMusic" loop>
    <source src="invisible_string.mp3" type="audio/mpeg">
</audio>

<script>
let slides = document.querySelectorAll(".slide");
let polaroids = document.querySelectorAll(".polaroid");
let photos = <?php echo json_encode($photos); ?>;
let current = 0;

/* Random rotation for polaroid (-10° to +10°) */
function randomRotate(polaroid) {
    let rotate = Math.floor(Math.random() * 21 - 10); // -10 to +10
    polaroid.style.transform = `rotate(${rotate}deg)`;
}

polaroids.forEach(p => randomRotate(p)); // initial rotation

/* Function to set page background */
function setBackground(index) {
    document.body.style.backgroundImage = `url('${photos[index]}')`;
}

/* Slideshow */
function startSlideshow() {
    setBackground(current); // initial background
    setInterval(() => {
        slides[current].classList.remove("active");
        current = (current + 1) % slides.length;
        randomRotate(polaroids[current]); // new random rotation
        slides[current].classList.add("active");
        setBackground(current); // change background to match current photo
    }, 4000);
}

window.onload = function() {
    startSlideshow();
    let music = document.getElementById("bgMusic");
    music.play().catch(() => {});
};

/* Floating hearts */
for (let i = 0; i < 30; i++) {
    let heart = document.createElement("div");
    heart.className = "heart";
    heart.innerHTML = "💖";
    heart.style.left = Math.random() * 100 + "vw";
    heart.style.animationDuration = (Math.random() * 4 + 6) + "s";
    document.body.appendChild(heart);
}
</script>

</body>
</html>
