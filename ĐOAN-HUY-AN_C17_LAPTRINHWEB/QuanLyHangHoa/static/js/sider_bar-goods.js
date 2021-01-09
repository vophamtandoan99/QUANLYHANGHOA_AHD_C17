const goods = {
  init: function () {
    this.clicksidebar('.nav__left--icon1', '.body', 'sidebar-expand');
    this.clickshowuser('.dropdown1', '.user--menu', 'showuser');
    this.clickshowsub('.sub__ac', '.sub__men1', 'showsub');
  },
  clicksidebar: function (btsn, body, togleclass) {
    let btna = document.querySelector(btsn);
    let bodyac = document.querySelector(body);

    btna.addEventListener('click', () => {
      bodyac.classList.toggle(togleclass);
      console.log("Kane");

    });
  },
  clickshowuser: function (user, usermenu, show) {
    let btnuser = document.querySelector(user);
    let userlist = document.querySelector(usermenu);


    btnuser.addEventListener('click', () => {
      userlist.classList.toggle(show);

    });
  },
  clickshowsub: function (btnlink, sub, showsubx) {
    let buttonlink = document.querySelector(btnlink);
    let submenu = document.querySelector(sub);

    buttonlink.addEventListener('click', () => {
      submenu.classList.toggle(showsubx);
    });
  },
}
goods.init();
