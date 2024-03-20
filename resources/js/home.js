import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const myDropzone = new Dropzone("#pdfUploader", {
    url: "/upload", // Your server endpoint for handling file uploads
    acceptedFiles: ".pdf", // Only allow PDF files
    addRemoveLinks: true, // Show remove links for uploaded files
    dictRemoveFile: "Remove", // Customize the remove link text
    dictDefaultMessage: "Drag and drop PDF files here", // Customize the default message,
    previewsContainer: ".dropzone",
    init: function(){
        let myDropzone = this;

        fetch('/get-files-from-session')
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
        
        fetch('/remove-file?file='+fl).then(response => response.json()).then(data => {});
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

document.addEventListener('DOMContentLoaded', (e) => {
    const btnMerge = document.querySelector('#btn-merge-pdf');

    const animateMergeBtn = (flg_enable) => {
        // Toggle Animate and enable/disable submit button
        btnMerge.classList.toggle('animate-spin');
        btnMerge.disabled = flg_enable;
    }

    btnMerge.addEventListener('click', () => {

        const fromSessionFiles = myDropzone.previewsContainer.querySelectorAll('.dz-preview.dz-image-preview');
        const fileLength = myDropzone.files.length + fromSessionFiles.length;

        animateMergeBtn(true);
        if(fileLength > 1){
            fetch('/merge-pdf').then( res => res.blob() ).then( blob => {

                var downloadLink = document.createElement('a');
                downloadLink.target = '_blank';

                // Create file name prefix using date
                const fnp = new Date();
                const fileName = fnp.valueOf()+'-'+fnp.toJSON().slice(0,10);

                downloadLink.download = fileName+'-merged-files.pdf';

                // create an object URL from the Blob
                var URL = window.URL || window.webkitURL;
                var downloadUrl = URL.createObjectURL(blob);

                // set object URL as the anchor's href
                downloadLink.href = downloadUrl;

                // append the anchor to document body
                document.body.append(downloadLink);

                // fire a click event on the anchor
                downloadLink.click();

                // Remove the anchor
                downloadLink.remove();

                animateMergeBtn(false);
            });
        }else{
            animateMergeBtn(false);
            alert('Please upload 2 or more pdf files to be merged');
        }
    });
});
