document.addEventListener('DOMContentLoaded',function(){

    const ajaxLoader = new AjaxLoader();
    const listLoaded = function(data,targetObject){
        let modalHeader = '<div class="modal-header"><h5 class="modal-title"></h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>';
        let modalBody = '<div class="modal-body"><div class="container">'+data+'</div></div>';
        targetObject.innerHTML = modalHeader + modalBody;
    }
    var projectModal = document.getElementById('project-modal')

    projectModal.addEventListener('show.bs.modal', event => {
        let projectUid = event.relatedTarget.getAttribute('data-project');
        ajaxLoader.loadProject(projectUid,listLoaded,event.currentTarget.querySelector('.modal-content'));
        event.currentTarget.querySelector('.modal-content').innerHTML = ajaxLoader.getSpinner()
    })

    projectModal.addEventListener('hide.bs.modal', event => {
        event.currentTarget.querySelector('.modal-content').innerHTML = '';
    })

    function resetCategoryLinks(categoryLinks){
        categoryLinks.forEach((item, i) => {
            item.classList.remove('active');
        });
    }

    var posts = document.querySelectorAll('.grid-item');
    imagesLoaded( posts, function() {
        /*
        let grid = $('.tx-showcase-plugin .grid').isotope({});
        */

        var elem = document.querySelector('.tx-showcase-plugin > .grid');
        var iso = new Isotope( elem, {
          // options
          itemSelector: '.grid-item',
          layoutMode: 'fitRows'
        });

        let categoryLinks = document.querySelectorAll('.showcase-cat-link');
        categoryLinks.forEach((item, i) => {
            item.addEventListener('click',function(e){
                resetCategoryLinks(categoryLinks);
                item.classList.add('active');
                iso.arrange({ filter: e.currentTarget.getAttribute('data-cat') });
                e.preventDefault();
            });
            return false;
        });

    });

});
