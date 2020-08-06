class Alert {

    deleteElement() {

        let deleteButtons = document.getElementsByClassName('alert-popup');
        let alertPopup = document.getElementById('alert-deletion');
        let cancelButton = document.getElementById('alert-cancel');
        let alertURL = document.getElementById('alert-url');

        for(let i = 0; i < deleteButtons.length; i++) {
            deleteButtons[i].addEventListener('click', (e) => {
                
                alertPopup.style.display = 'block';

                let elementType = e.target.parentElement.parentElement.getAttribute('class');
                let elementId = e.target.parentElement.parentElement.getAttribute('id');

                if(elementType == 'type-post') {
                    alertURL.setAttribute('href', 'index.php?action=link_deletechapter&post_id=' + elementId);
                } else if(elementType == 'type-comment') {
                    alertURL.setAttribute('href', 'index.php?action=link_deletecomment&comment_id=' + elementId);
                }

            });
        }
        cancelButton.addEventListener('click', () => alertPopup.style.display = 'none');

    }

}

let alert = new Alert();
window.onload = () => alert.deleteElement();