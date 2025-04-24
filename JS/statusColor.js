var elements = document.querySelectorAll('.order_block_status');

elements.forEach(element => {
    var statusText = element.innerText;
    switch (statusText) {
        case "Новое":
            element.classList.add('status_new');
    
            break;
    
        case "Отменено":
            element.classList.add('status_cancel');
    
            break;
    
        case "Подтверждено":
            element.classList.add('status_conf');
    
            break;

        case "В работе":
            element.classList.add('status_process');
    
            break;
    }
});