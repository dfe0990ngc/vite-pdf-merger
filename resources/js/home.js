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

        fetch('/remove-file?file='+file.name).then(response => response.json())
        .then(data => {
            console.log('File has been removed successfully!');
        });
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

        animateMergeBtn(true);
        if(myDropzone.files.length > 1 || fromSessionFiles.length > 1){
            const mergeLink = document.createElement('a');

            mergeLink.setAttribute('href','/merge-pdf');
            mergeLink.setAttribute('class','hidden');
            mergeLink.setAttribute('target','_blank');
            mergeLink.setAttribute('download','merged-files.pdf');

            document.body.appendChild(mergeLink);

            mergeLink.click();
            mergeLink.remove();

            setTimeout(() => {
                animateMergeBtn(false);
            }, 1300);
        }else{
            animateMergeBtn(false);
            alert('Please upload 2 or more pdf files to be merged');
        }
    });
});
