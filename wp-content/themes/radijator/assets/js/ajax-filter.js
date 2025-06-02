document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('ajax-filter-form');
  if (!form) return;

  form.addEventListener('submit', function (e) {
    e.preventDefault();


      const result =  document.querySelector('.products_filter__result');
      result.style.display = 'block';

    const data = new FormData(form);

    if(!data) {
      return console.error('No data to send in AJAX request.');
    };

    fetch(ajaxFilter.ajax_url, {
      method: 'POST',
      body: data
    })
    .then(res => res.text())
    .then(html => {
      document.querySelector('.products_filter__result').innerHTML = html;
      console.log('AJAX request successful, content updated.');
    })
    .catch(err => console.error('AJAX error:', err));
  });
});
