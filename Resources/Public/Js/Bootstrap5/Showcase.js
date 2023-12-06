document.addEventListener('DOMContentLoaded',function(){

    const ajaxLoader = new AjaxLoader();
    const listLoaded = function(data,targetObject){
        targetObject.innerHTML = data;
    }
    var projectModal = document.getElementById('project-modal')

    projectModal.addEventListener('show.bs.modal', event => {
        let projectUid = event.relatedTarget.getAttribute('data-project');
        ajaxLoader.loadProject(projectUid,listLoaded,event.currentTarget.querySelector('.modal-content'));
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
