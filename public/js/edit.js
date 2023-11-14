function toggleBookmark(button) {
    var icon = button.querySelector('i.bi');
    if (icon.classList.contains('bi-bookmark')) {
        icon.classList.remove('bi-bookmark');
        icon.classList.add('bi-bookmark-fill');
    } else {
        icon.classList.remove('bi-bookmark-fill');
        icon.classList.add('bi-bookmark');
    }
}

/*
var blockNotes = document.getElementById('blockNotes');
var blockComments = document.getElementById('blockComments');

    function showBlock(blockId) {
        //hideAllBlocks();
        if(blockId == "blockNotes"){
            blockNotes.style.display = 'block';
        }
        else if(blockId == "blockComments"){
            blockComments.style.display = 'block';
        }   
    }*/

/*
    var reviewBlock = document.getElementById('review-block');
    var blocs = document.getElementById('blockNotes');

    function showBlock(blockId) {
        blocs.style.display = 'none';
        document.getElementById(blockId).style.display = 'block';
    }

    function hideAllBlocks() {
        console.log(blocs);
        blocs.forEach(function (bloc) {
            console.log(bloc);
            bloc.style.display = 'none';
        });
    }*/

    function showBlock(containerId, buttonId) {
        // Masquer tous les conteneurs
        document.getElementById('blockNotes').style.display="none";
        document.getElementById('blockComments').style.display="none";
    
        // Afficher le conteneur correspondant au bouton cliqué
        document.getElementById(containerId).style.display="block";

        document.getElementById('buttonNotes').classList.replace('btn-dark', 'btn-outline-dark');
        document.getElementById('buttonComments').classList.replace('btn-dark', 'btn-outline-dark');

        document.getElementById(buttonId).classList.replace('btn-outline-dark', 'btn-dark');

       /*if(
            buttonId == 'buttonComments'
        ){
            //document.getElementById('buttonNotes').classList.remove('btn-dark');
            document.getElementById('buttonNotes').classList.replace('btn-dark', 'btn-outline-dark');
            document.getElementById(buttonId).classList.replace('btn-dark');
        } else if(buttonId == 'buttonNotes'){
            document.getElementById('buttonComments').classList.remove('btn-dark');
        }*/
      }

      function changeButtonStyle(button) {
        // Réinitialise le style de tous les boutons
        document.querySelectorAll('.filter-button').forEach(function(btn) {
            btn.style.backgroundColor = '';
            btn.style.color = 'black';
        });
    
        // Change le style du bouton cliqué
        button.style.backgroundColor = '#dadce0';
        button.style.color = 'white';
    
        // Met à jour la valeur de l'input caché avec le réseau sélectionné
        var networkInput = document.getElementById('networkInput');
        networkInput.value = button.getAttribute('data-value');
    }

    function enableFormFields() {
        // Active les champs du formulaire
        document.getElementById('note').removeAttribute('disabled');
        document.getElementById('comment').removeAttribute('disabled');
        document.getElementById('btn-edit-review').removeAttribute('disabled');
    }
    
    function buttonClickHandler(button) {
        changeButtonStyle(button);
        enableFormFields();
    }
    
    // Ajoute un gestionnaire d'événements à chaque bouton
    document.querySelectorAll('.filter-button').forEach(function(btn) {
        btn.addEventListener('click', buttonClickHandler);
    });

    $(document).ready(function(){
        $("#myBtn").click(function(){
            $("#myToast").toast("show");
        });
    });
    


    document.addEventListener('DOMContentLoaded', function () {
        const body = document.body;
        const btnToggle = document.getElementById('change-mode-color');
        const iconChangeModeColor = document.getElementById('icon-change-mode-color');
        const buttons = document.querySelectorAll('.btn');
    
        function changeColorButtons() {
            const isDarkMode = body.getAttribute('data-bs-theme') === 'dark';
    
            buttons.forEach(function (button) {
                if (isDarkMode) {
                    button.classList.replace('btn-outline-dark', 'btn-outline-light');
                    button.classList.replace('btn-dark', 'btn-light');
                    button.classList.replace('filter-button-light', 'filter-button-dark');
                } else {
                    button.classList.replace('btn-outline-light', 'btn-outline-dark');
                    button.classList.replace('btn-light', 'btn-dark');
                    button.classList.replace('filter-button-dark', 'filter-button-light');
                }
            });
        }
    
        btnToggle.addEventListener('click', function () {
            const currentTheme = body.getAttribute('data-bs-theme');
    
            if (currentTheme === 'dark') {
                iconChangeModeColor.classList.toggle('bi-moon');
                iconChangeModeColor.classList.toggle('bi-sun');
                body.setAttribute('data-bs-theme', 'light');
            } else if (currentTheme === 'light') {
                iconChangeModeColor.classList.toggle('bi-sun');
                iconChangeModeColor.classList.toggle('bi-moon');
                body.setAttribute('data-bs-theme', 'dark');
            }
    
            changeColorButtons();
        });
    });
    
    