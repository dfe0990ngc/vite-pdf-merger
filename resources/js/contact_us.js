import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const myDropzone = new Dropzone("#multiFilesUploader", {
    url: "/contact-us-upload", // Your server endpoint for handling file uploads
    acceptedFiles: ".pdf,.doc,.docx,.png,.jpg,.jpeg,.webp,.jfif,.gif,.tiff,.mp4,.mpeg4,.bmp",
    addRemoveLinks: true, // Show remove links for uploaded files
    dictRemoveFile: "Remove", // Customize the remove link text
    dictDefaultMessage: "Drag and drop PDF files here", // Customize the default message,
    previewsContainer: ".dropzone",
    init: function(){
        let myDropzone = this;

        fetch('/contact-us-get-files-from-session')
        .then(response => response.json())
        .then(data => {
            const kl = Object.keys(data);

            if(kl.length > 0){
                kl.map(item => {
                    myDropzone.displayExistingFile({
                        name: data[item].name,
                        size: data[item].size
                    }, '/images/img-file-bg.webp');
                });
            }
        });
    },
    removedfile: function(file){
        file.previewElement.remove();
        let fl = file?.upload?.filename;
        if(fl === undefined)
            fl = file.name;

        fetch('/contact-us-remove-file?file='+fl).then(response => response.json()).then(data => {});
    },
    renameFile: function (file) {
        return file.lastModified+'_'+file.name;
    },
    success: function(file, response){
        const spans = document.querySelectorAll('[data-dz-name]');
        for(let x=0;x<spans.length;x++){
            if(spans[x].textContent === file.name){
                spans[x].textContent = file?.upload?.filename;
                break;
            }
        }
    }
});

document.addEventListener('DOMContentLoaded', () => {
    const frmContactUs = document.querySelector('#frm-contact-us');
    const btnSendMessage = document.querySelector('#btn-submit-message');
    const msgPrompt = document.querySelector('#msg-promt');

    const toggleSendMessageAnimate = (flg_disable) => {
        btnSendMessage.classList.toggle('animate-spin');

        if(flg_disable)
            btnSendMessage.setAttribute('disabled',flg_disable);
        else
            btnSendMessage.removeAttribute('disabled');
    }

    btnSendMessage.addEventListener('click',(e) => {
        e.preventDefault();

        toggleSendMessageAnimate(true);
        const data = new FormData(frmContactUs);

        frmContactUs.submit();
        // fetch('/contact-us-add',{
        //     method:'POST',
        //     body:data
        // }).then(response => response.json())
        // .then(data => {
        //     toggleSendMessageAnimate(false);
        //     if(data?.errors){
        //         msgPrompt.innerHTML = 'There is an error sending feedback! If urgent, please use this email instead: <a href="mailto:pdfmergerauthor@gmail.com" class="font-bold">pdfmergerauthor@gmail.com</a>';
        //     }else
        //         msgPrompt.innerHTML = `<span class="text-green-600">${data.message}</span>`;
        // }).catch(error => {
        //     msgPrompt.innerHTML = 'There is an issue in our server! If urgent, please use this email instead: <a href="mailto:pdfmergerauthor@gmail.com" class="font-bold">pdfmergerauthor@gmail.com</a>';
        //     toggleSendMessageAnimate(false);
        // });
    });
});
