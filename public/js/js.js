$(document).ready( () => {

    $('.divImg').click( (element) => {

        $img = element.target;

        renderModal($img.src);


    });
    
}); 

function renderModal (imgLink) {

    if ($('.modal').length !== 0)  {
        return;
    }

    let $modal = $('<div/>', {
        class: 'modal'
    });
    $modal.appendTo('body');

    /*let $divBackground = $('<div/>', {
        class: 'backModal'
    });
    $divBackground.appendTo($modal);
*/
    let $divForImage = $('<div/>', {
        class: 'imgModal'
    });
    $divForImage.appendTo($modal);



    let $img = $('<img/>', {
        src: imgLink,
        alt: 'Big Image',
        class: 'picModal'
    });


    $img.appendTo($divForImage);

    let $closeSign = $('<span/>', {
        class: 'closeModal'

    });
    $closeSign.append('&times;');

    $closeSign.appendTo($divForImage);
    $('.closeModal').click( (el) => {
        $modal.remove();
    });

}