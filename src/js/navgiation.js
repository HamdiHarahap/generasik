const menu = document.querySelector('.menu')
const close = document.querySelector('.close')
const list = document.querySelector('.list-menu')

menu.addEventListener('click', function () {
	list.classList.remove('hidden')
	list.classList.add('flex')
	menu.classList.add('hidden')
	close.classList.remove('hidden')
})

close.addEventListener('click', function () {
	list.classList.remove('flex')
	list.classList.add('hidden')
	close.classList.add('hidden')
	menu.classList.remove('hidden')
})
