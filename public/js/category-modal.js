
        const closeModal = document.getElementsByClassName('closeBtn')[0];
        const modal = document.getElementById('simpleModal');

        

        function openmodal(id) {
            var form = document.getElementById('deleteCategoryForm')
            form.action = '/admin/categories/'  + id
            console.log('deleting', form)
            modal.style.display = 'block';
        }

        closeModal.addEventListener('click', close);

        window.addEventListener('click', closeOutside);

        function close() {
            modal.style.display= "none";
        }

        function closeOutside(e) {
            if(e.target == modal){
                modal.style.display = "none";
            }
        }