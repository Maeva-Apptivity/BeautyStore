
document.addEventListener('DOMContentLoaded', function () {
  const items = document.querySelectorAll('.category-item');

  items.forEach((item) => {
    const dropdown = item.querySelector('.dropdown');
    if (!dropdown) return;

    let closeTimer;

    const open = () => {
      clearTimeout(closeTimer);
      item.classList.add('open');
    };

    const scheduleClose = () => {
      clearTimeout(closeTimer);
      // petite latence pour laisser le temps de traverser le “trou”
      closeTimer = setTimeout(() => {
        // on ferme seulement si ni le <li> ni le dropdown ne sont sous la souris
        if (!item.matches(':hover') && !dropdown.matches(':hover')) {
          item.classList.remove('open');
        }
      }, 130); // ajuste 100–180ms si besoin
    };

    // Garde ouvert quand on passe du <li> vers le dropdown et inversement
    item.addEventListener('mouseenter', open);
    item.addEventListener('mouseleave', scheduleClose);
    dropdown.addEventListener('mouseenter', open);
    dropdown.addEventListener('mouseleave', scheduleClose);

    // Optionnel: au clic sur mobile / clavier
    const trigger = item.querySelector('span');
    if (trigger) {
      trigger.addEventListener('click', (e) => {
        e.preventDefault();
        item.classList.toggle('open');
      });
    }
  });
});

