var splide = new Splide('.splide', {
	rewind: true,
	pagination: false,
})

splide.mount()

window.addEventListener('scroll', function () {
	const navbar = document.querySelector('.nav')
	if (window.scrollY > 250) {
		navbar.classList.add('navbar-scrolled')
		navbar.classList.remove('white-text')
		navbar.classList.add('black-text')
		navbar.classList.add('b-border')
	} else {
		navbar.classList.remove('navbar-scrolled')
		navbar.classList.remove('black-text')
		navbar.classList.remove('b-border')
		navbar.classList.add('white-text')
	}
})
