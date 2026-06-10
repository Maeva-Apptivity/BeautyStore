
document.addEventListener('DOMContentLoaded', function () {
  const items = document.querySelectorAll('.category-item');
  const categoryList = document.querySelector('.category-list');
  if (!categoryList || !items.length) return;

  const panel = document.createElement('div');
  panel.className = 'dropdown category-shared-dropdown';
  panel.innerHTML = '<div class="dropdown-content"></div>';
  categoryList.appendChild(panel);

  const panelContent = panel.querySelector('.dropdown-content');
  let activeItem = null;
  let closeTimer;

  const closeAll = () => {
    items.forEach((item) => item.classList.remove('open'));
    panel.classList.remove('open');
    activeItem = null;
  };

  const openItem = (item) => {
    clearTimeout(closeTimer);
    const dropdown = item.querySelector('.category-source-dropdown');
    const content = dropdown?.querySelector('.dropdown-content');
    if (!content) return;

    if (activeItem !== item) {
      panelContent.innerHTML = content.innerHTML;
    }

    items.forEach((otherItem) => {
      otherItem.classList.toggle('open', otherItem === item);
    });
    panel.classList.add('open');
    activeItem = item;
  };

  const scheduleClose = () => {
    clearTimeout(closeTimer);
    closeTimer = setTimeout(() => {
      const listIsHovered = categoryList?.matches(':hover');
      const panelIsHovered = panel.matches(':hover');

      if (!listIsHovered && !panelIsHovered) {
        closeAll();
      }
    }, 130);
  };

  items.forEach((item) => {
    const dropdown = item.querySelector('.dropdown');
    if (!dropdown) return;
    dropdown.classList.add('category-source-dropdown');

    item.addEventListener('mouseenter', () => openItem(item));
    item.addEventListener('mouseleave', scheduleClose);

    // Optionnel: au clic sur mobile / clavier
    const trigger = item.querySelector('span');
    if (trigger) {
      trigger.addEventListener('click', (e) => {
        e.preventDefault();
        if (activeItem === item) {
          closeAll();
          return;
        }
        openItem(item);
      });
    }
  });

  panel.addEventListener('mouseenter', () => clearTimeout(closeTimer));
  panel.addEventListener('mouseleave', scheduleClose);
});
