document.addEventListener('DOMContentLoaded',function(){

    let extensionFeedbackButtons = document.querySelectorAll('.extension-feedback-modal-button');
    let openExtensionFeedbackModal = function(){
        require([
           'jquery',
           'TYPO3/CMS/Backend/Modal'
           ], function ($, Modal) {

              var configuration = {
                 type: Modal.types.ajax,
                 title: 'Extension Support',
                 content: 'https://simonkoehler.com/contact',
                 size: Modal.sizes.large,
                 callback: function(currentModal) {
                    currentModal.find('.t3js-modal-body').addClass('bg-dark');
                 }
              };
              Modal.advanced(configuration);

           });
    }

    if(extensionFeedbackButtons){
        extensionFeedbackButtons.forEach((btn, i) => {
            btn.addEventListener('click',function(e){
                openExtensionFeedbackModal();
            });
        });
    }

});
