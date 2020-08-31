class MenuDesign {

    menuBurger() {

        let iconBurger = document.getElementById('icon-burger');
        let mainMenu = document.getElementById('main-menu');
        let header = document.querySelector('header');

        iconBurger.addEventListener('click', () => {
            mainMenu.classList.toggle('menu-burger');
            header.classList.toggle('header-burger');
        })
        
    }

}