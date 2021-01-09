const gxx = {
  init: function () {

      this.clickshowsub('.sub__ac','.sub__men1','showsub');
      this.clickshowuser('.dropdown1','.user--menu','showuser');
      this.clickshowadd('.edit1','.delete1','.frm-delete','active','.no','#cancel', '.frm-add', 'showform', '.frm', 'addform', '.overlay', 'showover');
      this.clickshowadd1('.edit-1','.delete-1','.frx-delete','active','.no','#cancel', '.frm-add-1', 'showform', '.frm1', 'addform', '.overlay', 'showover');
      
  },
  clickshowsub:function(btnlink,sub,showsubx) {
    let buttonlink = document.querySelector(btnlink);
    let submenu= document.querySelector(sub);

    buttonlink.addEventListener('click',()=> {
        submenu.classList.toggle(showsubx);
    });
  },
  clickshowuser:function(user,usermenu,show){
    let btnuser = document.querySelector(user);
    let userlist=  document.querySelector(usermenu);


    btnuser.addEventListener('click',()=> {
        userlist.classList.toggle(show);
        console.log("kane");
    });
},
clickshowadd: function (btnedit, btndel,formdel,addfrdel,btnno,btncancel, formadd, addform, form, clform, over, addover) {
  let buttoncancle = document.querySelector(btncancel)
  let formx = document.querySelector(form)
  let tableadd = document.querySelector(formadd);
  let overlay = document.querySelector(over);
  let buttonedit = document.querySelector(btnedit);
  let buttondel = document.querySelector(btndel);
  let formdell = document.querySelector(formdel);
  let buttonno = document.querySelector(btnno);
  console.log(buttonno);

  buttonedit.addEventListener('click', () => {
      formx.classList.add(clform);
      tableadd.classList.add(addform);
      overlay.classList.add(addover);
  });
  buttondel.addEventListener('click',()=>{
      formdell.classList.add(addfrdel);
      overlay.classList.add(addover); 
  });
  buttonno.addEventListener('click',()=>{
      formdell.classList.remove(addfrdel);
      overlay.classList.remove(addover); 
      console.log("Kanexxx");
  });
  buttoncancle.addEventListener('click', () => {
      formx.classList.remove(clform);
      tableadd.classList.remove(addform);
      overlay.classList.remove(addover);
  });
},
clickshowadd1: function (btnedit, btndel,formdel,addfrdel,btnno,btncancel, formadd, addform, form, clform, over, addover) {
  let buttoncancle = document.querySelector(btncancel)
  let formx = document.querySelector(form)
  let tableadd = document.querySelector(formadd);
  let overlay = document.querySelector(over);
  let buttonedit = document.querySelector(btnedit);
  let buttondel = document.querySelector(btndel);
  let formdell = document.querySelector(formdel);
  let buttonno = document.querySelector(btnno);
  console.log(buttonno);

  buttonedit.addEventListener('click', () => {
      formx.classList.add(clform);
      tableadd.classList.add(addform);
      overlay.classList.add(addover);
  });
  buttondel.addEventListener('click',()=>{
      formdell.classList.add(addfrdel);
      overlay.classList.add(addover); 
  });
  buttonno.addEventListener('click',()=>{
      formdell.classList.remove(addfrdel);
      overlay.classList.remove(addover); 
      console.log("Kanexxx");
  });
  buttoncancle.addEventListener('click', () => {
      formx.classList.remove(clform);
      tableadd.classList.remove(addform);
      overlay.classList.remove(addover);
  });
},
}
  gxx.init();
