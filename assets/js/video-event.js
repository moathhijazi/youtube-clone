var video = document.querySelector('video') ; 


video.addEventListener('play' , () => {
    
    video.style.boxShadow = "rgba(255, 255, 255, 0.25) 0px 50px 100px -20px, rgba(255, 255, 255, 0.3) 0px 30px 60px -30px" ; 

    video.addEventListener('pause' , () => {
        video.style.boxShadow = "none" ; 
    })
})

var commentInput = document.querySelector('.comments .my-comm .comment');
var tools = [document.querySelector('.comments #tools #btn-1') ,document.querySelector('.comments #tools #btn-2') ];

commentInput.addEventListener('keyup' , () => {
    if(commentInput.value == '') {
        tools.forEach(Element => {
            Element.style.display = "none"
        })
    }else{
        tools.forEach(Element => {
            Element.style.display = "block"
        })

    }
    
})

//cancel
document.querySelector('.comments #tools #btn-2').addEventListener('click' , () => {
    commentInput.value = null ; 
    tools.forEach(Element => {
        Element.style.display = "none"
    })
})
//comment
document.querySelector('.comments #tools #btn-1').addEventListener('click' , () =>{
    commentInput.value = null 
    commentInput.focus()
})

var liker = document.querySelector('.dis-like') ; 
var disLike = document.querySelector('.like') ; 

var likeIcon = document.querySelector('#like-icon');
var disLikeIcon = document.querySelector('#dislike-icon');

var sub = document.querySelector('.sub') ;

var save = document.querySelector('.save');

function send_like() {
    $.ajax ({
        url : "../../api/backups/like.php" , 
        type  : "POST" , 
        data :  {
            vid : $("#vid").val() 
        }

    })
}
function send_dislike() {
    $.ajax ({
        url : "../../api/backups/dis_like.php" , 
        type  : "POST" , 
        data :  {
            vid : $("#vid").val() 
        }

    })
}

function check(likeCheck , dislike , sub ,  save) {
    if(likeCheck == true) {
        like_set()
    }else{
        like_dis()
    }
    if(dislike == true) {
        dislike_set()
        
    }else{
        dislike_dis()
    }
    if(sub == true) {
        sub_set() ;
    }else{
        sub_dis() ;
    }
    if(save == true) {
        save_set();
    }else{
        save_dis()
    }
   

}

function dislike_set() {
    
    disLike.style.background = "#4e4e4e" ; 
    disLikeIcon.classList.remove('fa-thumbs-down');
    disLikeIcon.classList.remove('fa-regular');
    disLikeIcon.classList.add('fa-solid');
    disLikeIcon.classList.add('fa-thumbs-down');
}

function dislike_dis() {
   
    disLike.style.background = "rgb(46, 46, 46)" ; 
    disLikeIcon.classList.remove('fa-thumbs-down');
    disLikeIcon.classList.remove('fa-solid');
    disLikeIcon.classList.add('fa-regular');
    disLikeIcon.classList.add('fa-thumbs-down');
}

function like_set () {
    
    liker.style.background = "#4e4e4e" ; 
    likeIcon.classList.remove('fa-thumbs-up');
    likeIcon.classList.remove('fa-regular');
    likeIcon.classList.add('fa-solid');
    likeIcon.classList.add('fa-thumbs-up');
}

function like_dis () {
    
    liker.style.background = "rgb(46, 46, 46)" ; 
    likeIcon.classList.remove('fa-thumbs-up');
    likeIcon.classList.remove('fa-solid');
    likeIcon.classList.add('fa-regular');
    likeIcon.classList.add('fa-thumbs-up');
}

function sub_set() {
    sub.style.background = "unset" ;
    sub.style.border = "solid 1px silver" ;
    sub.style.color = "white" ;
    sub.innerHTML = "subsicriped" ; 



}
function sub_dis() {
    sub.style.background = "white" ;
    
    sub.style.color = "black" ;
    sub.innerHTML = "subsicrip" ; 



}

function save_set() {
    save.style.background = "#4e4e4e" ; 
    save.innerHTML = `<i class="fa-solid fa-check"></i> <span>saved</span>` ; 
}

function save_dis () {
    save.style.background = "rgb(46, 46, 46)" ; 
    save.innerHTML = `
    <i class="fa-solid fa-plus-minus"></i>
    <span>save</span>`;
}

liker.addEventListener('click' , () => {

    if(liker.style.background == 'rgb(46, 46, 46)') {

        //set like

        like_set()
        dislike_dis()

    }else{
        
        // unlike
        
        like_dis()
        
        

    }


   



})


disLike.addEventListener('click' , () => {

    if(disLike.style.background == 'rgb(46, 46, 46)') {

        dislike_set()
        like_dis()

    }else{
        

    
       dislike_dis()
        
        
        

    }


   



})

sub.addEventListener('click' , () => {

    if(sub.style.background == 'white') {

        sub_set()

    }else{
        

    
       sub_dis()
        
        
        

    }


   



})


save.addEventListener('click' , () => {

    if(save.style.background == 'rgb(46, 46, 46)') {

        save_set()

    }else{
        

    
       save_dis()
        
        
        

    }


   



})


