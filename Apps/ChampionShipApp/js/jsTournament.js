
function multiButton(n){
    saveChoise(n);
    nextSlide();
}

let choises = [];
function saveChoise(n){
    let idBlock = document.getElementById('imgIdBlock'+n).value;
    choises.push(idBlock);

}



/* Устанавливаем стартовый индекс слайда по умолчанию: */
let slideIndex = 1;
/* Вызываем функцию, которая реализована ниже: */
showSlides(slideIndex);

/* Увеличиваем индекс на 1 — показываем следующий слайд: */
function nextSlide() {
    showSlides(slideIndex += 1);    
}


/* Устанавливаем текущий слайд: */
function currentSlide(n) {
    showSlides(slideIndex = n);
}

/* Функция перелистывания: */
function showSlides(n) {
    /* Обращаемся к элементам с названием класса "item", то есть к картинкам: */
    let slides = document.getElementsByClassName("challengerPairs");

    /* Проверяем количество слайдов: */
    if (n > slides.length) {    
        
        choises = JSON.stringify(choises);

        sendJSON(choises);





        // alert(choises);
        // window.location = "process/getPost.php"; 
        // localStorage.setItem('choises', choises1);
        // localStorage.removeItem('choises');
        // window.location = "../index.php"; 
    }
    if (n < 1) {
        slideIndex = slides.length
    }

    /* Проходим по каждому слайду в цикле for: */
    for (let slide of slides) {
        slide.style.display = "none";
    }
    /* Делаем элемент блочным: */
    slides[slideIndex - 1].style.display = "block";
}



// эта функция сработает при нажатии на кнопку
function sendJSON(dataString) {
    let result = document.getElementById('result');

    // создаём новый экземпляр запроса XHR
    let xhr = new XMLHttpRequest();
    
    // адрес, куда мы отправим нашу JSON-строку
    let url = "process/getPost.php";
    
    // открываем соединение
    xhr.open("POST", url, true);
    
    // устанавливаем заголовок — выбираем тип контента, который отправится на сервер, в нашем случае мы явно пишем, что это JSON
    xhr.setRequestHeader("Content-Type", "application/json");

    result.innerHTML =  "Идёт сохранение в БазуДанных js" ;
    
    xhr.onreadystatechange = function () {
  
        // если запрос принят и сервер ответил, что всё в порядке 
        if (xhr.readyState === 4 && xhr.status === 200) {
            
     
            // выводим то, что ответил нам сервер — так мы убедимся, что данные он получил правильно
        result.innerHTML = this.responseText;
    
        }
    
    };
    // преобразуем наши данные JSON в строку
    var data = dataString;
    
    // когда всё готово, отправляем JSON на сервер
    xhr.send(data);
    }
    

