<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>YouTube</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="shortcut icon" href="assets/images/icons/logo.png" type="image/x-icon" >
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>

<!-- Modal -->
        <div class="modal fade" id="upload-video" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header bg-dark text-light">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Upload new video</h1>
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body bg-dark text-light">
                <input type = "file" class = "form-control bg-dark text-light"  id= "new-video">
            </div>
            <div class="modal-footer bg-dark">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-light">Save</button>
            </div>
            </div>
        </div>
        </div>
    <header>
        <?php include('assets/pages/head.php') ?>
    </header>
    <section class="sidebar">
        <ul class="links">
            <li>
                <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" class="style-scope yt-icon" style="pointer-events: none; display: block; width: 30px; height: 100%;"><g class="style-scope yt-icon"><path d="M4,10V21h6V15h4v6h6V10L12,3Z" class="style-scope yt-icon"></path></g></svg>
                <span>Home</span>
            </li>
            <li>
                <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" class="style-scope yt-icon" style="pointer-events: none; display: block;width: 30px; height: 100%;"><g class="style-scope yt-icon"><path d="M10,18v-6l5,3L10,18z M17,3H7v1h10V3z M20,6H4v1h16V6z M22,9H2v12h20V9z M3,10h18v10H3V10z" class="style-scope yt-icon"></path></g></svg>
                <span>Subsicribes</span>
            </li>
            <li>
                <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" class="style-scope yt-icon" style="pointer-events: none; display: block; width: 30px; height: 100%;"><g class="style-scope yt-icon"><path d="M14.97,16.95L10,13.87V7h2v5.76l4.03,2.49L14.97,16.95z M22,12c0,5.51-4.49,10-10,10S2,17.51,2,12h1c0,4.96,4.04,9,9,9 s9-4.04,9-9s-4.04-9-9-9C8.81,3,5.92,4.64,4.28,7.38C4.17,7.56,4.06,7.75,3.97,7.94C3.96,7.96,3.95,7.98,3.94,8H8v1H1.96V3h1v4.74 C3,7.65,3.03,7.57,3.07,7.49C3.18,7.27,3.3,7.07,3.42,6.86C5.22,3.86,8.51,2,12,2C17.51,2,22,6.49,22,12z" class="style-scope yt-icon"></path></g></svg>
                <span>History</span>
            </li>
            <li>
                <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" class="style-scope yt-icon" style="pointer-events: none; display: block; width: 30px; height: 100%;"><g class="style-scope yt-icon"><path d="M10,8l6,4l-6,4V8L10,8z M21,3v18H3V3H21z M20,4H4v16h16V4z" class="style-scope yt-icon"></path></g></svg>
                <span>Your videos</span>
            </li>
            <li>
                <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" class="style-scope yt-icon" style="pointer-events: none; display: block; width: 30px; height: 100%;"><g class="style-scope yt-icon"><path d="M14.97,16.95L10,13.87V7h2v5.76l4.03,2.49L14.97,16.95z M12,3c-4.96,0-9,4.04-9,9s4.04,9,9,9s9-4.04,9-9S16.96,3,12,3 M12,2c5.52,0,10,4.48,10,10s-4.48,10-10,10S2,17.52,2,12S6.48,2,12,2L12,2z" class="style-scope yt-icon"></path></g></svg>
                <span>Watch later</span>
            </li>
            <li>
                <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" class="style-scope yt-icon" style="pointer-events: none; display: block; width: 30px; height: 100%;"><g class="style-scope yt-icon"><path d="M18.77,11h-4.23l1.52-4.94C16.38,5.03,15.54,4,14.38,4c-0.58,0-1.14,0.24-1.52,0.65L7,11H3v10h4h1h9.43 c1.06,0,1.98-0.67,2.19-1.61l1.34-6C21.23,12.15,20.18,11,18.77,11z M7,20H4v-8h3V20z M19.98,13.17l-1.34,6 C18.54,19.65,18.03,20,17.43,20H8v-8.61l5.6-6.06C13.79,5.12,14.08,5,14.38,5c0.26,0,0.5,0.11,0.63,0.3 c0.07,0.1,0.15,0.26,0.09,0.47l-1.52,4.94L13.18,12h1.35h4.23c0.41,0,0.8,0.17,1.03,0.46C19.92,12.61,20.05,12.86,19.98,13.17z" class="style-scope yt-icon"></path></g></svg>
                <span>Videos you liked</span>
            </li>
        </ul>
    </section>
    <section class="content">
        <ul class="videos">
            
            <li class="video"><a href="#" class="">
               <div class="video-top">

                <img src="assets/images/icons/youtube.png" alt="title" class="video-image">
                <span class="timer">11:56</span>
               </div>
               <div class="video-bottom">
                    <img src="assets/images/users/youtube-2.jpg" alt="channel-name" class="channel-image">
                    <div class="details">
                        <span style = "font-size: 18px;font-weight: 600;">video title</span>
                        <a class="channel-link" href="channel" title="channel-name">channel name</a>
                        <small>15k views . 7d</small>
                    </div>
                   
               </div>
            </a></li>
            <li class="video"><a href="#" class="">
               <div class="video-top">

                <img src="assets/images/icons/youtube.png" alt="title" class="video-image">
                <span class="timer">11:56</span>
               </div>
               <div class="video-bottom">
                    <img src="assets/images/users/youtube-2.jpg" alt="channel-name" class="channel-image">
                    <div class="details">
                        <span style = "font-size: 18px;font-weight: 600;">video title</span>
                        <a class="channel-link" href="channel" title="channel-name">channel name</a>
                        <small>15k views . 7d</small>
                    </div>
                   
               </div>
            </a></li>
            <li class="video"><a href="#" class="">
               <div class="video-top">

                <img src="assets/images/icons/youtube.png" alt="title" class="video-image">
                <span class="timer">11:56</span>
               </div>
               <div class="video-bottom">
                    <img src="assets/images/users/youtube-2.jpg" alt="channel-name" class="channel-image">
                    <div class="details">
                        <span style = "font-size: 18px;font-weight: 600;">video title</span>
                        <a class="channel-link" href="channel" title="channel-name">channel name</a>
                        <small>15k views . 7d</small>
                    </div>
                   
               </div>
            </a></li>
            <li class="video"><a href="#" class="">
               <div class="video-top">

                <img src="assets/images/icons/youtube.png" alt="title" class="video-image">
                <span class="timer">11:56</span>
               </div>
               <div class="video-bottom">
                    <img src="assets/images/users/youtube-2.jpg" alt="channel-name" class="channel-image">
                    <div class="details">
                        <span style = "font-size: 18px;font-weight: 600;">video title</span>
                        <a class="channel-link" href="channel" title="channel-name">channel name</a>
                        <small>15k views . 7d</small>
                    </div>
                   
               </div>
            </a></li>
            <li class="video"><a href="#" class="">
               <div class="video-top">

                <img src="assets/images/icons/youtube.png" alt="title" class="video-image">
                <span class="timer">11:56</span>
               </div>
               <div class="video-bottom">
                    <img src="assets/images/users/youtube-2.jpg" alt="channel-name" class="channel-image">
                    <div class="details">
                        <span style = "font-size: 18px;font-weight: 600;">video title</span>
                        <a class="channel-link" href="channel" title="channel-name">channel name</a>
                        <small>15k views . 7d</small>
                    </div>
                   
               </div>
            </a></li>
            <li class="video"><a href="#" class="">
               <div class="video-top">

                <img src="assets/images/icons/youtube.png" alt="title" class="video-image">
                <span class="timer">11:56</span>
               </div>
               <div class="video-bottom">
                    <img src="assets/images/users/youtube-2.jpg" alt="channel-name" class="channel-image">
                    <div class="details">
                        <span style = "font-size: 18px;font-weight: 600;">video title</span>
                        <a class="channel-link" href="channel" title="channel-name">channel name</a>
                        <small>15k views . 7d</small>
                    </div>
                   
               </div>
            </a></li>

            
        </ul>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>

