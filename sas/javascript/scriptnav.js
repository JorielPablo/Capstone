const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");


toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("close");
})

searchBtn.addEventListener("click" , () =>{
    sidebar.classList.remove("close");
})

modeSwitch.addEventListener("click" , () =>{
    body.classList.toggle("dark");
    var header1 = document.querySelectorAll('canvas');
    if(body.classList.contains("dark")){
        header1.forEach(card => {
            card.classList.add('dark-mode');
        });
    }else{
        header1.forEach(card => {
            card.classList.remove('dark-mode');
        });

    }
    console.log(modeSwitch)
});

window.addEventListener('resize', function() {
    var windowWidth = window.innerWidth;
    var header1 = document.getElementById('ave-soil');
    var header2 = document.getElementById('soil');
  
    if (windowWidth <= 1050) {
      header1.classList.remove('col-md-6');
      header2.classList.remove('col-md-6');
      header1.classList.add('col-md-10');
      header2.classList.add('col-md-10');
    } 
    
    if (windowWidth > 768){
      document.querySelector(".sidebar").style.display= "block"
    document.getElementById("exit").classList.remove("toggle")
    }
    
    
    else {
      header1.classList.remove('col-md-10');
      header2.classList.remove('col-md-10');
      header1.classList.add('col-md-6');
      header2.classList.add('col-md-6');  
      document.querySelector(".sidebar").style.display= "none"
    }
  });
  function showItems() {
    document.querySelector(".sidebar").style.display="block"
    document.getElementById("exit").classList.add("toggle")
    
  }
  function closeNav() {
    
    document.querySelector(".sidebar").style.display = "none"
  }