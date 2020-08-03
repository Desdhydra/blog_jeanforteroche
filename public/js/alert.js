class Alert {

    deletePost() {

        let deleteButtons = document.getElementsByClassName('alert-popup');
        let alertPopup = document.getElementById('alert-deletion');
        let cancelButton = document.getElementById('alert-cancel');
        let alertURL = document.getElementById('alert-url');

        for(let i = 0; i < deleteButtons.length; i++) {
            deleteButtons[i].addEventListener('click', (e) => {
                alertPopup.style.display = 'block';
                let postId = e.target.parentElement.parentElement.getAttribute('id');
                alertURL.setAttribute('href', 'index.php?action=link_deletechapter&post_id=' + postId);
            });
        }
        cancelButton.addEventListener('click', () => alertPopup.style.display = 'none');

    }

}

let alert = new Alert();
window.onload = () => alert.deletePost();