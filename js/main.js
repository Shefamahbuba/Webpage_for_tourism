document.getElementById("Cpackage").addEventListener('click',function(){
    document.querySelector(".create-packages").style.display="block";
    document.querySelector(".show-first").style.display="none";
    document.querySelector(".update-packages").style.display="none";
    document.querySelector(".delete-packages").style.display="none";
    document.getElementById("#issuses").style.display="none";
})



    document.getElementById("Upackage").addEventListener('click',function(){
        document.querySelector(".update-packages").style.display="flex";
        document.querySelector(".show-first").style.display="none";
        document.querySelector(".create-packages").style.display="none";
        document.querySelector(".delete-packages").style.display="none";})


        document.getElementById("Dpackage").addEventListener('click',function(){
            document.querySelector(".delete-packages").style.display="flex";
            document.querySelector(".show-first").style.display="none";
            document.querySelector(".create-packages").style.display="none";
            document.querySelector(".update-packages").style.display="none";})

           