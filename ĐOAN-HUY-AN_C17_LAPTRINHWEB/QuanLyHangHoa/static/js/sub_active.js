



var nutclick = document.querySelectorAll('.sidebar__nav--item')
var pthienra = document.querySelectorAll('.sub__men1')

            for (let i = 0; i < nutclick.length; i++) {
                nutclick[i].addEventListener('click', function(){
         
                    if (this.classList[1] == 'active') {
                        this.classList.remove('active');

                        var ndhienra = nutclick[i].getAttribute('data-block');
                        var pthien = document.getElementById(ndhienra);


                        pthien.classList.toggle('showsub');
                    } else {

                        for (let k = 0; k < nutclick.length; k++) {
                            nutclick[k].classList.remove('active');
                        }

                        this.classList.toggle('active');

                        var ndhienra = nutclick[i].getAttribute('data-block');
                        var pthien = document.getElementById(ndhienra);

                        for (let j = 0; j < pthienra.length; j++) {
	
                            pthienra[j].classList.remove('showsub');

                        }
						
                       
						pthien.classList.toggle('showsub')
 
                    }


                })

            }

