// const degital = {
//     init : function() {
//         this.clickshowitem('.degital__main__block__item__txt','.degital__main__block__item__deceription__un','show');
//         this.clickshowitem('.degital__main__block__item__txt1','.degital__main__block__item__deceription__un1','show');
//     },
//     clickshowitem :function(btn ,objec1,togleclass){
//         let button= document.querySelector(btn);
//         let doituong= document.querySelector(objec1);
//         button.addEventListener('click', () => {
//             doituong.classList.toggle(togleclass);
//         });
//     },
// }
// degital.init();
//
// document.addEventListener("DOMContentLoaded",function(){
//     var x2 = document.querySelector('header__top__logo');
//     console.log
//     x2.onclick = function(){
//         x2.classList.toggle('xqxx');
//     }
// },false)

var untxt = document.querySelectorAll('.degital__main__block__item__deceription');
var slider_text = document.querySelectorAll('.degital__main__block__item__txt');

 slider_text.forEach(function(dt,index){

        dt.addEventListener('click',function(){
            untxt.forEach(function(text){
                text.classList.remove('sx');
            })
            untxt[index].classList.add('sx');
            console.log('kanex');

        })

 })