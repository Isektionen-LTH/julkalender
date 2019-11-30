// Init snowfall
snowf.init({
  dom: '#background-video',
	size: 4,
  opacity: 1,
	amount: 40
});

// Create luckor
const luckor = document.getElementById('luckor');
for (let i = 1; i <= 24; i++) {
  const date = new Date(2019, 11, i);
  const open = date < new Date();

  const lucka = `<div class="lucka ${open ? 'open' : 'closed'}">
                  <a ${open ? 'href="./lucka.php?nr=' + i + '"' : ''}>${i}</a>
                </div>`;

  luckor.innerHTML += lucka;
}
