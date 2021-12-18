jQuery(document).ready(function($) {

  $('.wp-block-yoast-faq-block .schema-faq-question').on('click', function() {

    var schema_faq_question = $('.wp-block-yoast-faq-block .schema-faq-question');
    schema_faq_question.removeClass('faq-q-open');
    schema_faq_question.siblings('.schema-faq-answer').removeClass('faq-a-open').slideUp('fast');

    if ($(this).siblings('.schema-faq-answer').is(':visible')) {

      $(this).removeClass('faq-q-open');
      $(this).siblings('.schema-faq-answer').removeClass('faq-a-open').slideUp('fast');

    } else {

      $(this).addClass('faq-q-open');
      $(this).siblings('.schema-faq-answer').addClass('faq-a-open').slideDown('fast');

    }

  })

});
