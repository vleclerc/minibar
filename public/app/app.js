$(document).ready(function(){
	
	//firebase config
	var config = {

	};
	
	var database = null;
	var dataLoaded = false;
	var pages = null;
	var sortedPages = [];
	var initialPageOrder = null;
	
	
	var indexPage = 'home';
	var indexPageId = 'page1';
	var currentPage = indexPage;
	var currentPageId = indexPageId;
	var currentHash = '';
	
	var url = window.location.href;
	
	if(location.hash){
		url = url.split('#')[0];
	} else {
		url = url.split('#')[0];
		window.location.href = url+'#'+indexPage;
	}
	
	function init(){
		if (!firebase.apps.length) {
			firebase.initializeApp(config);
		}
		database = firebase.database();
		getContentFromDatabase('/pages', function(data){
			pages = data;
			dataLoaded = true;
			loadMenu();
			loadContents();
		});
	}
	
	init();
	
	function getContentFromDatabase(path, callback){
		var pagesRef = firebase.database().ref(path);
		return pagesRef.once('value').then(function(snapshot) {
			var username = (snapshot.val() && snapshot.val().username) || 'Anonymous';
			pages = snapshot.val();
//			trace(pages);
			callback(pages);
			
		});
		
	}
	
	function loadMenu(){
		if(!dataLoaded){
			return;
		}
		var menuLink = '';
		$.each(pages, function(i, item) {
			var index = pages[i].order;
			sortedPages[index] = pages[i];
		});
		
//		trace('sortedPages', sortedPages);
		$.each(sortedPages, function(i, item) {
//			trace('sortedPages[i]', sortedPages[i]);
			if(typeof sortedPages[i] != "undefined"){
				menuLink += '<li><a rel="'+sortedPages[i].id+'" id="'+sortedPages[i].id+'" href="'+url+'#'+sortedPages[i].id+'">'+sortedPages[i].title+'</a></li>';
			}
		});
		$("#menu").html(menuLink);
		$('#'+currentPage).parent().addClass('active');
		currentPageId = $('#'+currentPage).attr('rel');
	}
	
	var currentPage = '';
	$(window).on('hashchange', function (e) {
		var contentSelector = location.hash.replace('#','');
	    currentPage = contentSelector;
	    loadMenu();
		loadContents();
	});

	if (window.location.hash) {
		$(window).trigger('hashchange');
	}

	function loadContents(){
		if(!dataLoaded){
			return;
		}
		
		var output = '';
		
//		trace('currentPageId', currentPageId);
		
		var page = pages[currentPageId];
		
//		trace('page', page);
		
		var pageId =  page['id'];
		var pageTitle =  page['title'];
		var pageData = page['content'].data;
		var pageOrder =  page['order'];
		initialPageOrder = pageOrder;
		var pageVisible =  page['visible'];
			
		$('#page_id').val(pageId);
		$('#page_title').val(pageTitle);
		$('#page_order').val(pageOrder);
			
		switch(page['content'].type){
			case 'list':
				break;
			case 'iframe':
				break;
			case 'text':
				break;
		}
		
		/*
			output += '<ul>';
			$.each(content, function(i, item) {
				output += '<li><div class="input-group"><span class="input-group-addon" id="basic-addon3">Date</span><input type="text" class="form-control" value="'+content[i].date+'"/></div></li>';
				output += '<li><div class="input-group"><span class="input-group-addon" id="basic-addon3">Place</span><input type="text" class="form-control" value="'+content[i].place+'"/></div></li>';
				output += '<li><div class="input-group"><span class="input-group-addon" id="basic-addon3">Name</span><input type="text" class="form-control" value="'+content[i].name+'"/></div></li>';
			});
			output += '<ul>';
		 */
		output = '<textarea class="form-control" id="page_content" rows="20">'+pageData+'</textarea>';
		$('#page_content').html(output);
		
		trace('pageVisible', pageVisible);
		if(pageVisible){
			$('#online').val('0').html('Disable Page');
		} else {
			$('#online').val('1').html('Enable Page');
		}
	}
	
	$("#update").click(function(){
		var page_title = $('input#page_title').val();
		var page_content = $('textarea#page_content').val();
		var page_order = $('input#page_order').val();
		
		trace('initialPageOrder', initialPageOrder);
		trace('page_order', page_order);
		
		pages[currentPageId]['title'] = page_title;
		pages[currentPageId]['content'].data = page_content;
		
		var targetPageId = sortedPages[page_order].id;
		
		trace('currentPageId', currentPageId);
		trace('targetPageId', targetPageId);
		
		pages[currentPageId]['order'] = page_order;
		
		if(targetPageId != currentPageId){
			sortedPages[initialPageOrder]['order'] = page_order;
			sortedPages[page_order]['order'] = initialPageOrder;
			pages[targetPageId]['order'] = initialPageOrder;
			//pages[currentPageId]['order'] = page_order;
			initialPageOrder = page_order;
		}
		
		update();
	});
	
	function update(){
		if(pages != false && typeof pages != 'undefined' && pages != null && pages.hasOwnProperty(currentPageId)){
			var pagesRef = firebase.database().ref('/pages');
			trace('pages:',pages);
			trace('sortedPages:',sortedPages);
			pagesRef.update(pages);
			alert('update OK');
		}
	}
	
	function trace(k,v){
		var enabled = true;
		if(enabled){
			console.log('---- '+k+' ---- :');
			console.log(v);
		}
	}
	
});