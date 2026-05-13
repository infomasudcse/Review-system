/* globals Chart:false, feather:false */

(function () {
  'use strict'

  feather.replace({ 'aria-hidden': 'true' })

  const input = document.querySelector("#phone");
  var iti = null;
  var selectedCountryData = null;
  if(input) {
	iti = intlTelInput(input, {
		initialCountry: "auto",

		placeholderNumberType: "MOBILE",
		geoIpLookup: function(success, failure) {
			fetch("https://ipapi.co/json")
				.then(res => res.json())
				.then(data => success(data.country_code))
				.catch(() => success("gb")); // Default to UK
		},
		loadUtils: () => Promise.resolve(),
		hiddenInput: () => ({
			phone: "full_phone",
			country : "country_code"
		})
	});
	input.addEventListener('blur', (e) => {
		if(iti.isValidNumber()){
				document.querySelector("#phone-warning").innerHTML = '';
		} else {
				document.querySelector("#phone-warning").innerHTML = '<em class="mt-2 mb-2 text-danger">Not valid</em>';
		}
	})

	// input.addEventListener("countrychange", () => {
  	// 	selectedCountryData = iti.getSelectedCountryData()
	// 	console.log(selectedCountryData);
	// 	document.getElementById('country_code').value = selectedCountryData.iso2;
	// });

	const currentCountryCode = input.getAttribute('data-country-code');

	if (currentCountryCode) {
		iti.setCountry(currentCountryCode);
	}
  }

	document.addEventListener('DOMContentLoaded', function () {
		const showUpForm = document.getElementById('showUploadForm');
			if(showUpForm){
				showUpForm.addEventListener('click', function () {
					console.log('ciao');
					document.getElementById('uploadFormWrapper').classList.toggle('open');
				})
			}
	});



//   document.addEventListener('DOMContentLoaded', () => {
//     const select = document.getElementById('country-select');
//     const country_name = document.getElementById('country_name');
//     const country_code  = document.getElementById('country_code');
//     if (!select || !hiddenValue || !hiddenText) return;

//     const syncHiddenFields = () => {
//       const option = select.options[select.selectedIndex];
//       country_name.value = select.value || '';
//       country_code.value  = option ? (option.text || '') : '';
//     };

//     // Update when user changes the selection
//     select.addEventListener('change', syncHiddenFields);

//     // Optional: set initial values if a default option is already selected
//     syncHiddenFields();
//   });



})()
