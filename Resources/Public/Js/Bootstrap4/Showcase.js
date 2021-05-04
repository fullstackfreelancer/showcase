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

    let grid = $('.tx-showcase-projects .grid').isotope({
    
    });

    // bind filter button click
    document.querySelectorAll('.showcase-cat-link').forEach((item, i) => {
        console.log("FUCK");
        //var filterValue = $( this ).attr('data-cat');
        // use filterFn if matches value
        //filterValue = filterFns[ filterValue ] || filterValue;
        item.addEventListener('click',function(e){
            grid.isotope({ filter: e.currentTarget.getAttribute('data-cat') });
            e.preventDefault();
        });
        //$('.button').removeClass("active");
        //$(this).addClass("active");
        return false;
    });

});
