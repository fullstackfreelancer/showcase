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

    let grid = $('.tx-showcase-list .grid').isotope({

    });

    document.querySelectorAll('.showcase-cat-link').forEach((item, i) => {
        item.addEventListener('click',function(e){
            grid.isotope({ filter: e.currentTarget.getAttribute('data-cat') });
            e.preventDefault();
        });
        return false;
    });

});
