class MenuDesign {

    menuBurger() {

        let iconBurger = document.getElementById('icon-burger');
        let mainMenu = document.getElementById('main-menu');

        iconBurger.addEventListener('click', () => {
            mainMenu.classList.toggle('menu-burger');
        })
        
    }

}