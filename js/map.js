function clearMap(currentFeature_or_Features){
			if (!currentFeature_or_Features)
				return;
			if (currentFeature_or_Features.length){
				for (var i = 0; i < currentFeature_or_Features.length; i++){
					if(currentFeature_or_Features[i].length){
						for(var j = 0; j < currentFeature_or_Features[i].length; j++){
							currentFeature_or_Features[i][j].setMap(null);
						}
					}
					else{
						currentFeature_or_Features[i].setMap(null);
					}
				}
			}else{
				currentFeature_or_Features.setMap(null);
			}
			if (infowindow.getMap()){
				infowindow.close();
			}
		}
		
		function showFeature(Onfeature,geojson, style){
			var currentFeature_or_Features=Onfeature;
			clearMap(currentFeature_or_Features);
			currentFeature_or_Features = new GeoJSON(geojson, style || null);
			if (currentFeature_or_Features.type && currentFeature_or_Features.type == "Error"){
				alert(currentFeature_or_Features.message);
				return;
			}
			if (currentFeature_or_Features.length){
				for (var i = 0; i < currentFeature_or_Features.length; i++){
					if(currentFeature_or_Features[i].length){
						for(var j = 0; j < currentFeature_or_Features[i].length; j++){
							currentFeature_or_Features[i][j].setMap(map);
							if(currentFeature_or_Features[i][j].geojsonProperties) {
								setInfoWindow(currentFeature_or_Features[i][j]);
							}
						}
					}
					else{
						currentFeature_or_Features[i].setMap(map);
					}
					if (currentFeature_or_Features[i].geojsonProperties) {
						setInfoWindow(currentFeature_or_Features[i]);
					}
				}
			}else{
				currentFeature_or_Features.setMap(map)
				if (currentFeature_or_Features.geojsonProperties) {
					setInfoWindow(currentFeature_or_Features);
				}
			}
			
			
		}
		
		
		function rawGeoJSON(){
			clearMap();
			currentFeature_or_Features = new GeoJSON(JSON.parse(document.getElementById("put_geojson_string_here").value));
			
			if (currentFeature_or_Features.length){
				for (var i = 0; i < currentFeature_or_Features.length; i++){
					if(currentFeature_or_Features[i].length){
						for(var j = 0; j < currentFeature_or_Features[i].length; j++){
							currentFeature_or_Features[i][j].setMap(map);
							if(currentFeature_or_Features[i][j].geojsonProperties) {
								setInfoWindow(currentFeature_or_Features[i][j]);
							}
						}
					}
					else{
						currentFeature_or_Features[i].setMap(map);
					}
					if (currentFeature_or_Features[i].geojsonProperties) {
						setInfoWindow(currentFeature_or_Features[i]);
					}
				}
			}else{
				currentFeature_or_Features.setMap(map);
				if (currentFeature_or_Features.geojsonProperties) {
					setInfoWindow(currentFeature_or_Features);
				}
			}
		}
		function setInfoWindow (feature) {
			google.maps.event.addListener(feature, "rightclick", function(event) {
				var content = "<div style='max-width:150%;' id='infoBox'><strong>Keterangan:</strong><br />";
				for (var j in this.geojsonProperties) {
					content += j + ": " + this.geojsonProperties[j] + "<br />";
				}
				content += "</div>";
				infowindow.setContent(content);
				infowindow.setPosition(event.latLng);
				infowindow.open(map);
			});
		}
function drawBatas() {
    var feature1;
	 var style = {strokeColor: '#00FF00',strokeOpacity: 0.9,strokeWeight: 1,fillColor: '#00FF00',fillOpacity: 0.09};		
	 var myGoogleVector1 = new GeoJSON(batasDesa,style);
		//if (myGoogleVector.error){
	 	if (myGoogleVector1.type && myGoogleVector1.type == "Error"){	
        // Handle the error.
			alert('error: format peta salah');return;
		}else{
		 showFeature(feature1,batasDesa,style);    
     }	 
}

function drawPolybatas() {
     //alert(KecPurwakarta);
	 var feature2;
	 var style = {color:'#ffffff', strokeColor: '#0066FF',strokeOpacity: 0.8,strokeWeight: 2,fillColor: '#0066FF',fillOpacity: 0.15};		
	 var myGoogleVector2 = new GeoJSON(Polybatas,style);
		//if (myGoogleVector.error){
	 	if (myGoogleVector2.type && myGoogleVector2.type == "Error"){	
        // Handle the error.
			alert('error: format peta salah');return;
		}else{
		 showFeature(feature2,Polybatas,style);    
     }	 
}
function drawPolytata() {
    
	 var feature3;
	 var style = {strokeColor: '#00CC66',strokeOpacity: 0.8,strokeWeight: 1,fillColor: '#00FF99',fillOpacity: 0.5};		
	 var myGoogleVector3 = new GeoJSON(Polytata,style);
		//if (myGoogleVector.error){
	 	if (myGoogleVector3.type && myGoogleVector3.type == "Error"){	
        // Handle the error.
			alert('error: format peta salah');return;
		}else{
		 showFeature(feature3,Polytata,style);    
     }	 
}
function drawPolystatus() {
    
	 var feature4;
	 var style = {strokeColor: '#6699FF',strokeOpacity: 0.8,strokeWeight: 1,fillColor: '#66CCFF',fillOpacity: 0.15};		
	 var myGoogleVector4 = new GeoJSON(Polystatus,style);
		//if (myGoogleVector.error){
	 	if (myGoogleVector4.type && myGoogleVector4.type == "Error"){	
        // Handle the error.
			alert('error: format peta salah');return;
		}else{
		 showFeature(feature4,Polystatus,style);    
     }	 
}
