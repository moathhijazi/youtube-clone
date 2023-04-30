var videoBorder = document.querySelector('.video-border') ; 
var imageBorder = document.querySelector('.image-border') ; 
var videoInput  = document.querySelector('#video-input') ;
var imageInput  = document.querySelector('#image-input') ;

function sendApi(forms) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'api/backups/save_chach.php'); // set the URL and HTTP method
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // set the content type header
    xhr.onload = function() {
    if (xhr.status === 200) {
        console.log(xhr.responseText); // handle success response
    } else {
        console.log('Request failed. Status:', xhr.status); // handle error response
    }
    };
    xhr.onerror = function() {
    console.log('Network error.'); // handle network error
    };

    xhr.send(forms); // send the request
   
    

    

}
videoInput.addEventListener('change' , () => {
    const videoForm = new FormData() ; 
    videoForm.append('cach' , videoInput.files[0]);
    sendApi(videoForm)


})

