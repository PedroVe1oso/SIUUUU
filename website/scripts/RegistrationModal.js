//Registration modal

const openRegisterModal = document.getElementById('openRegisterModal');
const modalContainer = document.getElementById('modalContainer');
const closeRegisterModal1 = document.getElementById('closeRegisterModal1');
const closeRegisterModal2 = document.getElementById('closeRegisterModal2');

openRegisterModal.addEventListener('click', () => {
   modalContainer.classList.add('show');
});

closeRegisterModal1.addEventListener('click', () => {
    modalContainer.classList.remove('show');
});

closeRegisterModal2.addEventListener('click', () => {
    modalContainer.classList.remove('show');
});
