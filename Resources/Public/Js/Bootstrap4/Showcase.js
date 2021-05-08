document.addEventListener('DOMContentLoaded',function(){

    const ajaxLoader = new AjaxLoader();
    const listLoaded = function(data,targetObject){
        targetObject.innerHTML = data;
    }

    $('#project-modal').on('show.bs.modal', function (event) {
        let projectUid = event.relatedTarget.getAttribute('data-project');
        ajaxLoader.loadProject(projectUid,listLoaded,event.currentTarget.querySelector('.modal-content'));
    });

    $('#project-modal').on('hide.bs.modal', function (event) {
        event.currentTarget.querySelector('.modal-content').innerHTML = '';
    })

    function resetCategoryLinks(categoryLinks){
        categoryLinks.forEach((item, i) => {
            item.classList.remove('active');
        });
    }

    var posts = document.querySelectorAll('.grid-item');
    imagesLoaded( posts, function() {
        let grid = $('.tx-showcase-plugin .grid').isotope({});
        let categoryLinks = document.querySelectorAll('.showcase-cat-link');
        categoryLinks.forEach((item, i) => {
            item.addEventListener('click',function(e){
                resetCategoryLinks(categoryLinks);
                item.classList.add('active');
                grid.isotope({ filter: e.currentTarget.getAttribute('data-cat') });
                e.preventDefault();
            });
            return false;
        });
    });

});
