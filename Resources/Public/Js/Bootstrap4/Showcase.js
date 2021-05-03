document.addEventListener('DOMContentLoaded',function(){

    const ajaxLoader = new AjaxLoader();
    const listLoaded = function(data,targetObject){
        targetObject.innerHTML = data;
    }

    $('#project-modal').on('show.bs.modal', function (event) {
        let projectUid = event.relatedTarget.getAttribute('data-project');
        ajaxLoader.loadProject(projectUid,listLoaded,event.currentTarget.querySelector('.modal-content'));
    })

});
