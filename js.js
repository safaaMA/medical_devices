$(document).ready(function () {
    $(".fa-solid").click(function () {
        $(".LeftLest").toggleClass("activve");
        $(".fa-bars").toggleClass("colors");
    });
});

function show() {
    document.getElementById('main-page').style.display = "block";
    document.getElementById('manag-hos').style.display = "none";
    document.getElementById('manag-pers').style.display = "none";

}
function showTeble() {
    document.getElementById('manag-hos').style.display = "block";
    document.getElementById('main-page').style.display = "none";
    document.getElementById('manag-pers').style.display = "none";

}
function managPers() {
    document.getElementById('manag-hos').style.display = "none";
    document.getElementById('main-page').style.display = "none";
    document.getElementById('manag-pers').style.display = "block";

}


// function reveal() {
//   var reveals = document.querySelectorAll(".reveal");
//   reveals.forEach((reveal) => {

//     var windowHeight = window.innerHeight;
//     var elementTop = reveal.getBoundingClientRect().top;
//     var elementVisible = 100;

//     if (elementTop < windowHeight - elementVisible) {
//       reveal.classList.add("active")
//     } else {
//       reveal.classList.remove("active")
//     }

//   });
// }

// window?.addEventListener("scroll", reveal);

// let floatyInit = () => {
//   let floaties = Floaty.init()
//   Floaty.addFloaty('new') // you can even add floaties dynamically
// }

// if (document.readyState === 'loading') {
//   document.addEventListener('DOMContentLoaded', floatyInit)
// } else {
//   floatyInit()
// }




//   function searchDevices() {
//     // استخراج قيمة المربع المخصص للبحث
//     var searchText = document.getElementById('searchInput').value.toLowerCase();

//     // البحث في جدول الأجهزة
//     var rows = document.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
//     for (var i = 0; i < rows.length; i++) {
//       var row = rows[i];
//       var cells = row.getElementsByTagName('td');

//       // قارن نص البحث مع نص في الخلايا (هنا نستخدم العمود الذي تريد البحث فيه)
//       var deviceName = cells[1].textContent.trim().toLowerCase();
//       if (deviceName.includes(searchText)) {
//         row.style.display = ''; // إظهار الصف إذا كان يحتوي على النص المبحوث عنه
//       } else {
//         row.style.display = 'none'; // إخفاء الصف إذا لم يحتوي على النص المبحوث عنه
//       }
//     }
//     alert("تنم  ");

// }
