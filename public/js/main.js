class Application {

    initialize() {

        let alert = new Alert();
        alert.deleteElement();

        let menuDesign = new MenuDesign();
        menuDesign.menuBurger();

    }

}

let application = new Application();
window.onload = () => application.initialize();