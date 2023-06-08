import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

const btns = document.querySelectorAll('.ms_delete_btn');
if (btns.length > 0) {

    btns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const deleteModal = new bootstrap.Modal(
                document.getElementById('delete-modal')
            );
            const title = btn.getAttribute("element-title");
            document.getElementById("modal-element-title").innerText = capitalizeFirstLetter(title);
            deleteModal.show();
            document.querySelector(".ms_btn").addEventListener("click", function () {
                btn.parentElement.submit();
            })
        })
    });
}