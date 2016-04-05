var DEV= {};

page = require('webpage').create();
DEV.fs   = require('fs');
DEV.origin = "http://127.0.0.1:4000/";
DEV.url = DEV.origin + "paradocs/jekyll/out/";
DEV.hrefs = [];
DEV.counter = 0;

phantom.onError = function(){};
// ignoring all console log of the site
page.onConsoleMessage = (function(msg) {
  //console.log("nothing to print.");
});

// ignoring all javascript error of the site
page.onError = (function(msg) {
  //console.log("Nothing to print.");
});

// ignoring all javascript alert of the page
page.onAlert = (function(msg) {
  //console.log("Nothing to print.");
});

DEV.parseLinks = (function(link) {
	// if (link.indexOf('getting-started') !== -1)
	// return true;
 //  if (link.indexOf('chart-guide') !== -1)
 //  return true;
  if (link.indexOf('gauge-and-widgets-guide/bulb-gauge/real-time-gauges') !== -1)
  return true;
  // if (link.indexOf('map-guide') !== -1)
  // return true;
  // if (link.indexOf('basic-chart-configurations') !== -1)
  // return true;
  // if (link.indexOf('advanced-chart-configurations') !== -1)
  // return true;
	else
	return false;	
  });

DEV.prepareHtml = (function() {

	if(DEV.parseLinks(DEV.hrefs[DEV.counter])) {
		DEV.opensublink(DEV.hrefs[DEV.counter], DEV.readContents);
	} else if (DEV.hrefs[DEV.counter + 1]) {
		DEV.counter ++;	
    DEV.prepareHtml();
	} else {
    console.log('All links parse complete.');
    phantom.exit();}

});

DEV.getLinks = (function() {
	var data;
  if (page.injectJs("jquery.js")) {
    data = page.evaluate(function() {
    	var resources = [];
    	$(".toc-list a").each(function() {
            if($(this).attr("href")) {
                var url = $(this).attr("href");
                url = $(location)[0].origin + url;
                resources.push(url);
            }
        });

    	return JSON.stringify(resources);
    });
  } //end of IF
  			
  if(data) {
    DEV.hrefs = JSON.parse(data);		
    DEV.fs.write('links.txt', JSON.stringify(DEV.hrefs, null, 4));	 	
    console.log("****** Links done Total Links : " + DEV.hrefs.length + "******");
    DEV.prepareHtml();
  } else phantom.exit();
});

DEV.readContents = (function(){

  var data;
  if (page.injectJs("jquery.js")) {
    data = page.evaluate(function() {
    	var h2tag = htmlCont = final = [];
    	h2tag = $('.tab-content').prevAll('h2');			
    	htmlCont = $('.tab-content .tab.html-tab code');

    	for(var i=0; i<htmlCont.length; i++) {
    		var obj = {};
    		obj.name = $(h2tag[htmlCont.length - 1 -i]).text().toLowerCase().split(' ').join('-').replace('/','-or-');
        if (!obj.name || obj.name.toLowerCase().indexOf("prerequisites") !== -1)
          obj.name = $('header h1').text().toLowerCase().split(' ').join('-');

    		obj.html = $(htmlCont[i]).text();
    		final.push(obj);
    	}

    	return final;
    });
  } //end of IF

		console.log('data length : ' + data.length);
    if( data.length > 0 ) {
	  var link = DEV.hrefs[DEV.counter];
    link = link.replace(DEV.origin + 'paradocs/jekyll/', '');
	  for(var i=0; i<data.length; i++) {
      var location = link.replace('.html', '').toLowerCase().split(' ').join('-'),
          html = data[i].html,
          requireFile,
          requireFileName;
	  	//DEV.fs.write(location + '/' + data[i].name + '.html', data[i].html); 

      if(html.indexOf('dataStreamURL') !== -1) {
        requireFile = data[i].html.match(/\"dataStreamURL\":\s(.*),/)[1];
        requireFileName = requireFile.split('/').pop().replace("\"", "").replace("\"", "");
        //var html = data[i].html;
        html = html.replace(requireFile, "\"" + requireFileName + "\"");
        console.log(requireFileName);
        //requireFile = requireFile.split('/').pop().replace("\"", "");
        //DEV.fs.write(location + '/' + data[i].name + '.html', html);
        if(!DEV.fs.exists(location + "/" + requireFileName) && DEV.fs.exists("resources/" + requireFileName))
          DEV.fs.copy("resources/" + requireFileName, location + "/" + requireFileName);        
      }

        DEV.fs.write(location + '/' + data[i].name + '.html', html); 
      
    }

    console.log("****** File write done ******");
    console.log("");
    DEV.counter ++;	
    DEV.prepareHtml();

  } else {

    DEV.counter ++; 
    DEV.prepareHtml();
  }
});

DEV.opensublink = (function(url, func) {
   
  console.log("** Openning --> " + (DEV.counter + 1) + "  " + url + " **");
  if(url === 'undefined' || !url)
    phantom.exit();
      
  page.open(url, function(status) {
    if (status == 'success') {
       setTimeout(function() {
           func();
        }, 3000);      
        
    }
  });    
});

DEV.opensublink(DEV.url, DEV.getLinks);