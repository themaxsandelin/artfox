$(document).ready(function(){
	
	// This variable tells the state of the menu. (Values = open / closed
	var menuState = "closed";
	// This variable tells whether the menu's animation is done or not to prevent spam clicking and animation lagg
	var animation = "done";
	
	function openMenu () {
		animation = "pending";
		menuState = "open";
		$("#menu").show();
		var menuItemDelay = 0;
		$("#menu a li").each(function(){
			var element = $(this);
			setTimeout(function(){
				$(element).removeClass("hide");
			}, menuItemDelay);
			menuItemDelay += 50;
		});
		setTimeout(function(){
			animation = "done";
		}, 600);
	}
	
	function closeMenu () {
		animation = "pending";
		menuState = "closed";
		var menuItemDelay = 0;
		$("#menu a li").each(function(){
			var element = $(this);
			setTimeout(function(){
				$(element).addClass("hide");
			}, menuItemDelay);
			menuItemDelay += 50;
		});
		setTimeout(function(){
			$("#menu").hide();
			animation = "done";
		}, 600);
	}
	
	function createNavSpace () {
		$(".navSpace").each(function(){
			$(this).append('<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/" x="0px" y="0px" width="11px" height="60px" viewBox="0 0 11 60" enable-background="new 0 0 11 60" xml:space="preserve"><defs></defs><g><polygon fill="#F2F2F2" points="1,60 0,60 10,30 0,0 1,0 11,30 "/></g></svg>');
		});
	}
	
	function createFilter () {
		$("#filterButton").append('<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/" x="0px" y="0px" width="60px" height="60px" viewBox="0 0 60 60" enable-background="new 0 0 60 60" xml:space="preserve"><defs></defs><rect fill="none" width="60" height="60"/><g><path class="filterGreen" fill="#AAAAAA" d="M34.1,23.4C34,23.5,34,23.7,34,23.9s0,0.3,0.1,0.5H20v-1H34.1z"/><path class="filterGreen" fill="#AAAAAA" d="M40,23.4v1h-3.1c0.1-0.2,0.1-0.3,0.1-0.5s0-0.3-0.1-0.5H40z"/></g><g><path class="filterGreen" fill="#AAAAAA" d="M23.6,35.4c-0.1,0.2-0.1,0.3-0.1,0.5s0,0.3,0.1,0.5H20v-1H23.6z"/><path class="filterGreen" fill="#AAAAAA" d="M40,35.4v1H26.4c0.1-0.2,0.1-0.3,0.1-0.5s0-0.3-0.1-0.5H40z"/></g><g><path class="filterGreen" fill="#AAAAAA" d="M28.6,29.4c-0.1,0.2-0.1,0.3-0.1,0.5s0,0.3,0.1,0.5H20v-1H28.6z"/><path class="filterGreen" fill="#AAAAAA" d="M40,29.4v1h-8.6c0.1-0.2,0.1-0.3,0.1-0.5s0-0.3-0.1-0.5H40z"/></g><g><path class="filterGreen" fill="#AAAAAA" d="M27.4,35.4c-0.2-1.1-1.2-2-2.4-2s-2.2,0.9-2.4,2c0,0.2-0.1,0.3-0.1,0.5c0,0.2,0,0.3,0.1,0.5c0.2,1.1,1.2,2,2.4,2s2.2-0.9,2.4-2c0-0.2,0.1-0.3,0.1-0.5C27.5,35.7,27.5,35.5,27.4,35.4z M25,37.4c-0.7,0-1.2-0.4-1.4-1c-0.1-0.2-0.1-0.3-0.1-0.5s0-0.3,0.1-0.5c0.2-0.6,0.8-1,1.4-1s1.2,0.4,1.4,1c0.1,0.2,0.1,0.3,0.1,0.5s0,0.3-0.1,0.5C26.2,37,25.7,37.4,25,37.4z"/></g><g><path class="filterGreen" fill="#AAAAAA" d="M32.4,29.4c-0.2-1.1-1.2-2-2.4-2s-2.2,0.9-2.4,2c0,0.2-0.1,0.3-0.1,0.5c0,0.2,0,0.3,0.1,0.5c0.2,1.1,1.2,2,2.4,2s2.2-0.9,2.4-2c0-0.2,0.1-0.3,0.1-0.5C32.5,29.7,32.5,29.5,32.4,29.4z M30,31.4c-0.7,0-1.2-0.4-1.4-1c-0.1-0.2-0.1-0.3-0.1-0.5s0-0.3,0.1-0.5c0.2-0.6,0.8-1,1.4-1s1.2,0.4,1.4,1c0.1,0.2,0.1,0.3,0.1,0.5s0,0.3-0.1,0.5C31.2,31,30.7,31.4,30,31.4z"/></g><g><path class="filterGreen" fill="#AAAAAA" d="M37.9,23.4c-0.2-1.1-1.2-2-2.4-2s-2.2,0.9-2.4,2c0,0.2-0.1,0.3-0.1,0.5c0,0.2,0,0.3,0.1,0.5c0.2,1.1,1.2,2,2.4,2s2.2-0.9,2.4-2c0-0.2,0.1-0.3,0.1-0.5C38,23.7,38,23.5,37.9,23.4z M35.5,25.4c-0.7,0-1.2-0.4-1.4-1C34,24.2,34,24.1,34,23.9s0-0.3,0.1-0.5c0.2-0.6,0.8-1,1.4-1s1.2,0.4,1.4,1c0.1,0.2,0.1,0.3,0.1,0.5s0,0.3-0.1,0.5C36.7,25,36.2,25.4,35.5,25.4z"/></g></svg>');
		if ($("#products").length) {
			$("#mainContent").addClass("products");
			var categoryChosen = $("#products").attr("data-category-chosen");
		}
		setTimeout(function(){
			$(".products").css({
				'-webkit-transition' : '-webkit-transform 0.4s ease',
				'-moz-transition' : '-moz-transform 0.4s ease',
				'-ms-transition' : '-ms-transform 0.4s ease',
				'-o-transition' : '-o-transform 0.4s ease',
				'transition' : 'transform 0.4s ease'
			});
		}, 10);
	}
	
	function generateButtons () {
		$(".button").each(function(){
			var content = $(this).html();
			$(this).empty().append(
				'<div class="frontBox">'+content+'</div>'+
				'<div class="backBox"></div>'
			);
		});
		$("#searchButton").append('<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/" x="0px" y="0px" width="50px" height="50px" viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve"><defs></defs><path fill="none" d="M45,50H0V0h45c2.8,0,5,2.2,5,5v40C50,47.8,47.8,50,45,50z"/><g><path fill="#67C18A" d="M23,18.2c-1.4,0-2.8,0.5-3.9,1.6c-2.2,2.2-2.2,5.7,0,7.9c1.1,1.1,2.5,1.6,3.9,1.6c1.2,0,2.4-0.4,3.4-1.1l4.5,4.5l1.1-1.1l-4.5-4.5c1.7-2.2,1.5-5.3-0.5-7.3C25.9,18.8,24.4,18.2,23,18.2z M27.1,23.8c0,1.1-0.4,2.1-1.2,2.9c-0.8,0.8-1.8,1.2-2.9,1.2c-1.1,0-2.1-0.4-2.9-1.2c-0.8-0.8-1.2-1.8-1.2-2.9c0-1.1,0.4-2.1,1.2-2.9c0.8-0.8,1.8-1.2,2.9-1.2c1.1,0,2.1,0.4,2.9,1.2C26.7,21.7,27.1,22.7,27.1,23.8z"/></g></svg>');
		$(".editButton").each(function(){
			$(this).append('<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/" x="0px" y="0px" width="40px" height="40px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve"><defs></defs><rect y="0" fill="none" width="40" height="40"/><g><path class="penn" fill="#AAAAAA" d="M22.2,14l3.7,3.7L16.6,27l-3.7-3.7L22.2,14z M28.7,13.1L27,11.5c-0.6-0.6-1.7-0.6-2.3,0L23.2,13l3.7,3.7l1.8-1.8C29.2,14.4,29.2,13.6,28.7,13.1z M11,28.5c-0.1,0.3,0.2,0.6,0.5,0.5l4.1-1l-3.7-3.7L11,28.5z"/></g></svg>');
		});
		$(".deleteCategoryButton").each(function(){
			$(this).append('<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/" x="0px" y="0px" width="40px" height="40px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve"><defs></defs><rect x="0" y="0" fill="none" width="40" height="40"/><g><polygon class="penn" fill="#AAAAAA" points="21.1,20 26,24.9 24.9,26 20,21.1 15.1,26 14,24.9 18.9,20 14,15.1 15.1,14 20,18.9 24.9,14 26,15.1 "/></g></svg>');
		});
	}
	
	function previewImage (allFiles, id){
		var fileList = allFiles.files;
		var anyWindow = window.URL || window.webkitURL;
		for(var i = 0; i < fileList.length; i++){
			var objectUrl = anyWindow.createObjectURL(fileList[i]);
			$("#"+id).empty();
			$("#"+id).css({
				'background': 'url('+objectUrl+')no-repeat center center',
				'background-size': 'cover'
			});
			window.URL.revokeObjectURL(fileList[i]);
		}
	}
	
	function openFilter () {
		animation = "pending";
		$("#homeFilter").attr("data-filter-state", "open");
		$("#filterButton").addClass("active");
		$("#homeFilter, .products").addClass("move");
		setTimeout(function(){
			animation = "done"
		}, 400);
	}
	
	function closeFilter () {
		animation = "pending";
		$("#homeFilter").attr("data-filter-state", "closed");
		$("#filterButton").removeClass("active");
		$("#homeFilter, .products").removeClass("move");
		setTimeout(function(){
			animation = "done"
		}, 400);
	}
	
	/*
		-webkit-transition:-webkit-transform 0.4s ease;
		-moz-transition:-moz-transform 0.4s ease;
		-ms-transition:-ms-transform 0.4s ease;
		-o-transition:-o-transform 0.4s ease;
		transition:transform 0.4s ease;
	*/
	
	
	createNavSpace();
	generateButtons();
	createFilter();
	
	$("html").on("tap", function(e){
		if (animation === "done") {
			if (menuState === "open") {
				closeMenu();
			}
		}
	});

	$("#menuButton").on("tap", function(e){
		e.stopImmediatePropagation();
		if (animation === "done") {
			if (menuState === "closed") {
				openMenu();
			} else if (menuState === "open") {
				closeMenu();
			}
		}
	});
	
	$("#changeProductImage").on("tap", function(){
		$("#editProductImageButton").click();
	});
	
	$("#editProductImageButton").on("change", function(){
		previewImage(this, "editProductImage");
	});
	
	$("#saveEditButton").on("tap", function(){
		$("#saveProductEdit").click();
	});
	
	$("#deleteProductButton").on("tap", function(){
		$(".verifyDelete").click();
	});
	
	//Delete category
	$(".deleteCategoryButton").on("tap", function(){
		$(this).parent().find(".verifyDelete").click();
	});

	//Delete Admin
	$(".deleteAdminButton").on("tap", function(){
		$(".verifyDelete").click();
	});
	

	//Toggle submit button when category change on searchfunction
	$('#toggleCat').on('change', function(){
		
		$("#searchForm").submit();
	});

	
	$("#filterButton").on("tap", function(){
		// This variable tells the state of the filter menu (Values = open / closed)
		var filterState = $("#homeFilter").attr("data-filter-state");
		if (animation === "done") {
			if (filterState === "closed") {
				openFilter();
			} else if (filterState === "open") {
				closeFilter();
			}
		}
	});
	
	$("#searchButton").on("tap", function(){
		$("#searchHidden").click();
	});
	
	$("#login").on("tap", function(){
		$("#hiddenLogin").click();
	});
	
	$("#createAdmin").on("tap", function(){
		$("#hiddenCreateAdmin").click();
	});
	
	$("#saveAdminChanges").on("tap", function(){
		$("#hiddenUpdateAdmin").click();
	});
	
	$("#createCategory").on("tap", function(){
		$("#hiddenCreateCategory").click();
	});
	
	$("#confirmDelete").on("tap", function(){
		$("#hiddenConfirmDelete").click();
	});
		
});