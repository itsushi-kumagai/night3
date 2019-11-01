        //const openModal = document.querySelectorAll('.modalBtn');
        const closeModal = document.getElementsByClassName('closeBtn')[0];
        const modal = document.getElementById('simpleModal');

        // openModal.forEach(function(e) {
        //     e.addEventListener('click', open);
        //     }

        function openmodal(id) {
            var form = document.getElementById('deleteTagForm')
            form.action = '/admin/tags/'  + id
            console.log('deleting', form)
            modal.style.display = 'block';
            //$('#simpleModal').modal('show');
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

        // window.addEventListener('click', deleteTag);

        // function deleteTag(id) {
        //     form.action = '/tag/' + id
        // }