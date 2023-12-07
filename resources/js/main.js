const navbar = document.querySelector('.navbar')
const navItems = document.querySelectorAll('.nav-item');
const navbarToggler = document.querySelector('.navbar-toggler');
const maxWidthForScript = 991.11;



for (const navItem of navItems) {
  navItem.addEventListener('click', () => {
    if (window.innerWidth <= maxWidthForScript) {
      navbarToggler.click();
    }
  });
}
window.addEventListener('scroll', function() {
    if (window.scrollY >= 100) {
      navbar.classList.add('nav-scroll');
    } else {
      navbar.classList.remove('nav-scroll');
    }
});

const passType = document.querySelector('#typ-karnetu');
const cardContainer = document.querySelector('.card_container');
let existingCard = null;

const passTypeData = () => {
  if (!existingCard) {
    existingCard = document.createElement('div');
    existingCard.classList.add('card');
    cardContainer.appendChild(existingCard);
  }

  let passName, passPrice, passDuration, additionalInfo;

  if (passType.value === "1") {
    passName = 'Karnet OPEN';
    passPrice = '149 pln';
    passDuration = '30 dni';
    additionalInfo = {
      entryFee: '0 pln',
      unlimitedAccess: 'TAK',
      groupClassesIncluded: 'TAK',
      freezeOption: 'TAK',
      relaxationZoneAccess: 'TAK',
    };
  }  else if (passType.value === "2") {
    passName = 'Darmowy tydzień - wypróbuj naszą siłownię';
    passPrice = 'Darmowy';
    passDuration = '7 dni';
    additionalInfo = {
      entryFee: '0 pln',
      unlimitedAccess: 'Dostęp od 06:00 - 22:00',
      groupClassesIncluded: 'TAK',
      freezeOption: 'NIE',
      relaxationZoneAccess: 'NIE',
    };
  }

  const data = `
  <div class="card-body">
  <h5 class="card-title">Informacje o karnecie</h5>
  <p class="card-text pass_name">Nazwa karnetu: ${passName}</p>
  <p class="card-text pass_price">Cena: ${passPrice}</p>
  <p class="card-text pass_duration">Czas trwania: ${passDuration}</p>
  <div class="card-text pass_info">Dodatkowe informacje:
    <div class="pass-info">
      <div class="pass-inner-info">
        <span class="pass-inner-info-text">Opłata wpisowa:</span>
        <span class="pass-inner-info-price">${additionalInfo.entryFee}</span>
      </div>
      <div class="pass-inner-info">
        <span class="pass-inner-info-text">Nielimitowany dostęp 24H:</span>
        <span class="pass-inner-info-price">${additionalInfo.unlimitedAccess}</span>
      </div>
      <div class="pass-inner-info">
        <span class="pass-inner-info-text">Zajęcia grupowe w cenie:</span>
        <span class="pass-inner-info-price">${additionalInfo.groupClassesIncluded}</span>
      </div>
      <div class="pass-inner-info">
        <span class="pass-inner-info-text">Możliwość zamrożenia karnetu:</span>
        <span class="pass-inner-info-price">${additionalInfo.freezeOption}</span>
      </div>
      <div class="pass-inner-info">
        <span class="pass-inner-info-text">Dostęp do strefy relaksu:</span>
        <span class="pass-inner-info-price">${additionalInfo.relaxationZoneAccess}</span>
      </div>
    </div>
  </div>
</div>
  `;

  existingCard.innerHTML = data;
};

document.addEventListener('input', passTypeData);
