    $(document).ready(function () {
        $("#menu").addNavigation({
            event: "mouseover",
            effect: false,
           activeSection: activemenu_nav
        });

        $("#dropmenu_c").addNavigation({
            event: "mouseover",
            effect: false,
			activeSection: activedropmenu
        });	

        $("#sidenav").addNavigationLeft({
            event: "click",
            effect: true,
			activeSection: activesidenav,
			callback: function () {
				showActive();
			}
        });
	
    });
	
	function showActive() {
		$("#sidenav").find(".Hilite").addClass("Active");
		$("#sidenav").find(".Hilite").each(function () {
			var self = $(this);
			self.find("ul:first").show();
		});
	}

