new autoComplete({
	data: {                              // Data src [Array, Function, Async] | (REQUIRED)
		src: async () => {
			// API key token
			let token = "e666f398-c983-4bde-8f14-e3fec900592a";
			// User search query
			let query = document.querySelector("#autoComplete").value;
			// Fetch External Data Source
			let source = await fetch(`https://geocode-maps.yandex.ru/1.x/?apikey=${token}&geocode=${query}&format=json`);
			// Format data into JSON
			let data = await source.json();
			// Return Fetched data
			const keyMap = data.response.GeoObjectCollection.featureMember;

			let collectionLocations = [];
			console.log(keyMap);
			// for (let i = 0; i <keyMap.length; i++ ) {
			// 	collectionLocations.push(keyMap[i].GeoObject.name + ', ' + keyMap[i].GeoObject.description);
			// }

			for(key in keyMap) {
				if(keyMap.hasOwnProperty(key)) {
					collectionLocations[key] = keyMap[key].GeoObject;
				}
			}
			return collectionLocations;

		},
		key: ['name'],
		cache: false
	},
	// query: {                               // Query Interceptor               | (Optional)
	//     manipulate: (query) => {
	//         return query.replace("pizza", "burger");
	//     }
	// },
	sort: (a, b) => {                    // Sort rendered results ascendingly | (Optional)
		if (a.match < b.match) return -1;
		if (a.match > b.match) return 1;
		return 0;
	},
	placeHolder: "",     // Place Holder text                 | (Optional)
	selector: "#autoComplete",           // Input field selector              | (Optional)
	threshold: 3,                        // Min. Chars length to start Engine | (Optional)
	debounce: 300,                       // Post duration for engine to start | (Optional)
	searchEngine: "strict",              // Search Engine type/mode           | (Optional)
	resultsList: {                       // Rendered results list object      | (Optional)
		render: true,
		/* if set to false, add an eventListener to the selector for event type
		   "autoComplete" to handle the result */
		container: source => {
			source.setAttribute("id", "GeoObjectCollection");
		},
		destination: document.querySelector("#autoComplete"),
		position: "afterend",
		element: "ul"
	},
	maxResults: 10,                         // Max. number of rendered results | (Optional)
	highlight: true,                       // Highlight matching results      | (Optional)
	resultItem: {                          // Rendered result item            | (Optional)
		content: (data, source) => {
			console.log('data',data)
			source.innerHTML = data.match + ', ' + data.value.description;
		},
		element: "li"
	},
	noResults: () => {                     // Action script on noResults      | (Optional)
		let result = document.createElement("li");
		result.setAttribute("class", "no_result");
		result.setAttribute("tabindex", "1");
		result.innerHTML = "Ничего не найдено";
		document.querySelector("#autoComplete_list").appendChild(result);
	},
	onSelection: feedback => {             // Action script onSelection event | (Optional)
		let inputValue = document.querySelector("#autoComplete");
		inputValue.value = feedback.selection.value.name +', '+ feedback.selection.value.description;
		let hiddenInputLocation = document.querySelector('#hiddenLocation');
		hiddenInputLocation.value = feedback.selection.value.Point.pos;
		console.log(inputValue.value);
	}
});
