document.addEventListener( 'DOMContentLoaded', function () { //console.log('init');
	//console.log(globalData);

	window.scrollTo({ top: 0, behavior: 'smooth' }); //On load the Page automatically scroll to top

	/*Check Display Screen breakpoint*/
	const cssElem = window.getComputedStyle( document.getElementById("breakpoint_check"), null );
	let breakpointCheck = cssElem.getPropertyValue('width'); //console.log(breakpointCheck); //possible values: 100%|1400px|1199px|991px|767px|575px

	if( breakpointCheck === '100%' ){
		//console.log('Full screen');
	}else if( breakpointCheck === '1400px' ){
		//console.log('screen 1400px and up');
	}else if( breakpointCheck === '1199px' ){
		//console.log('screen 1199px and less');
	}else if( breakpointCheck === '767px' ){
		//console.log('screen 767px and less');
	}else if( breakpointCheck === '575px' ){
		//console.log('screen 575px and less');
	}else{ //console.log('do something else...');
	}
	/*__/Check Display Screen breakpoint*/

	/*Bootstrap 5x Popover initialization*/
	let popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
	let popoverList = popoverTriggerList.map(function (popoverTriggerEl){ return new bootstrap.Popover(popoverTriggerEl) });
	/*__/Bootstrap 5x Popover initialization*/
	/*Bootstrap 5x Tooltip initialization*/
	let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
	let tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl){ return new bootstrap.Tooltip(tooltipTriggerEl) });
	/*__/Bootstrap 5x Tooltip initialization*/

	/*Smooth scroll by Section*/
	const smothScrollElems = document.querySelectorAll('a[href^="#"]:not(a[href="#"])');
	const bodyContent = document.body;

	smothScrollElems.forEach(
		(item,index,array) => {
			item.addEventListener('click', (event) => {
				let targetBlockToScroll,
					nameIdSection;

				event.preventDefault();
				if( event.target.matches('img') ){
					nameIdSection = event.target.parentElement.getAttribute('href');
				}else{
					nameIdSection = event.target.getAttribute('href');
				}
				console.log(nameIdSection);
				nameIdSection = nameIdSection.substr(1);
				targetBlockToScroll = document.getElementById( nameIdSection );
				targetBlockToScroll.scrollIntoView({
					//block: "end",
					behavior: "smooth"
				});
			});
		}
	);
	/*__/Smooth scroll by Section*/

	/*___________________________________________#BANNER-SECTION*/
	/*Disable standard behavior for a link for a decorative menu item*/
	const bannerSection = document.getElementById('banner');
	let navItemDecor = bannerSection.querySelector('.navbar .navbar-nav li.nav-item-decor .nav-link');
	navItemDecor.addEventListener("click", function(event){
		event.preventDefault();
	});
	/*__/Disable standard behavior for a link for a decorative menu item*/

	let aboutSection = document.getElementById('about');
	let headerNavbar = document.getElementById('header_navbar');
	let imgLogoHeader = headerNavbar.querySelector('.navbar-brand > img');

	/**
	 * Is element within visible region of a scrollable container
	 * @param {HTMLElement} el - element to test
	 * @returns {boolean} true if within visible region, otherwise false
	 */
	function isScrolledIntoView(el) {
		let rect = el.getBoundingClientRect();
		//console.log(rect.top); console.log(rect.bottom);
		if( rect.top === 75 || rect.top < 75 ){ //console.log('Change Nav Bar');
			imgLogoHeader.classList.add('img-logo-scrolled');
			headerNavbar.classList.add('navbar--scrolled');
			//imgLogoHeader.setAttribute('src', 'http://dotebo.name/wp-content/uploads/2024/02/logo-svg2.svg');
		}else{ //console.log('Back Old Nav Bar');
			imgLogoHeader.classList.remove('img-logo-scrolled');
			headerNavbar.classList.remove('navbar--scrolled');
			//imgLogoHeader.setAttribute('src', 'http://dotebo.name/wp-content/uploads/2024/02/logo-svg.svg');
		}
		return (rect.top >= 0) && (rect.bottom <= window.innerHeight);
	}
	window.addEventListener("scroll", function(){
		//console.log(this.oldScroll > this.scrollY);
		//if( this.oldScroll > this.scrollY ){ console.log('to top'); }else{ console.log('to down'); }
		this.oldScroll = this.scrollY;
		isScrolledIntoView(aboutSection);
	});
	/*_________________________________________/#BANNER-SECTION*/

	/*___________________________________________#TESTIMONIALS-SECTION*/
	/*Testimonials Slider*/
	let testimonialSliderDOM = document.getElementById('__testimonials_slider');
	const testimonialSliderSettings = {
		isDisable: ( globalData.testimonialSliderDisable === '1') ? true : false,
		pagination: ( globalData.isPaginationSetting === '1') ? true : false,
		interval: ( globalData.testimonialsSliderSpeed ) ? Number( (globalData.testimonialsSliderSpeed * 1000) )  : 4000,
		autoplay: ( globalData.isAutoplaySetting === '1') ? true : false,
	};
	if( testimonialSliderDOM ){
		let testimonialSlider = new Splide( testimonialSliderDOM,{ //All settings: https://splidejs.com/guides/options
			destroy: testimonialSliderSettings.isDisable,
			type: 'loop', /*'slide'|'loop'|'fade'*/
			pagination: testimonialSliderSettings.pagination,
			autoplay: testimonialSliderSettings.autoplay,
			speed: 3000,
			omitEnd: true,
			interval: testimonialSliderSettings.interval, /*testimonialSliderSettings.interval*/
			arrows: false,
			breakpoints: {
				767: {
					type: 'loop',
					drag: true,
				}
			},
		} ); testimonialSlider.mount();
	}
	/*__/Testimonials Slider*/

	if( testimonialSliderSettings.isDisable ){ //console.log('Ebattttt');
		let testimonialSlidesCollection = testimonialSliderDOM.querySelectorAll('ul.splide__list > li.splide__slide');
		console.log(testimonialSlidesCollection);

		testimonialSlidesCollection.forEach(
			(item,index,collection) => {
				if( index !== 0 ){
					item.classList.add('slide-disabled');
				}

			}
		);
	}
	/*_________________________________________/#TESTIMONIALS-SECTION*/

	/*_________________________________________#TECHNOLOGIES-SECTION*/
	let technologiesSliderDOM = document.getElementById('__technologies_slider');
	if( technologiesSliderDOM ){
		let technologiesSlider = new Splide( technologiesSliderDOM,{ //All settings: https://splidejs.com/guides/options
			type: 'loop', /*'slide'|'loop'|'fade'*/
			perPage: 4,
			focus  : 0,
			omitEnd: true,
			pagination: false,
			autoplay: true,
			speed: 2000,
			interval: 2000,
			arrows: false,
			breakpoints: {
				575: {
					perPage: 3,
				},
				399: {
					perPage: 2,
				},
			},
		} ); technologiesSlider.mount();
	}

	/*_________________________________________/#TECHNOLOGIES-SECTION*/

});

new WOW().init(); //initial the WOW animation library
