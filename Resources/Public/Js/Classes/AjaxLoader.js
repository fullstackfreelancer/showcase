class AjaxLoader {

    loadProject(projectUid,callback,targetObject){
        let request = new XMLHttpRequest();
        request.open("GET", SHOWCASE.baseurl+'?type=78&tx_showcase_show[project]='+projectUid, true);
        request.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                callback(this.responseText,targetObject);
            }
        }
        request.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        request.send();
    }

    getSpinner(){
        return '<div class="d-flex h-100 w-100 align-items-center text-center"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>'
    }

}
