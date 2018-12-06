var $form = $('.card__form');
$form.submit(function (event) {
  event.preventDefault();

  $form.addClass('form-submitted');

  setTimeout(function () {
    $form.addClass('form-done');

    setTimeout(function () {
      $form.
      removeClass('form-submitted').
      removeClass('form-done');
    }, 250);
  }, 2650);
});