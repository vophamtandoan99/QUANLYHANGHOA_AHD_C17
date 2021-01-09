

const goods = {
    init: function () {
        this.clicksidebar('.nav__left--icon', '.body', 'sidebar-expand');
        this.clickshowsub('.sub__sidebar','.sub__men1','showsub');
        this.clickshowuser('.dropdown','.user--menu','showuser');
        
    },
    
    clicksidebar: function (btsn, body, togleclass) {
        let btna = document.querySelector(btsn);
        let bodyac = document.querySelector(body);

        btna.addEventListener('click', () => {
            bodyac.classList.toggle(togleclass);
            console.log("Kane");

        });
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



}
goods.init();


