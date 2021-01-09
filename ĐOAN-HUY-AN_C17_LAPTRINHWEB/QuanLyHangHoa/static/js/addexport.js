const degital = {
    init : function() {
        
        this.lickshowformadd('.btn-link1','.form--add','showform','.overlay','showover','.form', 'addform','#cancel');
        this.lickshowformadd1('.btn-link2','.form-goods','showform','.overlay','showover','.goods-frx', 'addform','.cancel1');
    },
    lickshowformadd:function(linkbtn,formxx1,show,overlayx,showover,fox,addfox,can){
      let linkbtn1=document.querySelector(linkbtn);
      let formxx1x=document.querySelector(formxx1);
      let fox1 = document.querySelector(fox);
      let cannel = document.querySelector(can)
      let overlayxxx=document.querySelector(overlayx);
        linkbtn1.addEventListener('click', () => {
          formxx1x.classList.add(show);
          overlayxxx.classList.add(showover);
          fox1.classList.add(addfox);
      });
      cannel.addEventListener('click', () => {
        formxx1x.classList.remove(show);
        overlayxxx.classList.remove(showover);
        fox1.classList.remove(addfox);
      });
    },
    lickshowformadd1:function(linkbtn,formxx1,show,overlayx,showover,fox,addfox,can){
      let linkbtn1=document.querySelector(linkbtn);
      let formxx1x=document.querySelector(formxx1);
      let fox1 = document.querySelector(fox);
      let cannel = document.querySelector(can)
      let overlayxxx=document.querySelector(overlayx);
        linkbtn1.addEventListener('click', () => {
          formxx1x.classList.add(show);
          overlayxxx.classList.add(showover);
          fox1.classList.add(addfox);
      });
      cannel.addEventListener('click', () => {
        formxx1x.classList.remove(show);
        overlayxxx.classList.remove(showover);
        fox1.classList.remove(addfox);
      });
    },
}
degital.init();
